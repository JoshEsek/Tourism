<?php
    namespace Roli\Model;

    use mysqli;
    use mysqli_close;
    use mysqli_connect;
    use mysqli_connect_error;
    use mysqli_fetch_field;
    use mysqli_field_tell;
    use mysqli_free_result;
    use mysqli_report;
    use MYSQLI_REPORT_ERROR;
    use MYSQLI_REPORT_STRICT;
    use mysqli_set_charset;
    use mysqli_sql_exception;
    /**
     * Database communications class
     */
    class Database extends Primitive\Base
    {
        private static mysqli $link;
        private static bool   $connect        = false;
        private static array  $primary_tables = [];
        private static array  $exceptions     = [];
        /**
         * Get database exception
         *
         * @return array
         */
        public static function get_connection_exception()
        : array
        {
            return (self::$exceptions['mysqli_connection_exception']) ?? [];
        }
        /**
         * Get database exception
         *
         * @return mysqli_sql_exception|null
         */
        public static function get_primary_tables_exception()
        : ?mysqli_sql_exception
        {
            return self::$exceptions['primary_tables_exception'] ?? null;
        }
        /**
         * Check and return the state of the database connection
         *
         * @return bool
         */
        public static function has_connection_error()
        : bool
        {
            return isset(self::$exceptions['mysqli_connection_exception']) && self::$exceptions['mysqli_connection_exception'];
        }
        /**
         * Close connection
         *
         * @return void
         * @link https://php.net/manual/en/language.oop5.decon.php
         */
        public static function disconnect_database()
        : void
        {
            if (!empty(self::$link))
            {
                mysqli_close(self::$link);
            }
        }
        /**
         * Check if database has primary tables
         *
         * @return bool|array
         */
        public function has_primary_tables()
        : bool|array
        {
            $link = isset(self::$link) && self::$link ? self::$link : false;
            // * The test
            if (!empty($link) && !empty(self::$primary_tables))
            {
                $rows    = [];
                $_tables = self::$primary_tables;
                // * Query the database
                try
                {
                    if ($result = mysqli_query($link, "SHOW TABLES;"))
                    {
                        while ($tables = mysqli_fetch_assoc($result))
                        {
                            $table        = array_values($tables)[0];
                            $rows[$table] = $table;
                        }
                        // * Free result
                        mysqli_free_result($result);
                    }
                    foreach ($_tables as $_table)
                    {
                        if (isset($rows[$_table]))
                        {
                            unset($_tables[$_table]);
                        }
                    }
                }
                catch (mysqli_sql_exception $exception)
                {
                    self::$exceptions['primary_tables_exception'] = $exception;

                    return false;
                }

                return empty($_tables) ? true : $_tables;
            }

            return false;
        }
        public function connect()
        : void
        {
            self::_connect();
        }
        /**
         * Load database options
         *
         * @param array $options          The options to load into the database if the database has none
         * @param bool  $load_to_database Load flat file option to database if true
         *
         * @return array
         */
        public function load_option(array $options, bool $load_to_database = false)
        : array
        {
            $db_ops   = [
                    'DB_CHARSET'  => '',
                    'DB_COLLATE'  => '',
                    'DB_HOST'     => '',
                    'DB_NAME'     => '',
                    'DB_PASSWORD' => '',
                    'DB_PORT'     => '',
                    'DB_SOCKET'   => '',
                    'DB_USER'     => ''
            ];
            $_options = [];
            /* Database settings - You can get this info from your web host. */
            if (isset($options['database_options']['DB_BASE_TABLES']))
            {
                self::$primary_tables = $options['database_options']['DB_BASE_TABLES'];
            }
            if (isset($options['options']))
            {
                $_options = $options['options'];
            }
            if (isset($options['database_options']['DB_BASE_TABLES']))
            {
                self::$primary_tables = $options['database_options']['DB_BASE_TABLES'];
            }
            if (empty(self::$link) && isset($options['database_options']))
            {
                foreach ($db_ops as $index => $db_op)
                {
                    if (isset($options['database_options'][$index]))
                    {
                        $db_ops[$index] = $options['database_options'][$index];
                    }
                }
                /**
                 * public mysqli::__construct(
                 *    string $hostname = ini_get('mysqli.default_host'),
                 *    string $username = ini_get('mysqli.default_user'),
                 *    string $password = ini_get('mysqli.default_pw'),
                 *    string $database = '',
                 *    int $port = ini_get('mysqli.default_port'),
                 *    string $socket = ini_get('mysqli.default_socket')
                 * )
                 */
                if ($this->database_connect($db_ops['DB_HOST'], $db_ops['DB_USER'], $db_ops['DB_PASSWORD'], $db_ops['DB_NAME'], $db_ops['DB_PORT'], $db_ops['DB_SOCKET'], $db_ops['DB_CHARSET'], $db_ops['DB_COLLATE']))
                {
                    $options = $this->load_options($_options, $load_to_database);
                }
            }
            else if (!empty(self::$link) && isset(self::$link))
            {
                $options = self::fetch_options();
            }
            else
            {
                $options = [];
            }

            return $options;
        }
        /**
         * Attempt connection to a database with supplied credentials
         *
         * @param string $DB_HOST     The host
         * @param string $DB_USER     The user
         * @param string $DB_PASSWORD The password
         * @param string $DB_NAME     The database name
         * @param int    $DB_PORT     The port
         * @param string $DB_SOCKET   The socket
         * @param string $DB_CHARSET  The charset
         * @param string $DB_COLLATE  The database collate
         *
         * @return bool
         */
        private function database_connect(string $DB_HOST, string $DB_USER, string $DB_PASSWORD, string $DB_NAME, int $DB_PORT, string $DB_SOCKET, string $DB_CHARSET, string $DB_COLLATE)
        : bool
        {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            /**
             * Let's try to connect
             */
            try
            {
                /**
                 * @ -> error silencer
                 * mysqli_connect(
                 *   string $hostname = ini_get('mysqli.default_host'),
                 *   string $username = ini_get('mysqli.default_user'),
                 *   string $password = ini_get('mysqli.default_pw'),
                 *   string $database = '',
                 *   int $port = ini_get('mysqli.default_port'),
                 *   string $socket = ini_get('mysqli.default_socket')
                 * ): mysqli|false
                 */
                if (empty($DB_SOCKET))
                {
                    $link = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME, $DB_PORT);
                }
                else
                {
                    $link = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME, $DB_PORT, $DB_SOCKET);
                }
                /**
                 * Set the desired charset after establishing a connection
                 */
                if ((!$err = mysqli_connect_errno()) && !empty($DB_CHARSET))
                {
                    mysqli_set_charset($link, $DB_CHARSET);
                }
                /**
                 * Set the desired collation after establishing a connection
                 */
                if (!$err && !empty($DB_COLLATE))
                {
                    mysqli_query($link, "SET COLLATION_CONNECTION '{$DB_COLLATE}';");
                }
                if (isset($db_options['database_options']['DB_BASE_TABLES']))
                {
                    self::$primary_tables = $db_options['database_options']['DB_BASE_TABLES'];
                }
                if (!$err)
                {
                    self::$link    = $link;
                    self::$connect = true;
                }

                return self::$connect;
            }
            catch (mysqli_sql_exception $exception)
            {
                self::$exceptions['mysqli_connection_exception'] = [
                        'message' => $exception->getMessage(),
                        'code'    => $exception->getCode(),
                        'line'    => $exception->getLine(),
                        'file'    => $exception->getFile()
                ];
            }

            return false;
        }
        /**
         * Load options from file
         *
         * @param array $options          The options to store or retrieve
         * @param bool  $load_to_database The function to use
         *
         * @return array
         */
        public function load_options(array $options, bool $load_to_database = false)
        : array
        {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            if ($load_to_database && !empty($options) && isset(self::$link) && ($link = self::$link))
            {
                $sql = 'INSERT INTO `options`(`option_name`, `option_value`) VALUES ';
                $opt = '';
                // * The loop
                foreach ($options as $key => $option)
                {
                    $opt .= sprintf("('%s', '%s'), ", mysqli_real_escape_string(self::$link, $key), mysqli_real_escape_string(self::$link, $option));
                }
                // * trim
                mysqli_real_query($link, $sql .= rtrim($opt, ', ') . ';');
            }
            else if (!empty($options) && isset(self::$link) && ($link = self::$link))
            {
                $_options = [];
                $tables   = implode(',', $options);
                $query    = "SELECT `option_name`, `option_value` FROM `options` WHERE `option_name` LIKE ($tables) ORDER BY `option_name`;";
                $result   = mysqli_query($link, $query);
                /* fetch associative array */
                while ($row = $result->fetch_assoc())
                {
                    $_options[$row['option_name']] = $row['option_value'];
                }
                /* We should free the mysql results */
                mysqli_free_result($result);

                return $_options;
            }

            return [];
        }
        /**
         * Fetch site options
         *
         * @return array
         */
        private static function fetch_options()
        : array
        {
            $_options = [];
            // * Test
            if (isset(self::$link) && !empty(self::$primary_tables))
            {
                $query  = "SELECT `option_name`, `option_value` FROM `options` ORDER BY `option_name`;";
                $result = mysqli_query(self::$link, $query);
                /* fetch associative array */
                while ($row = $result->fetch_assoc())
                {
                    $_options[$row['option_name']] = $row['option_value'];
                }
                /* We should free the mysql results */
                mysqli_free_result($result);
            }

            // * ALTER TABLE `tourism_options` RENAME `options`; ALTER TABLE `tourism_usermeta` RENAME `usermeta`; ALTER TABLE `tourism_users` RENAME `users`;
            return $_options;
        }
        /**
         * Get page content
         *
         * @param string $name The page id
         *
         * @return string
         */
        public function get_page_contents(string $name)
        : string
        {
            if (isset(self::$link) && ($link = self::$link))
            {
                $name = mysqli_real_escape_string($link, $name);
                // * Query the database
                try
                {
                    if (($result = mysqli_query($link, "SELECT `post_content` FROM `posts` WHERE `post_name` = '$name';")) !== false)
                    {
                        $tables = mysqli_fetch_assoc($result);
                        // * Free result
                        mysqli_free_result($result);

                        return $tables['post_content'] ?? '';
                    }
                }
                catch (mysqli_sql_exception $exception)
                {
                    self::$exceptions['primary_tables_exception'] = $exception;

                    return '';
                }
            }

            return '';
        }
        /**
         * Get page content
         *
         * @param string $name The page id
         *
         * @return string
         */
        public function get_page_description(string $name)
        : string
        {
            if (isset(self::$link) && ($link = self::$link))
            {
                $name = mysqli_real_escape_string($link, $name);
                // * Query the database
                try
                {
                    if (($result = mysqli_query($link, "SELECT `post_excerpt` FROM `posts` WHERE `post_name` = '$name';")) !== false)
                    {
                        $tables = mysqli_fetch_assoc($result);
                        // * Free result
                        mysqli_free_result($result);

                        return $tables['post_excerpt'] ?? '';
                    }
                }
                catch (mysqli_sql_exception $exception)
                {
                    self::$exceptions['primary_tables_exception'] = $exception;

                    return '';
                }
            }

            return '';
        }
    }
