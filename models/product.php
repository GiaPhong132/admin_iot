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
}
