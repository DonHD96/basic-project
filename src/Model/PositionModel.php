<?php

namespace MyProject1\Model;

use MyProject1\Database\Connection;

class PositionModel
{
    public static function getAll()
    {
        $db = Connection::makeConnection();
        $query = $db->query("SELECT * from positions");
        return $query ? $query : "The query is failed" . $db->error;
    }
}