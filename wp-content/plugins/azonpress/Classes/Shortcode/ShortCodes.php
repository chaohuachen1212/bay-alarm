<?php

namespace Azonpress\Classes\Shortcode;

use MaxMind\Db\Reader;
use Azonpress\Classes\View;
use Azonpress\Classes\ArrayHelper;
use Azonpress\Classes\Products\Amazon;
use Azonpress\Classes\Products\ProductApi;

class ShortCodes
{
    /**
     * Get the target store link anf tracking id
     * @return array
     */
    public static function getTargetStoreInfo()
    {
        $ipAddress = static::getClientIp();
        return static::getStoreInfoByCountry(
            static::getCountryByUserIp($ipAddress)
        );
    }

    /**
     * Get the country by user ip address
     * @param string $ip
     * @return string two letter iso-2 country code
     */
    public static function getCountryByUserIp($ip)
    {
        try {
            $uploadDir = wp_get_upload_dir();
            $databaseFile = $uploadDir['basedir'] . '/GeoLite2-Country.mmdb';
            $reader = new Reader($databaseFile);
            $result = $reader->get($ip);
            $reader->close();
            return $result['country']['iso_code'];
        } catch (\Exception $exception) {
            return false;
        }
    }

    /**
     * Get the user ip address
     * @return string
     */
    public static function getClientIp()
    {
        $sources = array(
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        );

        foreach ($sources as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                        return $ip;
                    }
                }
            }
        }
    }

    /**
     * Get the store info by country code
     * @param string $countryCode
     * @return array | false
     */
    public static function getStoreInfoByCountry($countryCode)
    {
        if (!$countryCode) {
            return false;
        }

        $credentials = Amazon::getAmazonCredentials();

        // If we've a dedicated store for the country
        foreach (Amazon::getStores() as $key => $store) {
            $iso2Code = $store['iso_2_country_code'];
            if (strtoupper($iso2Code) == strtoupper($countryCode) && isset($credentials['stores'][$key]['tracking_id'])) {
                return array(
                    'url' => $key,
                    'country' => $countryCode,
                    'base_store' => $credentials['country'],
                    'tracking_id' => ArrayHelper::get($credentials, 'stores.' . $key . '.tracking_id')
                );
            }
        }

        // If we've a mapping of that country in any store
        foreach ($credentials['stores'] as $tld => $mappedStore) {
            if (!empty($mappedStore['countries']) && in_array($countryCode, $mappedStore['countries'])) {
                return array(
                    'url' => $tld,
                    'country' => $countryCode,
                    'base_store' => $credentials['country'],
                    'tracking_id' => $mappedStore['tracking_id']
                );
            }
        }

        // Noting found, the default store will be used
        return false;
    }

    /**
     * Default country info (Nothing)
     * @param string $code ISO2 Country Code
     * @return array
     */
    public static function getDefault($code)
    {
        return array('url' => null, 'country' => $code, 'tracking_id' => null);
    }

    public static function handleProductDisplayShortCodes($atts, $content = '')
    {
        // [azonpress template="box" department="computers" type="bestseller" keyword="graphics card"]
        $defaults = array(
            'ribbon_prefix' => '',
            'ribbon_suffix' => '',
            'asin' => '',
            'limit' => 5,
            'columns' => 3,
            'keyword' => '',
            'template' => 'box',
            'type' => '',
            'ui' => '',
            'size' => 'medium',
            'title' => null,
            'content' => null,
            'button_text' => null,
            'button_detail' => null,
            'department' => '',
            'random' => false
        );

        self::enqueueTableAssets();

        $atts = shortcode_atts($defaults, $atts);

        if ($content) {
            $atts['content'] = $content;
        }

        $items = array();

        if ($atts['asin']) {
            $productArray = explode(',', $atts['asin']);
            if (!empty($atts['random'])) {
                shuffle($productArray);
            }
            $items = ProductApi::getProducts($productArray);
        } elseif (!empty($atts['keyword'])) {
            $limit = 5;
            if (!empty($atts['limit'])) {
                $limit = intval($atts['limit']);
            }

            $searchListString = ArrayHelper::get($atts, 'department') . ':' . ArrayHelper::get($atts, 'type') . ':' . $limit . ':' . $atts['keyword'];

            // check if the search string is exists in database
            $exists = azonPressDBModel('azonpress_lists')
                ->where('type', 'search_lists')
                ->where('title', $searchListString)
                ->first();

            if ($exists && (time() - strtotime($exists->updated_at)) < 86400) {
                $items_asins = json_decode($exists->rows, true);
                $items = ProductApi::getProducts($items_asins);
            } else {
                // @todo: Maybe we have to improve this in future
                $keyword = sanitize_text_field($atts['keyword']);
                $sortBy = null;
                $department = null;
                if ($atts['type'] == 'bestseller') {
                    $department = $atts['department'];
                }

                $itemsFromSearch = ProductApi::searchProducts($keyword, $itemPage = 1, $limit, $department, $sortBy = 'Featured', 'New', 'bool');
                $items = ArrayHelper::get($itemsFromSearch, 'formattedItems');

                $items_asins = [];
                foreach ($items as $isin => $item) {
                    $items_asins[] = $isin;
                }
                if (!$items_asins) {
                    return '';
                }
                if ($exists) {
                    azonPressDBModel('azonpress_lists')
                        ->where('id', $exists->id)
                        ->update(array(
                            'rows' => json_encode($items_asins),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ));
                } else {
                    azonPressDBModel('azonpress_lists')
                        ->insert(array(
                            'title' => $searchListString,
                            'type' => 'search_lists',
                            'rows' => json_encode($items_asins),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ));
                }
                $items = ProductApi::getProducts($items_asins);
            }
        }

        if (!$items) {
            return '';
        }

        ob_start();
        do_action('azonpress_product_display_' . $atts['template'], $items, $atts);
        $content = ob_get_clean();

        return apply_filters('azonpress_rendered_template_content_' . $atts['template'], $content, $items, $atts);
    }

    public static function elementShortCodes($atts, $content = '')
    {
        $defaults = array(
            'element' => '',
            'asin' => '',
            'size' => 'medium',
            'type' => 'extended'
        );

        $inputs = array_merge($defaults, $atts);
        $atts = shortcode_atts($inputs, $atts);
        extract($atts);

        if (!$asin) {
            return '';
        }

        $acceptedElements = array(
            'url' => array(
                'method' => 'productUrl'
            ),
            'image_url' => array(
                'method' => 'images',
                'param' => $size
            ),
            'image_html' => array(
                'method' => 'getImageHtml',
                'param' => $size
            ),
            'price' => array(
                'method' => 'price'
            ),
            'price_html' => array(
                'method' => 'priceHTML'
            ),
            'title' => array(
                'method' => 'title'
            ),
            'features' => array(
                'method' => 'featuresHtml'
            ),
            'buy_button' => array(
                'method' => 'buyButton'
            ),
            'cart_button' => array(
                'method' => 'addToCartButton'
            ),
            'prime' => array(
                'method' => 'getPrimeHtml'
            )
        );

        if (!isset($acceptedElements[$element])) {
            return '';
        }

        $elementConfig = $acceptedElements[$element];
        $item = ProductApi::getProduct($asin);
        if (!$item) {
            return '';
        }
        ShortCodes::enqueueGeoLocation();
        if (isset($elementConfig['param'])) {
            $param = $elementConfig['param'];
            if ($element == 'image_url') {
                $images = $item->{$elementConfig['method']}($param);
                if ($images && isset($images[$size])) {
                    return $images[$size];
                }
            } elseif ($element == 'image_html') {
                $item->getImageHtml($size, false);
            }
            return $item->{$elementConfig['method']}($param);
        } else {
            return $item->{$elementConfig['method']}();
        }
        return '';
    }

    public static function enqueueTableAssets()
    {
        wp_register_script( 'azp_shortcode_ajax',
            azonPressAsset('js/azp_pagination.js')
        );

        $azp_ajax_array = array(
         'ajaxurl' => admin_url('admin-ajax.php')
         );

        wp_localize_script('azp_shortcode_ajax', 'azp_ajax' , $azp_ajax_array);

        wp_enqueue_script (
        'azp_shortcode_ajax'
        );

        wp_enqueue_script (
            'jquery'
        );

        wp_enqueue_style(
            'azonpress_public_css',
            azonPressAsset('css/azonpress_public.css')
        );

        if (!did_action('azonpress_custom_css_loaded')) {
            $customCss = self::generateDynamicCss();
            if ($customCss) {
                wp_add_inline_style('azonpress_public_css', $customCss);
            }
            do_action('azonpress_custom_css_loaded');
        }

        self::enqueueGeoLocation();
    }

    public static function enqueueGeoLocation()
    {
        $geoType = Amazon::getGeoTargetingType();
        if ($geoType == 'custom') {
            $targetCountryData = static::getTargetStoreInfo();
            if ($targetCountryData) {
                wp_enqueue_script(
                    'azonpress_geo_location',
                    azonPressAsset('js/azonpress_geo_location.js'),
                    array('jquery'),
                    AZONPRESS_PLUGIN_VERSION,
                    true
                );

                wp_localize_script(
                    'azonpress_geo_location',
                    'azonpress_country_info',
                    $targetCountryData
                );
            }
        } elseif ($geoType == 'onelink') {
            global $azonpress;
            if (!isset($azonpress['pushed_one_code'])) {
                $credential = Amazon::getAmazonCredentials();
                if ($onelinkCode = ArrayHelper::get($credential, 'onlink_code')) {
                    $azonpress['pushed_one_code'] = true;
                    add_action('wp_footer', function () use ($onelinkCode) {
                        echo $onelinkCode;
                    });
                }
            }
        }
    }

    public static function generateDynamicCss()
    {
        $button = Amazon::getButtonStyle('buy');
        $customStyles = ArrayHelper::get($button, 'custom_styles', []);

        $css = '';
        $normalStyles = ArrayHelper::get($customStyles, 'normal_styles');
        if ($normalStyles) {
            $style = self::generateStyle($normalStyles);
            if ($style) {
                $css = 'a.azp-url.azp_button_type_custom {' . $style . '}';
            }
        }

        $hoverStyles = ArrayHelper::get($customStyles, 'hover_styles');
        if ($hoverStyles) {
            $style = self::generateStyle($hoverStyles);
            if ($style) {
                $css .= ' a.azp-url.azp_button_type_custom:hover {' . $style . '};';
            }
        }

        return $css;
    }

    public static function generateStyle($styles)
    {
        $string = '';
        $keyPairs = [
            'backgroundColor' => 'background',
            'borderColor' => 'border-color',
            'borderRadius' => 'border-radius',
            'minWidth' => 'min-width',
            'color' => 'color',
            'lineHeight' => 'line-height'
        ];

        foreach ($styles as $index => $style) {
            if (!isset($keyPairs[$index])) {
                continue;
            }

            $keyName = $keyPairs[$index];

            if (($keyName == 'border-radius' || $keyName == 'line-height') && ($style || $style == '0')) {
                $style .= 'px';
            }

            if (!$style) {
                continue;
            }
            $string .= "{$keyName}: {$style};";
        }
        return $string;
    }
}
