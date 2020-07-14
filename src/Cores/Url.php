<?php

namespace MyProject1\Cores;

class Url
{
    /**
     * @param string $path
     *
     * @return string
     */

    public static function url($path = '')
    {
        if(empty($path)){
            return App::get('config/app')['homeUrl'];
        }
        return App::get('config/app')['homeUrl'].ltrim($path,'/');
    }
}