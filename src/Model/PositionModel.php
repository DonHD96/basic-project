<?php

namespace MyProject1\Model;

use MyProject1\Database\Connection;
use MyProject1\Database\QueryBuilder;

class PositionModel
{
    public static function getAll()
    {
        return QueryBuilder::table('position')
            ->getAll();
    }
}