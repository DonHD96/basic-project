<?php

namespace MyProject1\Model;

use MyProject1\Database\Connection;
use MyProject1\Database\QueryBuilder;

class ResetModel
{
    public static function insertToken($userInfo, $token)
    {
        return QueryBuilder::table('reset')
            ->insert([
                'userInfo' => $userInfo,
                'token' => $token
            ]);
    }

    public static function getEmailByToken($token)
    {
        return QueryBuilder::table('reset')
            ->where('token',$token)
            ->first();
    }
}