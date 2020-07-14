<?php
require_once 'vendor/autoload.php';
require_once 'function.php';
use \MyProject1\Cores\App;
use \MyProject1\Cores\Request;
use \MyProject1\Cores\Route;

App::bind('config/app', require_once 'config/app.php');
if(!runDatabase()){
    echo 'We could not run database';
}
Route::load('config/route.php')->direct(Request::uri(), Request::method());
