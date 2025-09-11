<?php

require_once 'AzonPressUpdateChecker.php';
require 'AzonPressUpdater.php';

// Kick off our EDD class
new \Azonpress\Classes\Libs\Updater\AzonPressUpdateChecker( array(
	// The plugin file, if this array is defined in the plugin
	'plugin_file' => AZONPRESS_PLUGIN_FILE,
	// The current version of the plugin.
	// Also need to change in readme.txt and plugin header.
	'version' => AZONPRESS_PLUGIN_VERSION,
	// The main URL of your store for license verification
	'store_url' => 'https://wpmanageninja.com',
	'item_name' => 'AzonPress',
	// Your name
	'author' => 'WP Manage Ninja',
	// The URL to renew or purchase a license
	'purchase_url' => 'https://wpmanageninja.com/downloads/azonpress/',
	// The URL of your contact page
	'contact_url' => 'https://wpmanageninja.com/contact',
	// This should match the download name exactly
	'item_id' => '30125',
	// The option names to store the license key and activation status
	'license_key' => '_azonpress_license_key',
	'license_status' => '_azonpress_license_status',
	// Option group param for the settings api
	'option_group' => '_azonpress_license',
	// The plugin settings admin page slug
	'admin_page_slug' => 'azonpress',
	// If using add_menu_page, this is the parent slug to add a submenu item underneath.
	'activate_url' => admin_url('admin.php?page=azonpress#/settings/licensing'),
	// The translatable title of the plugin
	'plugin_title' => __( 'AzonPress', 'azonpress' ),
	'menu_slug' => 'azonpress',
	'menu_title' => __('AzonPress', 'azonpress'),
    // How much time (in seconds) the updater won't check the license.
    'cache_time' => 48 * 60 * 60
));
