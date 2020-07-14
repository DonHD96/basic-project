<?php

namespace MyProject1\Controller;
use MyProject1\Cores\Redirect;

require_once 'function.php';

class HomeController
{
    //GET
    public function loadView()
    {

        view('home');

    }
}