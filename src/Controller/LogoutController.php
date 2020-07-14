<?php

namespace MyProject1\Controller;

use MyProject1\Cores\Redirect;
use MyProject1\Cores\Session;
require_once 'function.php';

class LogoutController
{
    //GET
    public function handleLogout(){
        Session::destroyAll();
        Redirect::to('login');
    }
}