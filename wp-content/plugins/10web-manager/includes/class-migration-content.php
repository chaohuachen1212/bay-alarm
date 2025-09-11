<?php


namespace Tenweb_Manager {


    class MigrationContent extends Migration
    {

        private $zip = null;
        private $archive_path = null;
        private $files = null;
        private $files_count = null;
        private $total_files_count = null;
        private $method;


        public function __construct()
        {

            parent::__construct();
            // if everything ok, create zip or tar archive
            $this->archive_path = Helper::get_tmp_dir() . "/" . self::getMigrationArchive();

            //tar.gz is set by default as prefered way to archive
            $this->method = Helper::get_migration_archive_type();
        }

        /**
         * @param string $run_type
         *
         * @throws \Exception
         */
        public static function set_up($run_type = 'run')
        {
            if ($run_type == 'run') {
                Helper::store_migration_log('run_type_' . current_time('timestamp'), 'Run type is run.');
                $migration_content = new self();
                $migration_content->run($run_type);
            }
            if ($run_type == 'restart') {
                Helper::store_migration_log('run_type_' . current_time('timestamp'), 'Run type is restart.');
                $migration_content = self::get_object_file_content();
                $migration_content->run($run_type);
            }
        }


        /**
         * @param $run_type
         *
         * @throws \Exception
         */
        public function run($run_type)
        {
            if ($run_type == "run") {
                // check if zip or zlib extension exists
                if ($this->check_if_zip_extension_exists() === false && $this->check_if_zlib_extension_exists() === false) {
                    throw new \Exception("PHP zip or zlib extension is missing");
                }

                // check if config json exists
                if (!file_exists(Helper::get_tmp_dir() . "/" . self::MIGRATION_CONFIG_FILE_NAME)) {
                    throw new \Exception("Config json file is missing");
                }

                // check if db sql exists
                if (!file_exists(Helper::get_tmp_dir() . "/" . self::MIGRATION_DB_FILE_NAME)) {
                    throw new \Exception("Database file is missing");
                }
                $this->files = $this->get_content_files();

                if ($this->method != 'zip') {
                  $tar = new Archive_Tar($this->archive_path, true);
                  Helper::store_migration_log('add_meta_data_to_tar', "Adding meta data..");
                  $tar->addModify(array(Helper::get_tmp_dir() . "/" . self::MIGRATION_CONFIG_FILE_NAME, Helper::get_tmp_dir() . "/" . self::MIGRATION_DB_FILE_NAME), '10web_meta', Helper::get_tmp_dir());
                  Helper::store_migration_log('added_meta_data_to_tar', "Meta data added..");
                  $tar->_close();
                }
            }

            // if everything ok, create zip or tar archive
            if ($this->method == 'zip') {
                // initialize archive object
                $this->zip = new \ZipArchive();
                $this->create_zip_archive();
            } else {
                Helper::store_migration_log('start_create_tar_archive', $this->archive_path);
                $this->create_tar_archive();
            }
        }

        /**
         * @return bool
         */
        private function check_if_zip_extension_exists()
        {
            if (!extension_loaded('zip')) {
                return false;
            }

            Helper::store_migration_log('zip_extension_exists', 'Zip extension exists.');

            return true;
        }

        /**
         * @return bool
         */
        private function check_if_zlib_extension_exists()
        {
            if (!extension_loaded('zlib')) {
                return false;
            }

            Helper::store_migration_log('zlib_extension_exists', 'Zlib extension exists.');

            return true;
        }

        /**
         * @return array
         */
        private function get_content_files()
        {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            Helper::store_migration_log('start_get_content_files', 'Starting get_content_files function.');
            $all_files = array();

            // get wp-content files
            $all_files['wp-content'] = $this->method == 'zip' ? $this->get_files(WP_CONTENT_DIR) : $this->get_files_for_tar(WP_CONTENT_DIR, 'wpcontent');

            // get media files
            $uploads_dir = Helper::get_uploads_dir();
            if (strpos($uploads_dir, WP_CONTENT_DIR) === false) {
                $uploads_dir_basename = str_replace(ABSPATH, '', $uploads_dir);
                $all_files[$uploads_dir_basename] = $this->method == 'zip' ? $this->get_files($uploads_dir) : $this->get_files_for_tar($uploads_dir, 'uploads');
            }

            Helper::store_migration_log('end_get_content_files', 'End get_content_files function.');

            return $all_files;
        }

        /**
         * @param $dir
         *
         * @return array
         */
        private function get_files($dir)
        {
            $files = array();

            $innerIterator = new \RecursiveDirectoryIterator($dir, \RecursiveIteratorIterator::LEAVES_ONLY);
            $filter = $this->get_filter();
            $iterator = new \RecursiveIteratorIterator(new \RecursiveCallbackFilterIterator($innerIterator, $filter));

            foreach ($iterator as $file) {
                $file_path = $file->getRealPath();

                if (!is_dir($file_path) || $this->dir_is_empty($file_path)) {
                    $files[] = $file_path;
                }
            }

            return array_unique($files);
        }

        /**
         * @param $dir
         *
         * @return array
         */
        private function get_files_for_tar($dir, $type)
        {
            $unique_files = $this->get_files($dir);

            $files = array();
            $i = 0;
            $total_files_count = 0;
            $bulk_files = array();

            if (!empty($unique_files)) {
                foreach ($unique_files as $key => $file_path) {
                    $bulk_files[] = $file_path;
                    $i++;

                    if ($i == TENWEB_MIGRATION_BULK_FILES_COUNT) {
                        $files[] = $bulk_files;
                        $total_files_count += $i;
                        $i = 0;
                        $bulk_files = array();
                    }
                }
            }

            if ($i > 0) {
                $files[] = $bulk_files;
                $total_files_count += $i;
            }

            $this->total_files_count = $total_files_count;
            Helper::store_migration_log('total_files_count_in_tar_in_' . $type, $total_files_count . ' files in ' . $dir);

            return $files;
        }

        private function get_exclude_regex()
        {
            $excluded_files = array(
                'imagecache',
                'wp\-content\/w3tc',
                'wp\-content\/w3\-',
                'wp\-content\/wflogs',
                'wp\-content\/mu\-plugins\/sg\-cachepress',
                'wp\-content\/plugins\/sg\-cachepress',
                'wp\-content\/mu\-plugins\/wpmudev\-hosting\.php',
                'wp\-content\/mu\-plugins\/wpmudev\-hosting',
                'wp\-content\/mu\-plugins\/wpengine\-security\-auditor\.php',
                'wp\-content\/mu\-plugins\/wpe\-wp\-sign\-on\-plugin',
                'wp\-content\/mu\-plugins\/wpe\-wp\-sign\-on\-plugin\.php',
                'wp\-content\/mu\-plugins\/slt\-force\-strong\-passwords\.php',
                'wp\-content\/mu\-plugins\/stop\-long\-comments\.php',
                'wp\-content\/mu\-plugins\/force\-strong\-passwords',
                'wp\-content\/object\-cache\.php$',
                'wp\-content\/envato\-backups',
                'wp\-content\/Dropbox_Backup',
                'wp\-content\/et\-cache',
                "wp\-content\/.*\-wprbackups$",
                "wp\-content\/.*\-backups$",
                'wp\-content\/updraft$',
                '\.htaccess',
                '\._htaccess',
                'wp\-config\-sample\.php',
                'mu\-plugins\/wpengine\-common',
                'mu\-plugins\/mu\-plugin\.php',
                'mu\-plugins\/kinsta\-mu\-plugins\.php',
                '\.svn$',
                '\.git$',
                '\.log$',
                '\.tmp$',
                '\.listing$',
                '\.cache$',
                '\.bak$',
                '\.swp$',
                '\~',
                '_wpeprivate',
                'wp\-content\/cache',
                'wp\-content\/cache_old',
                'ics\-importer\-cache',
                'gt\-cache',
                'plugins\/wpengine\-snapshot\/snapshots',
                'wp\-content\/backups',
                'wp\-content\/managewp',
                'wp\-content\/upgrade',
                'kinsta\-mu\-plugins',
                'wp\-content\/advanced\-cache\.php',
                'wp\-content\/wp\-cache\-config\.php',
                'wp\-content\/advanced\-cache\.php',
                'wp\-content\/wp\-cache\-config\.php',
                'ai1wm\-backups$',
                'uploads\/snapshots',
                'uploads\/backup',
                'uploads\/backups',
                'uploads\/em\-cache',
                'uploads\/ewpt_cache',
                'uploads\/ShortpixelBackups',
                'uploads\/backupbuddy_backups',
                'uploads\/backupbuddy_temp',
                'uploads\/webarx\-backup',
                'uploads\/iw\-backup',
                'uploads\/fw\-backup',
                'uploads\/10web_tmp',
                'uploads\/wp\-clone',
                'wp\-content\/bps\-backup',
                'wp\-content\/wptouch\-data',
                'aiowps_backups$',
                'aiowps\-backups$');

            $excluded_files[] = preg_quote(Helper::get_tmp_dir(), '/');

            return "/(" . implode("|", $excluded_files) . ")/i";
        }

        private function get_filter()
        {
            $path_regex = $this->get_exclude_regex();

            $filter = function ($file, $key, $iterator) use ($path_regex) {
                return !preg_match($path_regex, $file->getRealPath(), $matches);
            };

            return $filter;
        }

        /**
         * function for creating zip archive from wp-content dir
         *
         * @throws \Exception
         */
        private function create_zip_archive()
        {
            Helper::store_migration_log('start_create_zip_archive', 'Starting create_zip_archive function.');

            if ($this->zip->open($this->archive_path, \ZipArchive::CREATE) !== true) {
                throw new \Exception("Unable to open zip");
            }

            $all_files = $this->files;
            foreach ($all_files as $type => &$files) {
                if (!empty($files)) {
                    $t = current_time('timestamp');
                    Helper::store_migration_log('start_files_iteration_' . $t, 'Starting files iteration.');
                    foreach ($files as $key => $file_path) {
                        unset($files[$key]);
                        $this->files = $all_files;

                        if ($type == "wp-content") {
                            $relative_path = $type . "/" . substr($file_path, strlen(WP_CONTENT_DIR) + 1);
                        } else {
                            $relative_path = $type . "/" . substr($file_path, strlen(ABSPATH . $type) + 1);
                        }
                        if (!is_dir($file_path)) {
                            // add current file to archive
                            $this->add_file_to_archive($file_path, $relative_path);
                        } else {
                            $this->zip->addEmptyDir($relative_path);
                        }
                        $this->files_count++;
                        if ($this->files_count % 600 == 0) {
                            $this->archive_reload();
                        }
                        $this->check_for_restart();
                    }

                    Helper::store_migration_log('end_files_iteration_' . $t, 'End files iteration.');
                }
            }

            // add other necessary files to zip
            $this->add_external_files_to_archive();

            // after all close
            @$this->zip->close();

            Helper::store_migration_log('end_create_zip_archive', 'End create_zip_archive function.');
        }

        /**
         * @return bool
         */
        private function check_for_restart()
        {
            $max_exec_time_server = ini_get('max_execution_time');
            $start = get_site_transient(TENWEB_PREFIX . "_migration_start_time");
            $script_exec_time = microtime(true) - $start;

            if ($script_exec_time >= ((int)$max_exec_time_server - TENWEB_MIGRATION_EXEC_TIME_OFFSET) || ($this->files_count != 0 && $this->files_count % TENWEB_MIGRATION_MAX_FILES_RESTART == 0)) {
                $this->restart();

                return false;
            }
        }

        private function restart()
        {
            Helper::store_migration_log('start_restart_' . current_time('timestamp'), 'Starting restart.');
            $this->write_object_file();
            update_site_option('tenweb_migration_restart', 1);
            // close archives
            if ($this->method == 'zip') {
                @$this->zip->close();
            } else if ($this->method == 'gzip') {
                //@$this->tar->_close();
            }

            Helper::store_migration_log('end_restart_' . current_time('timestamp'), 'End restart.');
            self::restart_request();
            die();
        }

        private function write_object_file()
        {
            $content = serialize($this);
            file_put_contents(Helper::get_tmp_dir() . '/content_object.txt', $content);
        }

        private static function restart_request()
        {
            $url = add_query_arg(array('rest_route' => '/' . TENWEB_REST_NAMESPACE . '/restart_migration_file'), get_home_url() . "/");

            wp_remote_post($url, array('method' => 'POST', 'timeout' => 0.1, 'body' => array('tenweb_nonce' => wp_create_nonce('wp_rest'))));
        }

        /**
         * @param      $file_path
         * @param      $file_relative_path
         *
         * @return bool
         * @throws \Exception
         */
        private function add_file_to_archive($file_path, $file_relative_path)
        {

            if ($this->method == 'zip') {
                if ($this->zip->addFile($file_path, $file_relative_path) !== true) {
                    throw new \Exception("Unable to add " . $file_relative_path . " to " . MigrationContent::getMigrationArchive() . " archive");
                }
            }

            return true;

        }

        /**
         * function for reloading zip archive
         */
        private function archive_reload()
        {
            if (!is_resource($this->zip) && get_class($this->zip) == "ZipArchive") {
                @$this->zip->close();
                $this->zip = new \ZipArchive();
                $this->zip->open($this->archive_path, \ZipArchive::CREATE);
            }
        }

        /**
         *
         * @throws \Exception
         */
        private function add_external_files_to_archive()
        {
            // add config json to archive
            $this->add_file_to_archive(Helper::get_tmp_dir() . "/" . self::MIGRATION_CONFIG_FILE_NAME, '10web_meta/' . self::MIGRATION_CONFIG_FILE_NAME);

            // add db sql file to archive
            $this->add_file_to_archive(Helper::get_tmp_dir() . "/" . self::MIGRATION_DB_FILE_NAME, '10web_meta/' . self::MIGRATION_DB_FILE_NAME);

            // add wp-config.php to archive
            $this->add_file_to_archive(ABSPATH . "/wp-config.php", "wp-config.php");
        }

        private function create_tar_archive()
        {
            $tar = new Archive_Tar($this->archive_path, true);
            $tar->setIgnoreRegexp($this->get_exclude_regex());
            $uploads_dir = Helper::get_uploads_dir();

            foreach ($this->files as $type => &$files) {
                if (!empty($files)) {
                    foreach ($files as $key => $files_chunk) {
                        unset($files[$key]);

                        if ($type == "wp-content") {
                          $tar->addModify($files_chunk, 'wp-content', WP_CONTENT_DIR);
                        }
                        else {
                          $tar->addModify($files_chunk, 'wp-content/uploads', $uploads_dir);
                        }

                        $this->files_count += count($files_chunk);
                        Helper::store_migration_log('tar_files_count', $this->files_count);

                        if( $this->files_count >= $this->total_files_count ){
                            update_site_option('tenweb_migration_ended',1);
                        }

                        $this->check_for_restart();
                    }
                }
            }
        }

        /**
         * @param $dir
         *
         * @return bool
         */
        public function dir_is_empty($dir)
        {
            $handle = opendir($dir);
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    return false;
                }
            }

            return true;
        }

        /**
         * @return mixed
         */
        private static function get_object_file_content()
        {
            $content = file_get_contents(Helper::get_tmp_dir() . '/content_object.txt');

            return unserialize($content);
        }
    }
}