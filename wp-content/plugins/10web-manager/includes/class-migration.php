<?php

namespace Tenweb_Manager {

    class Migration
    {
        const MIGRATION_DB_FILE_NAME     = "10web_migration_db.sql";
        const MIGRATION_CONFIG_FILE_NAME = "10web_migration_config.json";
        const MIGRATION_ARCHIVE          = "10web_migration";
        protected $wpdb;

        /**
         * Migration constructor.
         *
         */
        public function __construct()
        {
            global $wpdb;
            $this->wpdb = $wpdb;

        }

        /**
         * @return string
         */
        public static function getMigrationArchive()
        {
            // we need zlib to use gzencode function
            if (Helper::get_migration_archive_type() == 'gzip') {
                return self::MIGRATION_ARCHIVE . '.tar.gz';
            } else {
                return self::MIGRATION_ARCHIVE . '.zip';
            }
        }


        /**
         * @param $delete_db_options
         *
         * function for removing  files, if something goes wrong
         */
        public static function role_back($delete_db_options = true)
        {
            self::recursive_remove_dir(Helper::get_tmp_dir());
            if ($delete_db_options === true) {
                self::role_back_db();
            }
        }

        public static function role_back_db()
        {
            delete_site_transient('tenweb_subdomain');
            delete_site_transient('tenweb_migrate_live');
            delete_site_transient('tenweb_migrate_domain_id');
            delete_site_transient('tenweb_migrate_region');
            delete_site_transient('tenweb_tp_domain_name');
        }

        public static function recursive_remove_dir($dir)
        {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (is_dir($dir . "/" . $object))
                            rmdir($dir . "/" . $object);
                        else
                            unlink($dir . "/" . $object);
                    }
                }
                rmdir($dir);
            }
        }

    }
}