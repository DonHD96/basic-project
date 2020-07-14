<?php

namespace MyProject1\Model;

use MyProject1\Database\QueryBuilder;

class UsersModel
{
    public static function getAll()
    {
        return QueryBuilder::table('users')
            ->getAll();
    }

    public static function isLoggedIn($username, $password)
    {
        $password = md5($password);
        return QueryBuilder::table('users')
            ->select('username', 'password')
            ->where('username', $username)
            ->andWhere('password', $password)
            ->first();
    }

    public static function isUserExists($usernameOrEmail)
    {
        return QueryBuilder::table('users')
            ->select('username', 'email')
            ->where('username', $usernameOrEmail)
            ->orWhere('email', $usernameOrEmail)
            ->first();
    }

    public static function insertUser($username, $password, $email)
    {
        $password = md5($password);
        $status = QueryBuilder::table('users')
            ->insert([
                'username' => $username,
                'password' => $password,
                'email' => $email
            ]);
        if (!$status) {
            return $status;
        }
        return QueryBuilder::getId();
    }

    public static function updateUser($id, $username, $password, $email)
    {
        return QueryBuilder::table('users')
            ->update([
                'username' => $username,
                'password' => $password,
                'email' => $email
            ], $id);
    }

    public static function deleteUser($id)
    {
        return QueryBuilder::table('users')
            ->delete('ID', $id);
    }

    public static function updatePassword($password, $email)
    {
        $password = md5($password);
        $status = QueryBuilder::table('users')
            ->update([
                'password' => $password
            ],
                //Where
                [
                    'email' => $email
                ]);
        if (!$status) {
            return $status;
        }
        return true;
    }
}