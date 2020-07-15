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
    public function handleEmailOrUser()
    {
        Session::destroy('error-usernameOrEmail');
        Session::destroy('error-reset');
        Session::destroy('success-reset');
        if (UsersModel::isUserExists($_POST['usernameOrEmail']) or UsersModel::isUserExists($_POST['usernameOrEmail'])) {
            $token = bin2hex(random_bytes(10));
            ResetModel::insertToken($_POST['usernameOrEmail'], $token);
            Redirect::to('reset-password/' . $token);
        } else {
            if (strpos($_POST['usernameOrEmail'], '@')) {
                if (strpos($_POST['usernameOrEmail'], '@gmail.com')) {
                    Session::set('error-usernameOrEmail', 'The email " ' . $_POST['usernameOrEmail'] . ' " is not exists .');
                } else {
                    Session::set('error-usernameOrEmail', 'Please enter the correct syntax ...@gmail.com .');
                }
            } else {
                Session::set('error-usernameOrEmail', 'The username " ' . $_POST['usernameOrEmail'] . ' " is not exists .');
            }
            Redirect::to('verify-email');
        }
    }

    public function handlePassword($token)
    {
        $userInfo = ResetModel::getEmailByToken($token)['userInfo'];
        if ($_POST['new_password'] == $_POST['new_password_c']) {
            if (UsersModel::updatePassword($_POST['new_password'], $userInfo)) {
                Session::destroy('error-reset');
                Session::set('success-reset', 'Your password has been changed successfully! Thank you!');
                Redirect::to('reset-password/' . $token);
            }
        } else {
            Session::set('error-reset', 'The password confirmation does not match.');
            Redirect::to('reset-password/' . $token);
        }
    }
}