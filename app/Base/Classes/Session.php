<?php  
namespace Base\Classes;

class Session
{
    private static $sessionIsStarted = false;

    public static function init()
    {
        if (self::$sessionIsStarted == false) {
            session_start();
            self::$sessionIsStarted = true;
        }
    }

    public static function set(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        return @$_SESSION[$name];
    }

    public static function destroyByName($name)
    {
        unset($_SESSION[$name]);
    }

    public static function destroy()
    {
        if (self::$sessionIsStarted == true) {
            // destroy the Session, not just the data stored!
            session_destroy();
            // delete the session contents, but keep the session_id and name:
            session_unset();
        }
    }
}