<?php

namespace MyProject1\Controller;

use MyProject1\Cores\Redirect;
use MyProject1\Cores\Session;
use MyProject1\Cores\Url;
use MyProject1\Model\EmployeeModel;

require_once 'function.php';

class EmployeeController
{
    //GET
    public function loadView()
    {
        checkLogin();
        view('employee');
    }

    public function viewAdd()
    {
        checkLogin();
        view('employee/add');
    }

    public function viewUpdate()
    {
        checkLogin();
        view('employee/update');
    }

    //POST
    public function addEmployee()
    {
        Session::destroy('error-employee');
        required(['name','address','email','phone'],'error-employee','addEmployee');
        if (!EmployeeModel::isEmployeeExists($_POST['email']) && !EmployeeModel::isEmployeeExists($_POST['phone'])) {
            $path = './image/' . $_FILES['image']['name'];
            $img_tmp = $_FILES['image']['tmp_name'];
            $employeeId = EmployeeModel::insertEmployee($_POST['name'], $_POST['address'], $_POST['email'], $_POST['phone'], $path);
            if ($employeeId) {
                move_uploaded_file($img_tmp, $path);
                Redirect::to('employee');
            } else {
                Redirect::to('add-employee');
            }
        } else {
            Session::set('error-employee', 'The email or phone are already exists');
            Redirect::to('add-employee');
        }
    }

    public function deleteEmployee($id)
    {
        $status = EmployeeModel::deleteEmployee($id);
        if (!$status) {
            echo "Failed";
            die;
        }
        Redirect::to('employee');
    }

    public function updateEmployee($id)
    {
        Session::destroy('error-employee');
        $path = './image/' . $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        required(['name','address','email','phone'],'error-employee','update-employee/'.$id);
        if (EmployeeModel::updateEmployee($id, $_POST['name'], $_POST['address'], $_POST['email'], $_POST['phone'], $path)) {
            move_uploaded_file($img_tmp, $path);
            Redirect::to('employee');
        } else {
            Redirect::to('update-employee/' . $id);
        }
    }
}