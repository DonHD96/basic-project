<?php

namespace MyProject1\Controller;

use MyProject1\Cores\Redirect;
use MyProject1\Cores\Session;
use MyProject1\Cores\Url;
use MyProject1\Model\UsersModel;
require_once 'function.php';

class RegisterController
{
    //GET
    public function loadView()
    {
        view('register');
    }

    //POST
    public function handleRegister()
    {
        Session::destroy('register-error');
        required(['username','password','email'],'register-error','register');
        if (!UsersModel::isUserExists($_POST['username']) && !UsersModel::isUserExists($_POST['email']))  {
            $userId = UsersModel::insertUser($_POST['username'], $_POST['password'], $_POST['email']);
            if ($userId){
                Session::set('register-error','Sign Up Success');
                Redirect::to('login');
            } else {
                Session::set('register-error','The query  is incorrect');
                Redirect::to('register');
            }
        } else {
            Session::set('register-error','The username or email are already exists');
            Redirect::to('register');
        }
    }
}