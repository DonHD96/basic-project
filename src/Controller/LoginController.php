<?php

namespace MyProject1\Controller;

use MyProject1\Cores\Redirect;
use MyProject1\Cores\Session;
use MyProject1\Model\UsersModel;
require_once 'function.php';

class LoginController
{
    //GET
    public function loadView()
    {
        view('login');
    }
    //POST
    public function handleLogin()
    {
//        $checkbox = isset($_POST['remember']) != 0 ? 1 : '';
        Session::destroy('login-error');
        required(['username','password'],'login-error','login');
        $aUsers = UsersModel::isLoggedIn($_POST['username'], $_POST['password']);
        if ($aUsers) {
            Session::setCurrentUserLoggedIn($aUsers['username']);
            Redirect::to('home');
        } else {
            Session::set('login-error','The username or password is wrong');
            Redirect::to('login');
        }
    }
}