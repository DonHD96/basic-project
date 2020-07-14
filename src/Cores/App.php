<?php

namespace MyProject1\Cores;

class App
{
    private static $aRegistry = [];
    public static function bind($key,$val){
        //Gan app voi route vao aRegistry[key]
        self::$aRegistry[$key] = $val;
    }
    public static function get($key)
    {
        //lay gia tri cua route va app
        return array_key_exists($key,self::$aRegistry)?self::$aRegistry[$key]:false;
    }
}