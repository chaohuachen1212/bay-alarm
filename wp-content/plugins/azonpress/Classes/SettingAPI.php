<?php namespace Azonpress\Classes;

use Azonpress\Classes\Products\Amazon;

class SettingAPI
{
    public static $geolite2DB = 'https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-Country&suffix=tar.gz';

    public static function handleAjaxEndpoints()
    {
        $routes = array(
            'get_amazon_credentials'  => 'getAmazonCredential',
            'save_amazon_credentials' => 'saveAmazonCredentials',
            'get_link_settings'       => 'getLinkSettings',
            'update_link_settings'    => 'updateLinkSettings',
            'get_other_settings'      => 'getOtherSettings',
            'update_other_settings'   => 'updateOtherSettings',
        );
        $route = sanitize_text_field($_REQUEST['route']);
        if (isset($routes[$route])) {
            return self::{$routes[$route]}();
        }
        die();
    }

    public static function getAmazonCredential()
    {
        $credentials = Amazon::getAmazonCredentials();

        wp_send_json_success(array(
            'amazon_credentials' => $credentials,
            'countries' => Amazon::getCountries(),
            'stores' => Amazon::getStores(),
            'maxmind_exist' => self::maxMindFileExist()
        ), 200);
    }

    public static function saveAmazonCredentials()
    {
        $status = 'no';
        $api_error = '';
        $credentials = wp_unslash($_REQUEST['amazon_credentials']);
        update_option('azonpress_amazon_credentials', $credentials);

        $testCredential = $credentials;
        if (defined('AZONPRESS_AMAZON_API_KEY')) {
            $testCredential['api_key'] = AZONPRESS_AMAZON_API_KEY;
        }
        if (defined('AZONPRESS_AMAZON_API_SECRET')) {
            $testCredential['api_secret'] = AZONPRESS_AMAZON_API_SECRET;
        }

        try {
            $status = Amazon::verifyAmazonApiStatus($testCredential);
        } catch (\Exception $exception) {
            $api_error = $exception->getMessage();
        }

        $credentials['status'] = $status;
        update_option('azonpress_amazon_credentials', $credentials);
        if ($credentials['geo_type'] == 'custom') {
            $maxMindKey = ArrayHelper::get($credentials, 'maxmind_api_key');
            do_action('azonpress_geo_type', $credentials['geo_type'], $credentials['status'], $maxMindKey);
        }

        wp_send_json_success(array(
            'message'    => __('Credential Successfully updated', 'azonpress'),
            'api_status' => $status,
            'api_error'  => $api_error
        ));
    }

    public static function downloadMaxMindDB($geoType, $status, $key)
    {
        $uploadDir = wp_upload_dir();
        $uploadDir = $uploadDir['basedir'] . '/';
        $dbName = 'GeoLite2-Country.mmdb';
        $destPath = $uploadDir . $dbName;
        $isUpdating = false;
        if (file_exists($destPath)) {
            $fileTime = fileatime($destPath);
            if (time() - $fileTime > 2592000) {
                $isUpdating = true;
            } else {
                return;
            }
        }

        require_once ABSPATH . 'wp-admin/includes/file.php';
        $url = $download_url = add_query_arg('license_key', $key, static::$geolite2DB);
        $tmpDatabasePath = download_url($url);

        if (!is_wp_error($tmpDatabasePath)) {
            try {
                $file = new \PharData($tmpDatabasePath);
                $filePath = trailingslashit($file->current()->getFileName()) . $dbName;
                $file->extractTo($uploadDir, $filePath, true);
                @unlink($destPath);
                @rename($uploadDir . $filePath, $destPath);
                @rmdir($uploadDir . $file->current()->getFileName());
                @chmod($destPath, 0644);
            } catch (\Exception $e) {
                wp_send_json_error([
                    'message' => $e->getMessage()
                ]);
                // Maybe show error message that db downloaded but couldn't finish the process...
            }
            @unlink($tmpDatabasePath);
        } else {
            if (wp_doing_ajax() && !$isUpdating) {
                wp_send_json_error([
                    'message' => 'From Maxmind API Error: '.$tmpDatabasePath->get_error_message()
                ], 423);
            }
            return false;
        }
    }

    public static function getLinkSettings()
    {
        $settings = Amazon::getAppearanceSettings('admin');
        wp_send_json_success(array(
            'global_link_settings' => $settings['global'],
            'button_styles'        => Amazon::getButtonStyles()
        ));
    }

    public static function updateLinkSettings()
    {
        $settings = array();
        if (isset($_REQUEST['global_link_settings'])) {
            $global_link_settings = wp_unslash($_REQUEST['global_link_settings']);
            $settings['global'] = $global_link_settings;
        }

        if ($settings) {
            $settings = apply_filters('azonpress_appearance_settings_save', $settings);
            update_option('azonpress_appearance_settings', $settings);
        }

        wp_send_json_success(array(
            'message' => __('Settings successfully updated', 'azonpress')
        ));
    }

    public static function getOtherSettings()
    {
        $roles = get_editable_roles();
        $formattedRoles = array();
        foreach ($roles as $key => $role) {
            if ($key != 'subscriber' && $key != 'administrator') {
                $formattedRoles[] = array(
                    'name' => $role['name'],
                    'key'  => $key
                );
            }
        }
        $globalLoading = get_option('_azonpress_global_asset_loading', 'no');
        $accessLevels  = get_option('_azonpress_access_levels', array());
        wp_send_json_success(array(
            'global_loading' => $globalLoading,
            'access_levels'  => $accessLevels,
            'access_roles'   => $formattedRoles
        ), 200);
    }

    public static function updateOtherSettings()
    {
        if (!current_user_can('manage_options')) {
            wp_send_json_error(array(
                'message' => __('Sorry! Only administrator can make the changes of these settings', 'azonpress')
            ), 423);
            return;
        }

        $levels = ArrayHelper::get($_REQUEST, 'access_levels');
        $accessLevels   = wp_unslash($levels);
        if (!is_array($accessLevels)) {
            $accessLevels = [];
        }
        $global_loading = sanitize_text_field($_REQUEST['global_loading']);
        update_option('_azonpress_global_asset_loading', $global_loading);
        update_option('_azonpress_access_levels', $accessLevels);

        wp_send_json_success(array(
            'message' => __('Settings has been updated successfully', 'azonpress')
        ), 200);
    }

    public static function maxMindFileExist()
    {
        $uploadDir = wp_upload_dir();
        $uploadDir = $uploadDir['basedir'] . '/';
        $dbName = 'GeoLite2-Country.mmdb';
        $destPath = $uploadDir . $dbName;
        return file_exists($destPath);
    }
}
