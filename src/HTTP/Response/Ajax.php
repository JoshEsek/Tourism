<?php
    namespace Roli\HTTP\Response;
    /**
     * Ajax Responder
     */
    class Ajax
    {
        public static function response() {}
        /**
         * @param int $code The HTTP response code
         *
         * @return int
         */
        public static function http_response_code(int $code = 200)
        : int
        {
            $prev_code = isset($GLOBALS['http_response_code']) ? (int)$GLOBALS['http_response_code'] : $code;
            $protocol  = isset($_SERVER['SERVER_PROTOCOL']) ? (string)$_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0';
            // * The test
            if ($code === null)
            {
                return $prev_code;
            }
            switch ($code)
            {
                case 100:
                    $text = 'Continue';
                    break;
                case 101:
                    $text = 'Switching Protocols';
                    break;
                case 200:
                    $text = 'OK';
                    break;
                case 201:
                    $text = 'Created';
                    break;
                case 202:
                    $text = 'Accepted';
                    break;
                case 203:
                    $text = 'Non-Authoritative Information';
                    break;
                case 204:
                    $text = 'No Content';
                    break;
                case 205:
                    $text = 'Reset Content';
                    break;
                case 206:
                    $text = 'Partial Content';
                    break;
                case 300:
                    $text = 'Multiple Choices';
                    break;
                case 301:
                    $text = 'Moved Permanently';
                    break;
                case 302:
                    $text = 'Moved Temporarily';
                    break;
                case 303:
                    $text = 'See Other';
                    break;
                case 304:
                    $text = 'Not Modified';
                    break;
                case 305:
                    $text = 'Use Proxy';
                    break;
                case 400:
                    $text = 'Bad Request';
                    break;
                case 401:
                    $text = 'Unauthorized';
                    break;
                case 402:
                    $text = 'Payment Required';
                    break;
                case 403:
                    $text = 'Forbidden';
                    break;
                case 404:
                    $text = 'Not Found';
                    break;
                case 405:
                    $text = 'Method Not Allowed';
                    break;
                case 406:
                    $text = 'Not Acceptable';
                    break;
                case 407:
                    $text = 'Proxy Authentication Required';
                    break;
                case 408:
                    $text = 'Request Time-out';
                    break;
                case 409:
                    $text = 'Conflict';
                    break;
                case 410:
                    $text = 'Gone';
                    break;
                case 411:
                    $text = 'Length Required';
                    break;
                case 412:
                    $text = 'Precondition Failed';
                    break;
                case 413:
                    $text = 'Request Entity Too Large';
                    break;
                case 414:
                    $text = 'Request-URI Too Large';
                    break;
                case 415:
                    $text = 'Unsupported Media Type';
                    break;
                case 500:
                    $text = 'Internal Server Error';
                    break;
                case 501:
                    $text = 'Not Implemented';
                    break;
                case 502:
                    $text = 'Bad Gateway';
                    break;
                case 503:
                    $text = 'Service Unavailable';
                    break;
                case 504:
                    $text = 'Gateway Time-out';
                    break;
                case 505:
                    $text = 'HTTP Version not supported';
                    break;
                default:
                    trigger_error('Unknown http status code ' . $code, E_USER_ERROR); // exit('Unknown http status code "' . htmlentities($code) . '"');

                    return $prev_code;
            }
            // * Set header
            header($protocol . ' ' . $code . ' ' . $text);
            $GLOBALS['http_response_code'] = $code;

            // * original function always returns the previous or current code
            return $prev_code;
        }
        /**
         * Display the Registration or Admin link.
         *
         * Display a link which allows the user to navigate to the registration page if
         * not logged in and registration is enabled or to the dashboard if logged in.
         *
         * @param string $before Text to output before the link. Default `<li>`.
         * @param string $after  Text to output after the link. Default `</li>`.
         * @param bool   $echo   Default to echo and not return the link.
         *
         * @return void|string Void if `$echo` argument is true, registration or admin link
         *                     if `$echo` is false.
         * @since 1.5.0
         *
         */
        public static function register($before = '<li>', $after = '</li>', $echo = true)
        {
            if (!is_user_logged_in())
            {
                if (get_option('users_can_register'))
                {
                    $link = $before . '<a href="' . esc_url(wp_registration_url()) . '">' . __('Register') . '</a>' . $after;
                }
                else
                {
                    $link = '';
                }
            }
            else if (current_user_can('read'))
            {
                $link = $before . '<a href="' . admin_url() . '">' . __('Site Admin') . '</a>' . $after;
            }
            else
            {
                $link = '';
            }
            /**
             * Filters the HTML link to the Registration or Admin page.
             *
             * Users are sent to the admin page if logged-in, or the registration page
             * if enabled and logged-out.
             *
             * @param string $link The HTML code for the link to the Registration or Admin page.
             *
             * @since 1.5.0
             *
             */
            $link = apply_filters('register', $link);
            if ($echo)
            {
                echo $link;
            }
            else
            {
                return $link;
            }
        }
        /**
         * Generates a random password drawn from the defined set of characters.
         *
         * Uses random_int() is used to create passwords with far less predictability
         * than similar native PHP functions like `rand()` or `mt_rand()`.
         *
         * @param int  $length              Optional. The length of password to generate. Default 12.
         * @param bool $special_chars       Optional. Whether to include standard special characters.
         *                                  Default true.
         * @param bool $extra_special_chars Optional. Whether to include other special characters.
         *                                  Used when generating secret keys and salts. Default false.
         *
         * @return string The random password.
         * @throws \Exception
         */
        public static function generate_password(int $length = 12, bool $special_chars = true, bool $extra_special_chars = false)
        : string
        {
            $chars    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $password = '';
            // * The test
            if ($special_chars)
            {
                $chars .= '!@#$%^&*()';
            }
            if ($extra_special_chars)
            {
                $chars .= '-_ []{}<>~`+=,.;:/?|';
            }
            for ($i = 0; $i < $length; $i++)
            {
                $password .= $chars[random_int(0, strlen($chars) - 1)];
            }

            return $password;
        }
    }