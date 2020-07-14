<?php

namespace MyProject1\Database;

class EmployeeTable
{
    public static function createEmployee()
    {
        $db = Connection::makeConnection();
        $query = $db->query("create table if not exists employee(
        ID int(10) unsigned auto_increment primary key,
        name varchar(50) not null,
        address varchar(255) not null, 
        email varchar(50) not null,
        phone varchar(50) not null,
        create_date  timestamp default current_timestamp on update current_timestamp ,
        image varchar (255)
        )");
        if (!$query) {
            echo "We could not create table" . $db->error;die;
        }
        return true;
    }
}