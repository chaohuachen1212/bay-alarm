<?php

namespace Azonpress\Classes\Shortcode;

use Azonpress\Classes\ArrayHelper;
use Azonpress\Classes\Products\ProductTransformer;
use Azonpress\Classes\View;

class ProductRenderer
{
    private static $hidePrice = null;

    private static $wrapper_css_class = null;

    public static function boxTemplate($items, $atts)
    {
        $data = apply_filters('azonpress_html_item_data_box', array(
            'products' => $items,
            'atts' => $atts,
            'wrapper_class' => self::getWrapperCssClass($atts),
            'hide_price' => self::isHidePrice(),
            'last_updated_at' => self::getLastUpdateTime($items)
        ));
        View::render('product_templates.box', $data);
    }

    public static function gridTemplate($items, $atts)
    {
        if (empty($atts['columns'])) {
            $atts['columns'] = 3;
        }

        $data = apply_filters('azonpress_html_item_data_grid', array(
            'products' => $items,
            'columns' => $atts['columns'],
            'atts' => $atts,
            'wrapper_class' => self::getWrapperCssClass($atts),
            'hide_price' => self::isHidePrice(),
            'last_updated_at' => self::getLastUpdateTime($items)
        ));

        View::render('product_templates.grids', $data);
    }

    public static function listTemplate($items, $atts)
    {
        $data = apply_filters('azonpress_html_item_data_list', array(
            'products' => $items,
            'atts' => $atts,
            'wrapper_class' => self::getWrapperCssClass($atts),
            'hide_price' => self::isHidePrice(),
            'last_updated_at' => self::getLastUpdateTime($items)
        ));

        View::render('product_templates.list', $data);
    }

    public static function tableTemplate($items, $atts)
    {
        $hidePrice = self::isHidePrice();

        $headings = [
            'azp_image_col' => __('Photo', 'azonpress'),
            'azp_title_col' => __('Product', 'azonporess'),
            'azp_price_col' => __('Price', 'azonpress'),
            'az_cta_call' => __('Buy', 'azonpress')
        ];

        if ($hidePrice) {
            unset($headings['azp_price_col']);
        }

        $rows = [];

        foreach ($items as $item) {
            $rows[] = [
                'azp_image_col' => $item->getImageHtml('small'),
                'azp_title_col' => $item->titleHtml(),
                'azp_price_col' => $item->priceHTML('minimal'),
                'az_cta_call' => $item->buyButton()
            ];
        }

        if (!$rows) {
            return '';
        }

        $columns = [
            'headings' => $headings,
        ];

        $data = apply_filters('azonpress_html_item_data_table', array(
            'headings' => $headings,
            'rows' => $rows,
            'products' => $items,
            'atts' => $atts,
            'wrapper_class' => self::getWrapperCssClass($atts),
            'last_updated_at' => self::getLastUpdateTime($items)
        ));

        View::render('product_templates.table', $data);
    }

    public static function widgetTemplate($items, $atts)
    {
        $data = apply_filters('azonpress_html_item_data_widget', array(
            'products' => $items,
            'atts' => $atts,
            'hide_price' => self::isHidePrice(),
            'wrapper_class' => self::getWrapperCssClass($atts),
            'last_updated_at' => self::getLastUpdateTime($items)
        ));

        View::render('product_templates.widget', $data);
    }

    public static function widgetSmallTemplate($items, $atts)
    {
        $data = apply_filters('azonpress_html_item_data_widget_small', array(
            'products' => $items,
            'atts' => $atts,
            'wrapper_class' => self::getWrapperCssClass($atts),
            'hide_price' => self::isHidePrice(),
            'last_updated_at' => self::getLastUpdateTime($items)
        ));

        View::render('product_templates.widget-small', $data);
    }

    /**
     * @param $items ProductTransformer[]
     * @param $atts
     * @return  void | string
     */
    public static function featureBoxTemplate($items, $atts)
    {
        $firstItem = reset($items);
        $features = $firstItem->features();
        if (!$features) {
            return '';
        }

        $btnText = __('Learn More', 'azonpress');
        if ($atts['button_text']) {
            $btnText = $atts['button_text'];
        }

        if ($atts['button_text'] === '') {
            $btnText = null;
        }

        $btn = false;
        if ($btnText) {
            $btn = \Azonpress\Classes\Products\Amazon::getButtonStyle('buy', 'custom', $btnText);
        }

        $data = [
            'features' => $firstItem->features(),
            'wrapper_class' => self::getWrapperCssClass($atts),
            'title' => ($atts['title']) ? $atts['title'] : __('Highlighted Features', 'azonpress'),
            'btn_text' => $btnText,
            'btn_url' => ($atts['button_detail']) ? $atts['button_detail'] : $firstItem->productUrl(),
            'button' => $btn
        ];

        View::render('product_templates.feature_box', $data);
    }

    public static function isHidePrice()
    {
        if (self::$hidePrice === null) {
            $settings_appearance = get_option('azonpress_appearance_settings', array());
            self::$hidePrice = ArrayHelper::get($settings_appearance, 'global.hide_price') == 'yes';
        }

        return self::$hidePrice;
    }

    public static function getWrapperCssClass($atts)
    {
        $ui = ArrayHelper::get($atts, 'ui');
        if ($ui == 'classic') {
            return 'azp_classic';
        } elseif ($ui == 'modern') {
            return 'azp_modern';
        }

        if (self::$wrapper_css_class === null) {
            $settings_appearance = get_option('azonpress_appearance_settings', array());
            self::$wrapper_css_class = ArrayHelper::get($settings_appearance, 'global.ui_styles');
        }

        return self::$wrapper_css_class;
    }

    public static function getLastUpdateTime($items)
    {
        $lastUpdate = false;
        foreach ($items as $item) {
            if (!$lastUpdate) {
                $lastUpdate = $item->last_updated();
                continue;
            }
            if ($lastUpdate < $item->last_updated()) {
                $lastUpdate = $item->last_updated();
            }
        }
        return $lastUpdate;
    }
}
