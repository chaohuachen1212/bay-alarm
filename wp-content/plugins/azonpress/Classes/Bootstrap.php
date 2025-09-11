<?php namespace Azonpress\Classes;

use Azonpress\Classes\Products\ProductApi;
use Azonpress\Classes\Shortcode\ComparisonTable;
use Azonpress\Classes\Shortcode\ProductTable;
use Azonpress\Classes\Shortcode\ShortcodePreview;
use Azonpress\Classes\Shortcode\ShortCodes;
use Azonpress\Classes\Shortcode\TableList;
use Azonpress\Classes\Products\Templates;

class Bootstrap
{
    public function boot()
    {
        $this->loadDependencies();
        $this->loadTextDomain();
        $this->commonHooks();
        $this->adminHooks();
        $this->loadBlockAssets();
        $this->ajaxActions();
        $this->shortCodes();
    }

    public function commonHooks()
    {
        add_action('wp_enqueue_scripts', function () {
            $isGlobal = get_option('_azonpress_global_asset_loading', 'no');
            if ($isGlobal != 'yes') {
                global $post;
                if (!is_a($post, 'WP_Post')) {
                    return;
                }
                $isGlobal = get_post_meta($post->ID, '_has_azonpress', true);
            }

            if ($isGlobal == 'yes' || isset($_GET['azonpress_preview'])) {
                ShortCodes::enqueueTableAssets();
            }
        });

        // template render hooks
        add_action('azonpress_product_display_box', array('Azonpress\Classes\Shortcode\ProductRenderer', 'boxTemplate'), 10, 2);
        add_action('azonpress_product_display_grid', array('Azonpress\Classes\Shortcode\ProductRenderer', 'gridTemplate'), 10, 2);
        add_action('azonpress_product_display_list', array('Azonpress\Classes\Shortcode\ProductRenderer', 'listTemplate'), 10, 2);
        add_action('azonpress_product_display_table', array('Azonpress\Classes\Shortcode\ProductRenderer', 'tableTemplate'), 10, 2);
        add_action('azonpress_product_display_widget', array('Azonpress\Classes\Shortcode\ProductRenderer', 'widgetTemplate'), 10, 2);
        add_action('azonpress_product_display_widget_small', array('Azonpress\Classes\Shortcode\ProductRenderer', 'widgetSmallTemplate'), 10, 2);
        add_action('azonpress_product_display_feature_box', array('Azonpress\Classes\Shortcode\ProductRenderer', 'featureBoxTemplate'), 10, 2);
        add_action('azonpress_enqueue_table_assets', array('Azonpress\Classes\Shortcode\ShortCodes', 'enqueueTableAssets'));

        add_action('azonpress_after_product_content', function ($lastUpdate) {
            if (!$lastUpdate) {
                return '';
            }

            $appearance_settings = get_option('azonpress_appearance_settings', array());

            if (ArrayHelper::get($appearance_settings, 'global.disclaimer_visibility') === "yes") {
                $text = ArrayHelper::get($appearance_settings, "global.disclaimer_text");
                if (!$text) {
                    return '';
                }
                $date = date_i18n(get_option('date_format'), strtotime($lastUpdate));
                $date = apply_filters('azonpress_disclaimer_date', $date, $lastUpdate);
                $text = str_replace('%last_update%', $date, $text);
                echo '<p class="azp_disclaimer_text">'.$text.'</p>';
            }
        });
    }

    public function ajaxActions()
    {
        add_action('wp_ajax_azp_update_table_info', function () {
            azonpressCheckAdminAjaxAccess();
            $tableList = new TableList();
            $tableList->updateTable();
        });

        add_action('wp_ajax_azp_update_table_css', function () {
            azonpressCheckAdminAjaxAccess();
            $tableList = new TableList();
            $tableList->updateCSS();
        });

        add_action('wp_ajax_azp_get_templates', function () {
            azonpressCheckAdminAjaxAccess();
            Templates::getTemplates();
        });

        add_action('wp_ajax_azp_comparison_table_ajax_actions', function () {
            azonpressCheckAdminAjaxAccess();
            $comparisonTable = new ComparisonTable();
            $comparisonTable->registerAjaxRoutes();
        });

        add_action('wp_ajax_azp_product_table_ajax_actions', function () {
            azonpressCheckAdminAjaxAccess();
            $productTable = new ProductTable();
            $productTable->registerAjaxRoutes();
        });

        add_action('wp_ajax_azp_product_table_user_pagination_ajax', function () {
            $productTable = new ProductTable();
            $productTable->registerAjaxRoutes();
        });

        add_action('wp_ajax_azp_amazon_api', function () {
            azonpressCheckAdminAjaxAccess();
            ProductApi::handleAjax();
        });
        add_action('wp_ajax_azonpress_get_dashboard_data', function () {
            azonpressCheckAdminAjaxAccess();
            $dashboard = new Dashboard();
            $dashboard->getStats();
        });
        add_action('wp_ajax_azonpress_settings_api', function () {
            azonpressCheckAdminAjaxAccess();
            SettingAPI::handleAjaxEndpoints();
        });
        add_action('wp', array(new ShortcodePreview(), 'handleExteriorPages'));
    }

    public function adminHooks()
    {
        $menuClass = new Menu();
        add_action('admin_menu', array($menuClass, 'register'));
        // loaded for testing purpose, will be added to guten js file
        add_action('enqueue_block_assets', function () {
            MediaButton::loadAssets('global-window');
        });

        add_action('media_buttons', function ($editorId) {
            if (azonpressCurrentAccessPermission()) {
                MediaButton::addMediaButton($editorId);
            }
        });

        add_action('enqueue_block_assets', function () {
            MediaButton::loadAssets('global-window');
        });

        add_filter('media_upload_tabs', function ($tabs) {
            if (azonpressCurrentAccessPermission()) {
                return MediaButton::addMediaUploadTabs($tabs);
            }
            return $tabs;
        });

        add_action(
            'media_upload_azonpress_media',
            array('Azonpress\Classes\MediaButton', 'addMediaUploadOutput')
        );

        add_action('azonpress_geo_type', array('Azonpress\Classes\SettingAPI', 'downloadMaxMindDB'), 10, 3);

        add_action('save_post', function ($post_id) {
            if (isset($_POST['post_content'])) {
                $post_content = $_POST['post_content'];
            } else {
                $post = get_post($post_id);
                $post_content = $post->post_content;
            }

            $hasShortcode = 'no';

            if (has_shortcode($post_content, 'azonpress_comparison')) {
                $hasShortcode = 'yes';
            } elseif (has_shortcode($post_content, 'azonpress_tables')) {
                $hasShortcode = 'yes';
            } elseif (has_shortcode($post_content, 'azonpress')) {
                $hasShortcode = 'yes';
            }
            update_post_meta($post_id, '_has_azonpress', $hasShortcode);
        });

        add_action('wp_print_scripts', function () {
            if (is_admin() && isset($_GET['page']) && $_GET['page'] == 'azonpress') {
                global $wp_scripts;
                if (!$wp_scripts) {
                    return;
                }
                $pluginUrl = plugins_url();
                foreach ($wp_scripts->queue as $script) {
                    $src = $wp_scripts->registered[$script]->src;
                    if (strpos($src, $pluginUrl) !== false && !strpos($src, 'azonpress') !== false) {
                        wp_dequeue_script($wp_scripts->registered[$script]->handle);
                    }
                }
            }
        }, 1);
    }

    public function loadBlockAssets()
    {
        add_action('enqueue_block_editor_assets', function () {
            wp_enqueue_script(
                'azonpress_media_button',
                AZONPRESS_PLUGIN_URL. 'public/blocks/dist/blocks.build.js',
                array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'),
                null,
                true
            );
            wp_enqueue_style(
                'azonpress_block-cgb-block-editor-css',
                AZONPRESS_PLUGIN_URL. 'public/blocks/dist/blocks.editor.build.css',
                array('wp-edit-blocks'),
                null
            );
        });
        add_action('init', function () {
            wp_enqueue_style(
                'azonpress_block-cgb-block-style-css',
                AZONPRESS_PLUGIN_URL. 'public/blocks/dist/blocks.style.build.css',
                array(),
                null
            );
            wp_enqueue_style(
                'load-fa',
                AZONPRESS_PLUGIN_URL. 'public/blocks/icons/font-awesome-custom.css'
            );
        });

        add_action('rest_api_init', function () {
            (new GutenbergApiHandler())->registerRoutes();
        });
    }

    public function shortCodes()
    {
        add_shortcode('azonpress_comparison', function ($atts) {
            $comparisonTable = new ComparisonTable();
            return $comparisonTable->handelShortCode($atts);
        });

        add_shortcode('azonpress_tables', function ($atts) {
            $productTable = new ProductTable();
            return $productTable->handleRender($atts, 1);
        });

        add_shortcode('azonpress', function ($atts, $content = '') {
            return ShortCodes::handleProductDisplayShortCodes($atts, $content);
        });

        add_shortcode('azonpress_data', function ($atts) {
            return ShortCodes::elementShortCodes($atts);
        });
    }

    private function loadDependencies()
    {
        include AZONPRESS_PLUGIN_PATH . 'Classes/global_functions.php';

        include AZONPRESS_PLUGIN_PATH . 'Classes/ArrayHelper.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Menu.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/View.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Model.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Dashboard.php';

        include AZONPRESS_PLUGIN_PATH . 'Classes/Shortcode/ProductTableHelper.php';

        include AZONPRESS_PLUGIN_PATH . 'Classes/Shortcode/TableList.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Shortcode/ComparisonTable.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Shortcode/ProductTable.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Shortcode/ComparisonHelper.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Shortcode/ShortCodes.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Shortcode/ProductRenderer.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Shortcode/ShortcodePreview.php';

        include AZONPRESS_PLUGIN_PATH . 'Classes/Products/Amazon.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Products/ProductApi.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Products/InMemoryProductCache.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Products/ProductTransformerTrait.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Products/ProductTransformer.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Products/HTMLHelper.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/Products/Templates.php';

        include AZONPRESS_PLUGIN_PATH . 'Classes/libs/AmazonProductAPI/load.php';

        include AZONPRESS_PLUGIN_PATH . 'Classes/MediaButton.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/GutenbergApiHandler.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/SettingAPI.php';
        include AZONPRESS_PLUGIN_PATH . 'Classes/libs/MaxMind/Inc.php';
    }

    private function loadTextDomain()
    {
        load_plugin_textdomain('azonpress', false, AZONPRESS_PLUGIN_PATH . '/resources/languages/');
    }
}
