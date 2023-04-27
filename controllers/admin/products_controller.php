<?php

use MongoDB\BSON\ObjectId;

require_once('controllers/admin/base_controller.php');
require_once('models/product.php');


class ProductsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'products';
    }

    public function index()
    {
        $products = Product::getAll();
        $data = array('products' => $products);
        $this->render('index', $data);
    }

    public function editInfo()
    {
        $id = new ObjectId($_POST['device_id']);
        $abstract_name = $_POST['abstract_name'];
        $name = $_POST['name'];
        $origin = $_POST['origin'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $amount_in_stock = $_POST['amount_in_stock'];
        $result = Product::update($id, $abstract_name, $name, $origin, $price, $description, $amount_in_stock);
        $message = '<div id="message_update" class="alert alert-danger" role="alert">
                            Update Failed
                            </div>';
        if ($result) {
            $message = '<div id="message_update" class="alert alert-success" role="alert">
                                Update Successfully!
                                </div>';
        }
        $products = Product::getAll();
        $data = array('message' => $message, 'products' => $products);
        $this->render('index', $data);
    }

    public function getChart()
    {

        $result =  Product::getUserNumAfter();
        $months = $result['months'];
        $amount = $result['amount'];
        $data = array('amount' => $amount, "months" => $months);
        $this->render('chart', $data);
    }

    // public function getAll()
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("SELECT * FROM product");
    //     $data = [];
    //     foreach ($req->fetch_all(MYSQLI_ASSOC) as $x) {
    //         $data[] = new Admin(
    //             $x['id'],
    //             $x['price'],
    //             $x['name'],
    //             $x['description'],
    //             $x['review'],
    //             $x['img']
    //         );
    //     }
    //     return $data;
    // }
    // public function add()
    // {
    //     $page_number = $_GET['pg'];


    //     $id = (string)date("Y_m_d_h_i_sa");
    //     $fileuploadname = (string)$id;
    //     $name = $_POST['name'];
    //     $price = $_POST['price'];
    //     $description = $_POST['description'];
    //     $content = $_POST['content'];

    //     $target_dir = "public/images/product/";
    //     $path = $_FILES['fileToUpload']['name'];
    //     $ext = pathinfo($path, PATHINFO_EXTENSION);
    //     $fileuploadname .= ".";
    //     $fileuploadname .= $ext;
    //     $target_file = $target_dir . basename($fileuploadname);
    //     if (file_exists($target_file)) {
    //         echo "Sorry, file already exists.";
    //     }
    //     $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     if (
    //         $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
    //         && $fileType != "gif"
    //     ) {
    //         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     }
    //     if ($_FILES["fileToUpload"]["size"] > 500000) {
    //         echo "Sorry, your file is too large.";
    //     }
    //     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    //     Product::insert($name, $price, $description, $content, $target_file);
    //     $tmp = "Location: index.php?page=admin&controller=paginate&action=index&pg=$page_number";
    //     header($tmp);
    // }
    // public function edit()
    // {
    //     $id = $_POST['id'];
    //     $code = (string)date("Y_m_d_h_i_sa");
    //     $fileuploadname = (string)$code;
    //     $name = $_POST['name'];
    //     $price = $_POST['price'];
    //     $content = $_POST['content'];
    //     $description = $_POST['description'];
    //     $page_number = $_GET['pg'];


    //     $urlcurrent = Product::get((int)$id)->img;
    //     if (!isset($_FILES["fileToUpload"]) || $_FILES['fileToUpload']['tmp_name'][0] == "") {
    //         Product::update($id, $name, $price, $description, $content, $urlcurrent);
    //         echo "Dữ liệu upload bị lỗi";
    //         $tmp = "Location: index.php?page=admin&controller=paginate&action=index&pg=$page_number";
    //         header($tmp);
    //         die;
    //     } else {
    //         $target_dir = "public/images/product/";
    //         $path = $_FILES['fileToUpload']['name'];
    //         $ext = pathinfo($path, PATHINFO_EXTENSION);
    //         $fileuploadname .= ".";
    //         $fileuploadname .= $ext;
    //         $target_file = $target_dir . basename($fileuploadname);
    //         if (file_exists($target_file)) {
    //             echo "Sorry, file already exists.";
    //         }
    //         $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //         if (
    //             $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
    //             && $fileType != "gif"
    //         ) {
    //             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //             $upload_ok = 0;
    //         }
    //         if ($_FILES["fileToUpload"]["size"] > 5000000) {
    //             echo "Sorry, your file is too large.";
    //         }
    //         $file_pointer = $urlcurrent;
    //         @unlink($file_pointer);
    //         move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    //         Product::update($id, $name, $price, $description, $content, $target_file);
    //         $tmp = "Location: index.php?page=admin&controller=paginate&action=index&pg=$page_number";
    //         header($tmp);
    //     }
    // }

    // public function delete()
    // {
    //     $id = $_POST['id'];
    //     $page_number = $_GET['pg'];

    //     $urlcurrent = Product::get((int)$id)->img;
    //     unlink($urlcurrent);
    //     Product::delete($id);

    //     $tmp = "Location: index.php?page=admin&controller=paginate&action=index&pg=$page_number";
    //     header($tmp);
    // }
}
