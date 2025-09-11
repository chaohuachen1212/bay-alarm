<?php namespace Azonpress\Classes;

class Activator
{
    /**
     * This method will be called on plugin activation
     *
     * @return void
     */
    public static function handleActivation($network_wide = false)
    {
        global $wpdb;

        if ($network_wide) {
            // Retrieve all site IDs from this network (WordPress >= 4.6 provides easy to use functions for that).
            if (function_exists('get_sites') && function_exists('get_current_network_id')) {
                $site_ids = get_sites(array( 'fields' => 'ids', 'network_id' => get_current_network_id() ));
            } else {
                $site_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs WHERE site_id = $wpdb->siteid;");
            }
            // Install the plugin for all these sites.
            foreach ($site_ids as $site_id) {
                switch_to_blog($site_id);
                self::createDataTablesTables();
                restore_current_blog();
            }
        } else {
            self::createDataTablesTables();
        }
    }

    /**
     * Create Table for datatable which will hold the primary info of a table
     *
     * @since    1.0.0
     */
    public static function createDataTablesTables()
    {
        self::CreateProductCache();
        self::createProductList();
    }

    public static function CreateProductCache()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        /*Azonpress*/
        $table_name_azonpress = $wpdb->prefix . 'azonpress_product_cache';
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name_azonpress'") != $table_name_azonpress) {
            $sql = "CREATE TABLE $table_name_azonpress (
				`asin` VARCHAR(45) NOT NULL,
				`response` LONGTEXT NOT NULL,
                `status` VARCHAR (45) DEFAULT 'active',
                `total_rating` INT (11) DEFAULT NULL,
                `average_rating` DECIMAL (10,2) DEFAULT NULL,
                `last_rating_update` datetime,
                `rating_crawl_error_counter` INT(11) DEFAULT 0,
				`created_at` datetime NOT NULL,
				`updated_at` timestamp NOT NULL
			) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

    public static function createProductList()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        /*azonpress_product_tables*/
        $table_name_azonpress_product_tables = $wpdb->prefix . 'azonpress_lists';
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name_azonpress_product_tables'")
            != $table_name_azonpress_product_tables
        ) {
            $sql = "CREATE TABLE $table_name_azonpress_product_tables (
				`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`title` VARCHAR(255) NULL,
				`description` LONGTEXT NULL,
                `type` VARCHAR(45) NULL,
                `rows` LONGTEXT NULL,
                `column_configuration` LONGTEXT NULL,
                `table_settings` LONGTEXT NULL,
                `custom_css` LONGTEXT NULL,
                `total_view` INT (11) DEFAULT 0,
                `created_by` INT (11) DEFAULT 0,
				`created_at` datetime NOT NULL,
				`updated_at` timestamp NOT NULL
			) $charset_collate;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
}
