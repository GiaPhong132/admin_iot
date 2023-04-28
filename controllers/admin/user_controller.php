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
        $totalPage = User::getTotalDocuments();
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION['totalPage'] = $totalPage;
        $pageNum = 1;
        if (isset($_GET['pageNum']))
            $pageNum = $_GET['pageNum'];
        $user = User::getFrom($pageNum);
        $data = array('users' => $user, 'pageNum' => $pageNum);
        $this->render('index', $data);
    }

    public function editInfo()
    {
        $id = new ObjectID($_POST['user_id']);
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $type = $_POST['type'];
        $gender = $_POST['gender'];
        $phone_number = $_POST['phone_number'];
        $payment = $_POST['payment'];
        $concurrent_device = $_POST['concurrent_device'];
        $result = User::update($id, $email, $fname, $lname, $type, $gender, $phone_number, $payment, $concurrent_device);
        $message = ' <div id="message" class="alert alert-success" role="alert">
                                <div style="margin-left: 45%">Update Successfully</div>
                            </div>';
        if (!$result) {
            $message = ' <div id="message" class="alert alert-danger" role="alert">
                                <div style="margin-left: 45%">Update Failed</div>
                            </div>';
        }
        $pageNum = 0;
        if (isset($_POST['pageNum']))
            $pageNum = $_POST['pageNum'];
        $user = User::getAll();
        $data = array("message" => $message, 'pageNum' => $pageNum, 'users' => $user);
        $this->render('index', $data);
    }

    public function delete()
    {
        $id = new ObjectID($_POST['delete_user']);
        $result = User::deleteUser($id);
        $message = ' <div id="message" class="alert alert-success" role="alert">
                                <div style="margin-left: 45%">Delete Successfully</div>
                            </div>';
        if (!$result) {
            $message = ' <div id="message" class="alert alert-danger" role="alert">
                                <div style="margin-left: 45%">Delete Failed</div>
                            </div>';
        }
        $pageNum = 0;
        if (isset($_POST['pageNum']))
            $pageNum = $_POST['pageNum'];
        $user = User::getAll();
        $data = array("message" => $message, 'pageNum' => $pageNum, 'users' => $user);
        $this->render('index', $data);
    }
}
