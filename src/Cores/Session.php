<?php

namespace MyProject1\Cores;

class Session
{
    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        return isset($_SESSION[$key])? $_SESSION[$key] : '';
    }

    public static function destroyAll(){
        session_destroy();
    }

    public static function destroy($key){
        unset($_SESSION[$key]);
    }

    public static function setCurrentUserLoggedIn($user){
        $_SESSION['user-logged-in'] = $user;
    }

    public static function getCurrentUserLoggedIn(){
        return isset($_SESSION['user-logged-in']) ? $_SESSION['user-logged-in'] : '';
    }
}