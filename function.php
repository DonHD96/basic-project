<?php

use \MyProject1\Cores\Session;
use \MyProject1\Cores\Redirect;
use \MyProject1\Database\Database;
use \MyProject1\Database\EmployeeTable;
use \MyProject1\Database\ResetTable;
use \MyProject1\Database\UserTable;

if (!function_exists('view')) {
    /**
     * @param $file
     *
     * @return mixed
     */
    function view($file, $aWith = [])
    {

        return include "views/" . $file . ".php";
    }
}
if (!function_exists('required')) {
    function required($aRequire, $errorName, $url)
    {
        foreach ($aRequire as $item) {
            if (!isset($_POST[$item]) || empty($_POST[$item])) {
                Session::set($errorName, 'The ' . $item . ' is required');
                Redirect::to($url);
            }
        }
    }
}

if (!function_exists('runDatabase')) {
    function runDatabase()
    {
        if (Database::createDatabase() && EmployeeTable::createEmployee() && ResetTable::createReset() && UserTable::createUser()) {
            return true;
        }
        return false;
    }
}

function checkLogin()
{
    if (empty(Session::getCurrentUserLoggedIn())) {
        Redirect::to('login');
        exit;
    }
}

function setupCookie($aCookie)
{
    foreach ($aCookie as $key => $val) {

        setcookie($key, $val, time()+8400 , '/', false,false, true);
    }
}

function unsetCookie($aCookie)
{
    foreach ($aCookie as $key => $val){
        setcookie($key, '', time()-1 , '/', false,false, true);
    }
}
