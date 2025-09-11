<?php defined('ABSPATH') or die;
/*
Plugin Name: AzonPress
Description: Azonpress - The Most Advanced Amazon Affiliate Plugin.
Version: 2.0.8
Author: WPManageNinja
Author URI: https://wpmanageninja.com
Plugin URI: https://wpmanageninja.com/azonpress
License: GPLv2 or later
Text Domain: azonpress
Domain Path: /resources/languages
*/

define('AZONPRESS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('AZONPRESS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AZONPRESS_PLUGIN_FILE', __FILE__);
define('AZONPRESS_PLUGIN_VERSION', '2.0.8');
define('AZONPRESS_AMAZON_API_VERSION', '5.0');

// Declaring Global AzonPress variable
global $azonpress;

register_activation_hook(__FILE__, function ($network_wide) {
    include AZONPRESS_PLUGIN_PATH.'Classes/Activator.php';
    \Azonpress\Classes\Activator::handleActivation($network_wide);
});

include 'Classes/libs/Updater/updater.php';

add_action('plugins_loaded', function () {
    include AZONPRESS_PLUGIN_PATH.'Classes/Bootstrap.php';
    $bootstrap = new \Azonpress\Classes\Bootstrap();
    $bootstrap->boot();
});
