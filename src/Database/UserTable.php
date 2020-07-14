<?php

namespace MyProject1\Database;

class UserTable
{
    public static function createUser()
    {
        $db = Connection::makeConnection();
        $query = $db->query("create table if not exists users(
        ID bigint(20) unsigned auto_increment primary key,
        username varchar(50) not null,
        password varchar(32) not null, 
        email varchar(50) not null,
        reg_date timestamp default current_timestamp on update current_timestamp 
        )");
        if (!$query) {
            echo "We could not create table" . $db->error;
            die;
        }
        return true;
    }
}