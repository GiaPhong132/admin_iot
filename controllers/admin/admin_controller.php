<?php
require_once('/xampp/htdocs/admin_iot/controllers/admin/base_controller.php');
require_once('/xampp/htdocs/admin_iot/models/admin.php');

class AdminController extends BaseController
{
    function __construct()
    {
        $this->folder = 'users';
    }

    public function index()
    {
        // $admin = Admin::getAll();
        // $data = array('admin' => $admin);
        $data = [];
        $this->render('index', $data);
    }
}
