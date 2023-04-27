<?php


require_once('connection.php');
class Product
{
    public $id;
    public $abstract_name;
    public $name;
    public $origin;
    public $price;
    public $description;
    public $amount_in_stock;

    public function __construct($id, $abstract_name, $name, $origin, $price, $description, $amount_in_stock)
    {
        $this->id = $id;
        $this->abstract_name = $abstract_name;
        $this->name = $name;
        $this->origin = $origin;
        $this->price = $price;
        $this->description = $description;
        $this->amount_in_stock = $amount_in_stock;
    }

    static function getAll()
    {

        $db = DB::getInstance();
        $product_collection = $db->selectCollection('abstract_device');
        $product_all = $product_collection->find();
        $products = [];
        foreach ($product_all as $product) {
            $products[] = new Product(
                $product['_id'],
                $product['abstract_name'],
                $product['name'],
                $product['origin'],
                $product['price'],
                $product['description'],
                $product['amount_in_stock'],
            );
        }
        return $products;
    }

    // static function get($id)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("SELECT * FROM product WHERE id = $id");
    //     $result = $req->fetch_assoc();
    //     $product = new Product(
    //         $result['id'],
    //         $result['name'],
    //         $result['price'],
    //         $result['description'],
    //         $result['content'],
    //         $result['img']
    //     );
    //     return $product;
    // }

    static function insert($name, $price, $description, $content, $img)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "INSERT INTO product (name, price, description, content, img)
            VALUES ('$name', $price, '$description', '$content', '$img');"
        );
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM product WHERE id = $id");
        return $req;
    }

    static function update($id, $abstract_name, $name, $origin, $price, $description, $amount_in_stock)
    {
        $db = DB::getInstance();
        $device_collection = $db->selectCollection('abstract_device');
        $cond = ['_id' => $id];
        $changeValue = ['$set' => ['abstract_name' => $abstract_name, 'name' => $name, 'origin' => $origin, 'price' => $price, 'description' => $description, 'amount_in_stock' => $amount_in_stock]];
        $result = $device_collection->updateOne($cond, $changeValue);
        return $result;
    }

    static function getUserNumAfter()
    {
        $db = DB::getInstance();
        $user_collection = $db->selectCollection('user');
        $curr_year = date('Y');
        $curr_month = date('m');
        $curr_date = "01";
        $curr_time = "00:00:00";
        $count_months = 4;
        $months = [];
        $amount = [];
        while ($count_months > 0) {
            $current_date = $curr_year . '-' . $curr_month . '-' . $curr_date . ' ' . $curr_time;
            $date = new DateTime($current_date);
            $utc_date = new MongoDB\BSON\UTCDateTime($date->getTimestamp() * 1000);
            $cond = ['date_created' => ['$lt' => $utc_date]];
            // var_dump($cond);
            array_unshift($amount, $user_collection->count($cond));
            array_unshift($months, $curr_month);
            // echo $result->countDocuments();

            $curr_month -= 1;
            $count_months -= 1;
        }
        return array("amount" => $amount, "months" => $months);
    }
}
