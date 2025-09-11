<?php
namespace Azonpress\Classes;

use Azonpress\Classes\Products\Amazon;

class MediaButton
{
    public static function addMediaButton($editor_id)
    {
        printf('<a href="#" class="button insert_azonpress_btn add_media" title="%s" data-editor="%s">%s</a>', __('Link to Amazon'), $editor_id, __('AzonPress', 'azonpress'));
        wp_enqueue_script('azonpress_media_frame', AZONPRESS_PLUGIN_URL.'public/js/azonpress_media_button.js');
        wp_localize_script('azonpress_media_frame', 'AzonPressMediaFrame', array(
            'title' => __('AzonPress', 'azonpress'),
            'state_name' => 'iframe:azonpress_media'
        ));
    }

    public static function addMediaUploadTabs($tabs)
    {
        return array_merge($tabs, array('azonpress_media' => __('AzonPress', 'azonpress')));
    }

    public static function addMediaUploadOutput()
    {
        return wp_iframe(array(__CLASS__, 'addMediaContent'));
    }

    public static function addMediaContent()
    {
        static::loadAssets();
        echo '<div id="azonpress_media_app"></div>';
    }

    public static function loadAssets($localizePath = "iframe")
    {
        if ($localizePath === "iframe") {
            wp_enqueue_script('azonpress_media_button', AZONPRESS_PLUGIN_URL.'public/js/media_button.js');
        }

        wp_enqueue_style('azonpress_media_button', AZONPRESS_PLUGIN_URL.'public/css/media_button.css');

        $globalSettings = Amazon::getAppearanceSettings('admin');
        $globalSettings = ArrayHelper::get($globalSettings, 'global');
        $customLinkStyles = ArrayHelper::get($globalSettings, 'button_styles.normal_styles');
        $customLinkStylesHover = ArrayHelper::get($globalSettings, 'button_styles.hover_styles');
        if ($customLinkStyles['backgroundColor'] == '') {
            $customLinkStyles['background'] = "#f0c14b";
        }
        unset($customLinkStyles['use_shadow']);
        $customLinkStyles = array_filter($customLinkStyles);
        $customBtnCss =  'padding: 10px 15px;';
        $customBtnCssHover = '';

        foreach ($customLinkStyles as $key => $value) {
            $suffix = '';
            if ($key == 'borderRadius' || $key === 'lineHeight') {
                $suffix = 'px';
            }
            $customBtnCss .= strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $key)).':'.$value.$suffix.'; ';
        }

        foreach ($customLinkStylesHover as $key => $value) {
            $suffix = '';
            if ($key == 'borderRadius' || $key === 'lineHeight') {
                $suffix = 'px';
            }
            $customBtnCssHover .= strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $key)).':'.$value.$suffix.'!important; ';
        }

        wp_localize_script('azonpress_media_button', 'azonpress_media', array(
            'api_status' => (bool) azonPressGetAmazonAPI(),
            'config_url' => admin_url('admin.php?page=azonpress#/settings/'),
            'cta_sets' => self::getCtaSets(),
            'product_categories' => Amazon::getProductCategories(),
            'azp_admin_nonce' => wp_create_nonce('azp_admin_nonce'),
            'custom_btn' => [
                'style' => $customBtnCss,
                'hover' => $customBtnCssHover,
                'buy_btn_text' => ArrayHelper::get($globalSettings, 'buy_now_btn_text'),
                'add_to_cart_text' => ArrayHelper::get($globalSettings, 'add_to_cart_btn_text'),
                'extra_css_class' => ArrayHelper::get($globalSettings, 'button_styles.extra_css_class')
            ]
        ));
    }

    public static function getCtaSets()
    {
        $buttons = Amazon::getButtonStyles();
        $ctaButtons = array();
        foreach ($buttons as $button) {
            if ($button['type'] == 'image') {
                $ctaButtons[] = $button['url'];
            }
        }
        return $ctaButtons;
    }
}
