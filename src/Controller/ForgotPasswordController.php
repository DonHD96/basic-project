<?php

namespace MyProject1\Controller;

use MyProject1\Cores\Redirect;
use MyProject1\Cores\Session;
use MyProject1\Model\ResetModel;
use MyProject1\Model\UsersModel;
require_once 'function.php';

class ForgotPasswordController
{
    //GET
    public function viewEnterEmail()
    {
        view('verify-email');
    }

    public function viewReset()
    {
        view('reset-password');
    }

    //POST
    public function handleEmail()
    {
        Session::destroy('error-email');
        if (UsersModel::isUserExists($_POST['email'])) {
            $token = bin2hex(random_bytes(10));
            ResetModel::insertToken($_POST['email'], $token);
            Redirect::to('reset-password/'.$token);
        } else {
            Session::set('error-email','The email '.$_POST['email'].' is not exits .');
            Redirect::to('verify-email');
        }
    }

    public function handlePassword($token)
    {
        Session::destroy('error-reset');
        $email = ResetModel::getEmailByToken($token)['email'];
        if($_POST['new_password'] == $_POST['new_password_c']){
            if(UsersModel::updatePassword($_POST['new_password'], $email)){
                Session::set('error-reset','Your password has been changed successfully! Thank you!');
                Redirect::to('reset-password/'.$token);
            }
        }
        else{
            Session::set('error-reset','The password confirmation does not match.');
            Redirect::to('reset-password/'.$token);
        }
    }
}