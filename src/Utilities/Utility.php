<?php
    namespace Roli\Utilities;

    /**
     * Roli Utilities class
     */
    class Utility
    {
        /**
         * Strings of the body tag classes
         *
         * @param string|string[] $_class The supplied class
         *
         * @return string
         */
        public static function get_body_classes(string $_class = '')
        : string
        {
            return 'class="' . htmlentities(implode(' ', self::body_classes($_class)), ENT_HTML5) . '"';
        }
        /**
         * Strings of the body tag classes
         *
         * @param string|string[] $_class The supplied class
         *
         * @return array
         */
        public static function body_classes(string $_class = '')
        : array
        {
            static $classes = [];
            // * Check $_class
            if (is_array($_class))
            {
                $classes = array_merge($classes, $_class);
            }
            else
            {
                $classes[] = $_class;
            }

            return $classes;
        }
        /**
         * Retrieves the path of a file.
         *
         * @param string $file Optional. File to search for.
         *
         * @return string The path of the file.
         */
        public static function get_file_path(string $file = '')
        : string
        {
            global $shared_folder;

            return self::get_base_url((string)$shared_folder) . ltrim($file, '/\\');
        }
        /**
         * Get root folder of the host and if we are in a folder add it
         *
         * @param string $path The path the base is placed
         * @param string $ds   The directory separator
         *
         * @return string
         */
        public static function get_base_url(string $path = '', string $ds = DIRECTORY_SEPARATOR)
        : string
        {
            $root = $_SERVER['WEB_ROOT'] = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);

            return $root . $ds . (!empty($path) ? ltrim($path, '\\/') . $ds : '');
        }
        /**
         * Retrieves the path of a file as uri.
         *
         * @param string $file Optional. File to search for.
         *
         * @return string The path of the file.
         */
        public static function get_file_path_uri(string $file = '')
        : string
        {
            global $shared_folder;

            return rtrim(self::get_base_uri("{$shared_folder}/" . ltrim($file, '/\\')), '/\\');
        }
        /**
         * Get root folder of the host and if we are in a folder add it
         *
         * @param string $path The shared root folder
         *
         * @return string
         */
        public static function get_base_uri(string $path = '')
        : string
        {
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
            $host     = $_SERVER['HTTP_HOST'];
            $base     = (!empty($path) ? '/' . ltrim($path) : '');
            /**
             * Filters the URL to a file in the theme.
             *
             * @param string $url  The file URL.
             * @param string $file The requested file to search for.
             *
             * @since 4.7.0
             *
             */
            // *
            return "{$protocol}://{$host}{$base}/";
        }
        /**
         * Generate uri file
         *
         * @param string $file The file to uri
         *
         * @return string
         */
        public static function get_tourism_uri(string $file = '')
        : string
        {
            return rtrim(self::get_base_uri('tourism') . ltrim($file, '/\\'), '/\\');
        }
        /**
         * Recursively implodes SESSION
         *
         * @param array $array SESSION array to recursively implode
         *
         * @return  string
         * @access  public
         */
        public static function recursive_session(array $array)
        : string
        {
            $str = '';
            // * Recursively iterates array and adds key/value to glued string
            array_walk_recursive($array, static function ($value, $key) use (&$str) { $str .= "{$key} = {$value}, "; });

            return rtrim($str, ', ');// * Removes last $glue from string
        }
        /**
         * Dictate The current active page
         *
         * @return string
         * @uses array_intersect_key
         * @uses pathinfo
         */
        public static function active_page()
        : string
        {
            global $shared_folder;
            $path = array_intersect_key(pathinfo($_SERVER['REQUEST_URI']), ['basename' => '', 'dirname' => '', 'filename' => '']);
            // * Test for path
            if (isset($path['dirname'], $path['basename'], $path['filename']) && $path['basename'] !== $path['filename'])
            {
                $path = pathinfo($path['dirname']);
            }
            $_path         = (isset($path['basename'], $path['filename']) && $path['basename'] === $path['filename']) ? strtolower((string)$path['basename']) : '';
            $shared_folder = strtolower("$shared_folder");

            return $shared_folder === $_path ? 'home' : ($_path === 'index' ? 'home' : $_path);
        }
        /**
         * Not strict check for User menu only
         */
        public static function user_is_login()
        : bool
        {
            return isset($_SESSION['user_id'], $_SESSION['user_login']) && !empty($_SESSION['user_id']) && !empty($_SESSION['user_login']);
        }
    }
