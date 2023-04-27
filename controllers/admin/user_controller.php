<?php


require_once('/xampp/htdocs/admin_iot/controllers/admin/base_controller.php');
require_once('/xampp/htdocs/admin_iot/models/user.php');

use MongoDB\BSON\ObjectID;

class UserController extends BaseController
{
    function __construct()
    {
        $this->folder = 'users';
    }

    public function index()
    {
        $user = User::getAll();
        $data = array('users' => $user);
        $this->render('index', $data);
    }

    public function editInfo()
    {
        // $id = $_POST['user_id'];
        // $id = new ObjectID($_POST['user_id']);
        $id = new ObjectID($_POST['user_id']);
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $type = $_POST['type'];
        $gender = $_POST['gender'];
        $gender = 'Male';
        $phone_number = $_POST['phone_number'];
        $payment = $_POST['payment'];
        // $payment = 'Momo';
        $concurrent_device = $_POST['concurrent_device'];
        // $concurrent_device = 13;
        $result = User::update($id, $email, $fname, $lname, $type, $gender, $phone_number, $payment, $concurrent_device);
        echo var_dump($result);
    }

    // public function delete()
    // {
    //     $page_number = $_GET['pg'];

    //     $email = $_POST['email'];
    //     $createAt = $_POST['createAt'];
    //     $delete_user = User::delete($email, $createAt);


    //     $tmp = "Location: index.php?page=admin&controller=paginateuser&action=index&pg=$page_number";
    //     header($tmp);


    //     // header('Location: index.php?page=admin&controller=members&action=index');
    // }
}
