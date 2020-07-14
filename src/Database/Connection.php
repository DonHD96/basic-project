<?php

namespace MyProject1\Database;

use MyProject1\Cores\App;

class Connection
{
    private static $_self;
    public static function makeConnection(){
        if(empty(self::$_self)){
            $db = new \mysqli(
                App::get('config/app')['database']['host'],
                App::get('config/app')['database']['username'],
                App::get('config/app')['database']['password'],
                App::get('config/app')['database']['data']
            );
            if(!$db){
                die("The connection is failed".$db->error);
            }
            self::$_self = $db;
        }
        return self::$_self;
    }
}