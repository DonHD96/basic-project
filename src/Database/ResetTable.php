<?php

namespace MyProject1\Database;

class ResetTable
{
    public static function createReset()
    {
        $db = Connection::makeConnection();
        $query = $db->query("create table if not exists reset(
        ID bigint(20) unsigned auto_increment primary key,
        userInfo varchar(50) not null,
        token varchar(255) not null
        )");
        if (!$query) {
            echo "We could not create table" . $db->error;
            die;
        }
        return true;
    }
}