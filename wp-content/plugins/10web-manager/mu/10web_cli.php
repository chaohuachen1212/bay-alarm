<?php


function tenweb_cli_site_state($args, $assoc_args)
{
    \Tenweb_Manager\Helper::check_site_state(true);
    WP_CLI::success('Success');
}

function tenweb_cli_login($args, $assoc_args)
{
    $login = \Tenweb_Manager\Login::get_instance();
    $login_args = array("domain_hash" => $args[2], "type" => $args[3], "is_10web" => 1);
    if (!$login->login($args[0], '10web', $args[1], $login_args)) {
        WP_CLI::error('Cannot Login');
    }
    WP_CLI::log(get_site_option('tenweb_domain_id'));
}

function tenweb_cli_install_template($args, $assoc_args)
{
    if (!defined('TENWEB_INCLUDES_DIR')) {
        WP_CLI::error('Manager plugin not installed');
    }
    require_once(TENWEB_INCLUDES_DIR . "/class-rest-api.php");
    $rest_api = \Tenweb_Manager\RestApi::get_instance();
    $template_id = $args[1];
    $type = $args[2];
    $action = $args[0];
    $template_import_actions = array('install', 'start-import', 'import-plugins', 'import-site', 'finalize-import');
    $template_url = isset($args[3]) ? $args[3] : ''; //10webX

    foreach ($template_import_actions as $import_action) {

        $response = $rest_api->install_template($template_id, $template_url, $type, $action);

        if (!isset($response['status'])) {
            WP_CLI::error('Error has occurred');
        }

        if ((int)$response['status'] != 200) {
            WP_CLI::error(json_encode($response['data_for_response']));
        }
    }


    WP_CLI::success('Successfully installed.');

}

if (class_exists('WP_CLI')) {
    WP_CLI::add_command('10web-login', 'tenweb_cli_login');
    WP_CLI::add_command('10web-state', 'tenweb_cli_site_state');
    WP_CLI::add_command('10web-template', 'tenweb_cli_install_template');
}