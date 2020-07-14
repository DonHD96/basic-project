<?php

namespace MyProject1\Model;

use MyProject1\Database\QueryBuilder;

class EmployeeModel
{
    public static function getAll()
    {
        $query = QueryBuilder::table('employee')
            ->getAll();
        if (!$query) {
            return $query;
        }
        return $query;
    }

    public static function insertEmployee($name, $address, $email, $phone, $image)
    {
        $status = QueryBuilder::table('employee')
            ->insert([
                'name' => $name,
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'image' => $image
            ]);
        if (!$status) {
            return $status;
        }
        return QueryBuilder::getId();
    }

    public static function isEmployeeExists($emailOrPhone)
    {
        return QueryBuilder::table('employee')
            ->select('email', 'phone')
            ->where('email', $emailOrPhone)
            ->orWhere('phone', $emailOrPhone)
            ->first();
    }

    public static function deleteEmployee($id)
    {
        return QueryBuilder::table('employee')
            ->delete('ID', $id);
    }

    public static function updateEmployee($id, $name, $address, $email, $phone, $image)
    {
        return QueryBuilder::table('employee')
            ->update([
                'name' => $name,
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'image' => $image
            ],
            //Where
            [
                'ID' => $id
            ]);
    }

    public static function getEmployeeById($id)
    {
        return QueryBuilder::table('employee')
            ->where('ID', $id)
            ->first();
    }
}