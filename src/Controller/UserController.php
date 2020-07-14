<?php

namespace MyProject1\Controller;
use MyProject1\Cores\Redirect;
use MyProject1\Cores\Url;
use MyProject1\Model\UsersModel;

require_once 'function.php';

class UserController
{
    //GET
    public function viewAdd(){
        view('users/add');
    }
    public function viewUpdate(){
        echo "Hello";
    }
    public function deleteUser($id){
        $status = UsersModel::deleteUser($id);
        if(!$status){
            echo "Failed";die;
        }
        Redirect::to('home');
    }
    //POST
    public function addUser(){
        echo "Incomplete function";
    }
}