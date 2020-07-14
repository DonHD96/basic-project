<?php

namespace MyProject1\Cores;

class Redirect
{
    public static function to($url){
        header('Location:'.Url::url($url));
        exit();
    }
}