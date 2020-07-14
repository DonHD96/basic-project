<?php
/**
 * @var $oRouter \MyProject1\Cores\Route
 */
//Home
$oRouter->get('home','MyProject1\Controller\HomeController@loadView');
$oRouter->get('','MyProject1\Controller\HomeController@loadView');
$oRouter->get('404','MyProject1\Controller\PageNotFound@loadView');
//Employee
$oRouter->get('employee','MyProject1\Controller\EmployeeController@loadView');
$oRouter->post('add-employee','MyProject1\Controller\EmployeeController@addEmployee');
$oRouter->get('add-employee','MyProject1\Controller\EmployeeController@viewAdd');
$oRouter->get('update-employee/{id}','MyProject1\Controller\EmployeeController@viewUpdate');
$oRouter->post('update-employee/{id}','MyProject1\Controller\EmployeeController@updateEmployee');
$oRouter->get('update-employee/{id}/test/{param}','MyProject1\Controller\EmployeeController@test');
$oRouter->get('delete-employee/{id}','MyProject1\Controller\EmployeeController@deleteEmployee');
//Logout
$oRouter->get('logout','MyProject1\Controller\LogoutController@handleLogout');
//Login
$oRouter->get('login','MyProject1\Controller\LoginController@loadView');
$oRouter->post('login','MyProject1\Controller\LoginController@handleLogin');
//Register
$oRouter->get('register','MyProject1\Controller\RegisterController@loadView');
$oRouter->post('register','MyProject1\Controller\RegisterController@handleRegister');
//User
$oRouter->post('add-user','MyProject1\Controller\UserController@addUser');
$oRouter->get('add-user','MyProject1\Controller\UserController@viewAdd');
$oRouter->get('delete-user/{id}','MyProject1\Controller\UserController@deleteUser');
$oRouter->get('update-user/{id}','MyProject1\Controller\UserController@viewUpdate');
//Forgot Password
$oRouter->get('verify-email','MyProject1\Controller\ForgotPasswordController@viewEnterEmail');
$oRouter->post('verify-email','MyProject1\Controller\ForgotPasswordController@handleEmail');
$oRouter->get('reset-password/{token}','MyProject1\Controller\ForgotPasswordController@viewReset');
$oRouter->post('reset-password/{token}','MyProject1\Controller\ForgotPasswordController@handlePassword');
//Position
$oRouter->get('position','MyProject1\Controller\PositionController@loadView');



