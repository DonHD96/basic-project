<?php

namespace MyProject1\Database;
use MyProject1\Cores\App;

class Database
{
    public static function createDatabase()
    {
        $db = new \mysqli(
            App::get('config/app')['database']['host'],
            App::get('config/app')['database']['username'],
            App::get('config/app')['database']['password']
        );
        $query = $db->query("create database if not exists myproject3");
        if (!$query) {
            echo "We could not create database" . $db->error;die;
            die;
        }
        return true;
    }
}