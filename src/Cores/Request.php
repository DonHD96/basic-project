<?php

namespace MyProject1\Cores;

class Request
{
    public static function uri()
    {
        return str_replace(
            App::get('config/app')['homeUri'],
            '',
            $_SERVER['REQUEST_URI']
        );
    }
    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}