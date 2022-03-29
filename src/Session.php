<?php
    namespace Roli;

    // session start
    // It is VERY important to include a Period if using
    // a whole domain.  (.yourdomain.com)
    // It is VERY important to set the root path your session will always
    // operate in... (/members) will ensure sessions will NOT be interfered
    // with a session with a path of say (/admin) ... so you can log in
    // as /admin and as /members... NEVER do unset($_SESSION)
    // $_SESSION=array(); is preferred, session_unset();  session_destroy();
    /**
     * @TODO Session starts
     * session_set_cookie_params(0, '/members', '.yourdomain.com', 0, 1);
     * session_start();
     * $_SESSION = array();
     * session_unset();
     * session_destroy();
     *
     * session_set_cookie_params(0, '/members', '.yourdomain.com', 0, 1);
     * session_start();
     *
     * $_SESSION['whatever'] = 'youwhat';
     */
    // session destroying
    // To be safe, clear out your $_SESSION array
    // Next, what most people do NOT do is delete the session cookie!
    // It is easy to delete a cookie by expiring it long before the current time.
    // The ONLY WAY to delete a cookie, is to make sure ALL parameters match the
    // cookie to be deleted...which is easy to get those params with
    // session_get_cookie_params()...
    // FInally, use  session_unset(); and session_destroy(); in this order to ensure
    // Chrome, IE, Firefox and others, are properly destroying the session.
    /**
     * @TODO Session ends logout
     *$_SESSION = array();
     * if (ini_get('session.use_cookies'))
     * {
     * $p = session_get_cookie_params();
     * setcookie(session_name(), '', time() - 31536000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
     * }
     * session_unset();
     * session_destroy();
     */
    // AJAX and SESSIONS.
    // Example... you start a session based PHP page, which then calls an Ajax (XMLHTTP) authenticated
    // using the SAME SESSION to Poll and output the data, for example.  But, you notice when you
    // try to start the Polling AJAX call always HANGS and seems to hang at the session_start().
    // This is because the session is opened in the first page, calls the AJAX polling example, and
    // tries to open the same session (for authentication) and do the AJAX call, you MUST call
    // session_write_close(); meaning you are done writing to the $_SESSION variable, which really
    // represents a file that must be CLOSED with session_write_close();....
    // THAN you can call your AJAX Polling code to reopen the same session and do its polling...
    // Normally, the $_SESSION is closed automatically when the script is closed or finished executing
    // So, if you need to keep a PHP page running after opening a SESSION, simply close it when finished
    // writing to $_SESSION so the AJAX polling page can authenticate and use the same session in a
    // seperate web page...
    /**
     * @TODO Session Ajax
     * session_write_close();
     */
    /**
     * Session class to take care of the page session
     */
    class Session
    {
        /**
         * Start the session
         *
         * @param array $args Session arguments
         *
         * @return bool
         */
        public static function start(array $args = [])
        {
            if (headers_sent())
            {
                return false;
            }
            if (strnatcmp(PHP_VERSION, '5.4.0') >= 0 && session_status() === PHP_SESSION_NONE)
            {
                session_start($args);
            }
            else if (session_id() === '')
            {
                session_start($args);
            }

            return true;
        }
    }
