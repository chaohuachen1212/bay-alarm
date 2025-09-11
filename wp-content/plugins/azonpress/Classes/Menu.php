<?php namespace Azonpress\Classes;

class Menu
{
    public function register()
    {
        $capability = azonpressCurrentAccessPermission();
        add_menu_page(
            __('AzonPress', 'azonpress'),
            __('AzonPress', 'azonpress'),
            $capability,
            'azonpress',
            array($this, 'renderList'),
            $this->getIcon(),
            50
        );

        if (current_user_can($capability)) {
            global $submenu;

            $licenseStatus = get_option('_azonpress_license_status');
            if ($licenseStatus != 'valid') {
                $submenu['azonpress']['activate_license'] = array(
                    '<span style="color:#f39c12;">Activate License</span>',
                    $capability,
                    'admin.php?page=azonpress#/settings/licensing',
                    '',
                    'azonpress_license_menu'
                );
            }

            $submenu['azonpress']['dashboard'] = array(
                __('Dashboard', 'azonpress'),
                $capability,
                'admin.php?page=azonpress#/'
            );
            $submenu['azonpress']['comparison_tables'] = array(
                __('Comparison Tables', 'azonpress'),
                $capability,
                'admin.php?page=azonpress#/comparison_tables',
            );
            $submenu['azonpress']['product_tables'] = array(
                __('Product Tables', 'azonpress'),
                $capability,
                'admin.php?page=azonpress#/product_tables',
            );
            $submenu['azonpress']['settings'] = array(
                __('Settings', 'azonpress'),
                $capability,
                'admin.php?page=azonpress#/settings',
            );
            $submenu['azonpress']['help'] = array(
                __('<span style="color: #c9990e;">Help</span>', 'azonpress'),
                $capability,
                'admin.php?page=azonpress#/guide',
            );
        }
    }

    public function renderList()
    {
        if (function_exists('wp_enqueue_editor')) {
            wp_enqueue_editor();
            wp_enqueue_media();
        }

        wp_enqueue_style('azonpress_admin', azonPressAsset('css/azonpress_admin.css'));


        wp_enqueue_script(
            'azonpress_boot',
            azonPressAsset('js/main.js'),
            array('jquery'),
            AZONPRESS_PLUGIN_VERSION,
            true
        );

        wp_localize_script('azonpress_boot', 'azp_admin_vars', array(
            'azp_admin_nonce' => wp_create_nonce('azp_admin_nonce'),
            'images_url' => AZONPRESS_PLUGIN_URL . 'public/images/',
            'ace_path' => AZONPRESS_PLUGIN_URL . 'public/libs/ace',
            'license_status' => get_option('_azonpress_license_status')
        ));

        do_action('azonpress_admin_app_boot');

        View::render('azonpress_admin_app');
    }

    public function getIcon()
    {
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 314.48 241.02"><defs><style>.cls-1{fill:#fff;}</style></defs><title>icon</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M94.19,132H107a30.87,30.87,0,0,0,30.78-30.89V101H92.48A35,35,0,0,1,57.42,66h0A35,35,0,0,1,92.48,31H137.8v-.11A30.87,30.87,0,0,0,107,0H94.19A65.91,65.91,0,0,0,28.35,65.92V66A65.94,65.94,0,0,0,94.19,132Z"/><path class="cls-1" d="M250.66,66h0a35,35,0,0,1-35.06,35H170.29v.11A30.87,30.87,0,0,0,201.07,132h12.83a65.91,65.91,0,0,0,65.84-65.92V66A65.94,65.94,0,0,0,213.89,0H201.07a30.87,30.87,0,0,0-30.78,30.89V31H215.6A35,35,0,0,1,250.66,66Z"/><rect class="cls-1" x="105.66" y="52" width="97" height="29" rx="7.02" ry="7.02"/><path class="cls-1" d="M311.5,191.74c-134.35,45.44-261,37.87-310.26-19.13-.52-.61-1.56.1-1.14.77,41.57,66.71,152.8,87.9,261.7,46.26a330.78,330.78,0,0,0,51.41-24.88C315.67,193.3,314.25,190.81,311.5,191.74Z"/></g></g></svg>';
        return 'data:image/svg+xml;base64,'
            . base64_encode($svg);
    }
}
