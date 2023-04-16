<?php
require_once('/xampp/htdocs/admin_iot/controllers/admin/base_controller.php');
require_once('/xampp/htdocs/admin_iot/models/user.php');

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
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $urlcurrent = $_POST['img'];
        // Photo
        $target_dir = "public/img/user/";
        $path = $_FILES['fileToUpload']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $id = (string)date("Y_m_d_h_i_sa");
        $fileuploadname = (string)$id;
        $fileuploadname .= ".";
        $fileuploadname .= $ext;
        $target_file = $target_dir . basename($fileuploadname);
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        }
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allow certain file formats
        if (
            $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
            && $fileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        $file_pointer = $urlcurrent;
        unlink($file_pointer);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        // Update
        $change_info = User::update($email, $target_file, $fname, $lname, $gender, $age, $phone);
        header('Location: index.php?page=admin&controller=user&action=index');
    }

    public function delete()
    {
        $page_number = $_GET['pg'];

        $email = $_POST['email'];
        $createAt = $_POST['createAt'];
        $delete_user = User::delete($email, $createAt);


        $tmp = "Location: index.php?page=admin&controller=paginateuser&action=index&pg=$page_number";
        header($tmp);


        // header('Location: index.php?page=admin&controller=members&action=index');
    }
}
