<?php

function azonPressAsset($assetPath)
{
    return AZONPRESS_PLUGIN_URL . 'public/' . $assetPath;
}

function azonPressDBModel($tableName = false)
{
    return new \Azonpress\Classes\Model($tableName);
}

/**
 * Get Amazon API Instance
 * @param $throwErrorType
 *
 * @return \AzonPressAmazonAPI\AmazonAPI
 * @throws Error
 */
function azonPressGetAmazonAPI($throwErrorType = 'bool')
{
    $credentials = \Azonpress\Classes\Products\Amazon::getAmazonCredentials();
    if ($credentials['status'] != 'yes') {
        $errorMessage = '<p>' . __('Amazon API is not valid, Please configure your api first.', 'azonpress') . '</p>';
        $configUrl = admin_url('admin.php?page=azonpress#/settings/');
        $errorMessage .= '<a href="' . $configUrl . '" target="_blank">' . __('Configure Amazon API') . '</a>';
        if ($throwErrorType == 'error') {
            throw new Error($errorMessage, 300);
        } elseif ($throwErrorType == 'bool') {
            return false;
        } elseif ($throwErrorType == 'ajax') {
            if (wp_doing_ajax()) {
                wp_send_json_error(array(
                    'message_html' => $errorMessage,
                    'message' => __('Amazon API is not valid, Please configure your api first.', 'azonpress'),
                    'api_error' => true
                ), 423);
            }
        }
        throw new Error($errorMessage);
    }

    $urlBuilder = new \AzonPressAmazonAPI\AmazonUrlBuilder(
        $credentials['api_key'],
        $credentials['api_secret'],
        $credentials['tracking_id'],
        $store = \Azonpress\Classes\Products\Amazon::getStore($credentials['country'])
    );

    return new \AzonPressAmazonAPI\AmazonAPI($urlBuilder, 'array');
}

function azonpressGetLiveAPIStatus()
{
    $credentials = \Azonpress\Classes\Products\Amazon::getAmazonCredentials();
    try {
        $status = \Azonpress\Classes\Products\Amazon::verifyAmazonApiStatus($credentials);
        if (!$status) {
            return true;
        }
    } catch (Exception $exception) {
    }
    return false;
}

/**
 * Lookup amazon products by isin number. You can provide string to get a single
 * product object or pass an array to get product objects as an array.
 *
 * @param $isin array|String
 *
 * @return mixed Array | Object
 */
function azonPressGetItemByISIN($isin)
{
    return \Azonpress\Classes\Products\ProductApi::getProduct($isin);
}


function azonpressValidListTypes()
{
    return apply_filters('azonpress_valid_list_types', array(
        'bestseller' => 'relevanceblender',
        'newest' => 'date-desc-rank',
        'lowest_price' => 'price-asc-rank',
        'highest_price' => 'price-desc-rank',
        'top_review' => 'review-rank'
    ));
}

function azonpressGetValidListType($type)
{
    $validTypes = azonpressValidListTypes();
    if (!isset($validTypes[$type])) {
        return $type = 'bestseller';
    }
    return \Azonpress\Classes\ArrayHelper::get($validTypes, $type, 'relevanceblender');
}

function azonpressCurrentAccessPermission()
{
    if (current_user_can('manage_options')) {
        return 'manage_options';
    }
    $accessLevels = get_option('_azonpress_access_levels', array());
    foreach ($accessLevels as $accessLevel) {
        if (current_user_can($accessLevel)) {
            return $accessLevel;
        }
    }
    return false;
}

function azonpressCheckAdminAjaxAccess()
{
    azpValidateNonce();
    if (azonpressCurrentAccessPermission()) {
        return true;
    }
    wp_send_json_error(array(
        'message' => __('Sorry, You do not have access to do this action', 'azonpress')
    ), 423);
}


function azpValidateNonce($key = 'azp_admin_nonce')
{
    $nonce = \Azonpress\Classes\ArrayHelper::get($_REQUEST, $key);
    $shouldVerify = apply_filters('azp_nonce_verify', true);

    if ($shouldVerify && !wp_verify_nonce($nonce, $key)) {
        $errors = apply_filters('azp_nonce_error', [
            'error' => [
                __('Nonce verification failed, please try again.', 'azp_app')
            ]
        ]);

        wp_send_json($errors['error'], 422);
    }
}
