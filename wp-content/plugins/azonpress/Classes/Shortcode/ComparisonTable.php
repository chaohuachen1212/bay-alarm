<?php namespace Azonpress\Classes\Shortcode;

use Azonpress\Classes\ArrayHelper;
use Azonpress\Classes\Products\ProductApi;
use Azonpress\Classes\View;

class ComparisonTable extends TableList
{
    public function __construct($type = 'comparison')
    {
        parent::__construct($type);
    }

    public function registerAjaxRoutes()
    {
        azpValidateNonce('azp_admin_nonce');

        $route = sanitize_text_field($_REQUEST['route']);
        $routeMaps = array(
            'create_table' => 'createTable',
            'get_tables' => 'getTables',
            'update_table' => 'updateTable',
            'get_table' => 'find',
            'delete_table' => 'delete',
            'duplicate_table'    => 'duplicate'
        );

        if (isset($routeMaps[$route])) {
            $this->{$routeMaps[$route]}();
            die();
        }
    }

    public function handelShortCode($atts)
    {
        global $azonpress;
        $azonpress['current_module'] = 'comparison';
        $hideLabel = false;
        $appearanceSettings = $this->getAppearanceSettings('public');

        $currentModule = 'global';
        if ($azonpress && isset($azonpress['current_module'])) {
            $currentModule = $azonpress['current_module'];
        }

        $atts = shortcode_atts(array(
            'id' => null
        ), $atts);

        extract($atts);
        $settings_for_label = get_option('azonpress_appearance_settings', array());

        $table = azonPressDBModel('azonpress_lists')->find($id);

        if (!$table || $table->type != $this->type) {
            return '';
        }

        $products = json_decode($table->column_configuration, true);

        if (!$products || !is_array($products)) {
            return '';
        }

        $validProducts = array();

        $itemIsns = [];

        $lastUpdateTime = date('Y-m-d H:i:s', time() - 1209600);

        foreach ($products as $product) {
            if ($product['active'] == 'yes') {
                $itemIsns[] = ArrayHelper::get($product, 'asin');
            }
        }

        $items = ProductApi::getProducts($itemIsns);

        if (!$items || is_wp_error($items)) {
            return '';
        }

        foreach ($products as $product) {
            $asin = ArrayHelper::get($product, 'asin');
            if (isset($items[$asin])) {
                $item = $items[$asin];
                if ($item) {
                    $validProducts[] = (object)array(
                        'rows' => $product['rows'],
                        'item' => $item,
                        'highlight' => (object)array(
                            'featured_text' => ArrayHelper::get($product, 'featured_text'),
                            'primary_color' => ArrayHelper::get($product, 'primary_color'),
                            'secondary_color' => ArrayHelper::get($product, 'secondary_color'),
                        )
                    );
                    if ($item->last_updated() > $lastUpdateTime) {
                        $lastUpdateTime = $item->last_updated();
                    }
                }
            }
        }


        if (!$validProducts) {
            return '';
        }


        $settings = json_decode($table->table_settings, true);
        $showTitle = isset($settings['showTitle']) && ($settings['showTitle'] == 'yes');
        $showDescription = isset($settings['showDescription']) && ($settings['showDescription'] == 'yes');
        $rows = json_decode($table->rows, true);

        if (isset($appearanceSettings['hide_price']) && $appearanceSettings['hide_price'] == 'yes') {
            foreach ($rows as $key => $value) {
                if ($value['table_row_type'] == 'price') {
                    unset($rows[$key]);
                }
            }
        }

        if (isset($appearanceSettings['hide_prime_status']) && $appearanceSettings['hide_prime_status'] == 'yes') {
            foreach ($rows as $key => $value) {
                if ($value['table_row_type'] == 'prime_status') {
                    unset($rows[$key]);
                }
            }
        }

        $comparisonTable = (object)array(
            'title' => $table->title,
            'description' => $table->description,
            'settings' => $settings,
            'products' => $validProducts,
            'rows' => $rows,
            'type' => $table->type,
            'showTitle' => $showTitle,
            'showDescription' => $showDescription,
        );

        $comparisonTable = apply_filters('azonpress_comparison_tables_view', $comparisonTable);

        do_action('azonpress_enqueue_table_assets');

        return View::make('comparison_table', array(
            'table' => $comparisonTable,
            'custom_css' => $table->custom_css,
            'settings' => $settings_for_label,
            'last_updated_at' => $lastUpdateTime
        ));
    }

    public function getAppearanceSettings($scope = 'public')
    {
        $settings = get_option('azonpress_appearance_settings', array());

        $globalDefaults = array(
            'disclaimer_visibility' => false,
            'disclaimer_text' => "",
        );

        if (isset($settings["global"])) {
            $settings = wp_parse_args($settings["global"]);
        }

        return apply_filters('azonpress_appearance_settings', $settings);
    }
}
