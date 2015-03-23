<?php

namespace Paq\PhpStarter;

/**
 * Takes care preparing PHP's settings to let you work on a well written project
 */
class PhpStarter
{
    /**
     * @var bool
     */
    private static $errorHandlerRegistered = false;

    /**
     * Prepare PHP for a good PHP project
     */
    public static function start()
    {
        self::convertErrorsToExceptions();
    }

    /**
     * Register an error handler that will throw an \ErrorException whenever there is PHP Notice or Error
     * It also sets error reporting to E_ALL | E_STRICT
     *
     * @param bool $forceSetErrorHandler (Default: false) if TRUE it will register the error handler once again
     */
    public static function convertErrorsToExceptions($forceSetErrorHandler = false)
    {
        if (!self::$errorHandlerRegistered || (bool) $forceSetErrorHandler) {
            error_reporting(E_ALL | E_STRICT); // in PHP > 5.3 E_ALL would be enough
            set_error_handler(function($errno, $errstr, $errfile, $errline) {
                $message = $errstr;

                switch ($errno) {
                    case E_WARNING :
                    case E_NOTICE :
                    case E_STRICT :
                    case E_DEPRECATED :
                    case E_USER_DEPRECATED :
                    case E_USER_ERROR :
                    case E_USER_NOTICE :
                    case E_USER_WARNING :
                        $message .= ' [Source code :: File: ' . basename($errfile) . "; Line: $errline]";

                    default: // nothing
                        break;
                }

                /* When error handler is reached from within '@'-silenced expression, error_reporting() returns 0:
                 * http://php.net/manual/en/function.set-error-handler.php
                 *
                 * We don't want to convert silenced notices/warnings/errors etc. to exceptions as this causes
                 * many libraries (internally relying on default behavior of silencing) to stop working properly.
                 */
                if (error_reporting() != 0) {
                    throw new \ErrorException($message, $errno, 0, $errfile, $errline);
                }
            });

            self::$errorHandlerRegistered = true;
        }
    }
}
