<?php
    namespace Roli\Error;
    /**
     */
    class ErrorHandler
    {
        /**
         * handler(
         *   int $errno,
         *   string $errstr,
         *   string $errfile = ?,
         *   int $errline = ?,
         *   array $errcontext = ?
         * ): bool
         */
        function handler($errno, $errstr, $errfile, $errline)
        {
            $errno = $errno & error_reporting();
            if ($errno == 0)
            {
                return;
            }
            if (!defined('E_STRICT'))
            {
                define('E_STRICT', 2048);
            }
            if (!defined('E_RECOVERABLE_ERROR'))
            {
                define('E_RECOVERABLE_ERROR', 4096);
            }
            print "<pre>\n<b>";
            switch ($errno)
            {
                case E_ERROR:
                    print 'Error';
                    break;
                case E_WARNING:
                    print 'Warning';
                    break;
                case E_PARSE:
                    print 'Parse Error';
                    break;
                case E_NOTICE:
                    print 'Notice';
                    break;
                case E_CORE_ERROR:
                    print 'Core Error';
                    break;
                case E_CORE_WARNING:
                    print 'Core Warning';
                    break;
                case E_COMPILE_ERROR:
                    print 'Compile Error';
                    break;
                case E_COMPILE_WARNING:
                    print 'Compile Warning';
                    break;
                case E_USER_ERROR:
                    print 'User Error';
                    break;
                case E_USER_WARNING:
                    print 'User Warning';
                    break;
                case E_USER_NOTICE:
                    print 'User Notice';
                    break;
                case E_STRICT:
                    print 'Strict Notice';
                    break;
                case E_RECOVERABLE_ERROR:
                    print 'Recoverable Error';
                    break;
                default:
                    print "Unknown error ($errno)";
                    break;
            }
            print ":</b> <i>$errstr</i> in <b>$errfile</b> on line <b>$errline</b>\n";
            if (function_exists('debug_backtrace'))
            {
                //print "backtrace:\n";
                $backtrace = debug_backtrace();
                array_shift($backtrace);
                foreach ($backtrace as $i => $l)
                {
                    print "[$i] in function <b>{$l['class']}{$l['type']}{$l['function']}</b>";
                    if ($l['file'])
                    {
                        print " in <b>{$l['file']}</b>";
                    }
                    if ($l['line'])
                    {
                        print " on line <b>{$l['line']}</b>";
                    }
                    print "\n";
                }
            }
            print "\n</pre>";
            if (isset($GLOBALS['error_fatal']) && $GLOBALS['error_fatal'] & $errno)
            {
                die('fatal');
            }
        }
    }
