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
            array_unshift($months, getMonth($curr_month));
            // echo $result->countDocuments();

            $curr_month -= 1;
            $count_months -= 1;
        }
        return array("amount" => $amount, "months" => $months);
    }

    static function getFanVolume()
    {
        $db = DB::getInstance();
        $fan_volume_coll = $db->selectCollection('fan_volume');
        $curr_year = date('Y');
        $curr_month = date('m');
        $start_date = "01";
        $curr_time = "00:00:00";
        $count_months = 5;
        $months = [];
        $amount = [];
        while ($count_months > 0) {
            $end_date = strval(getEndDate($curr_month));
            $start = $curr_year . '-' . $curr_month . '-' . $start_date . ' ' . $curr_time;
            $end = $curr_year . '-' . $curr_month . '-' . $end_date . ' ' . $curr_time;
            $start = new DateTime($start);
            $end = new DateTime($end);
            $start = new MongoDB\BSON\UTCDateTime($start->getTimestamp() * 1000);
            $end = new MongoDB\BSON\UTCDateTime($end->getTimestamp() * 1000);
            $cond = ['time' => ['$gte' => $start, '$lte' => $end]];

            $result  = $fan_volume_coll->find($cond);

            array_unshift($amount, getAverage($result)) . '    ';
            array_unshift($months, getMonth($curr_month));
            if ($curr_month == 1) {
                $curr_month = 12;
                $curr_year -= 1;
            } else {
                $curr_month -= 1;
            }
            $count_months -= 1;
        }
        // echo var_dump($amount);
        return array("amount" => $amount, "months" => $months);
    }

    static function getGasVolume()
    {
        $db = DB::getInstance();
        $fan_volume_coll = $db->selectCollection('gas_volume');
        $curr_year = date('Y');
        $curr_month = date('m');
        $start_date = "01";
        $curr_time = "00:00:00";
        $count_months = 5;
        $months = [];
        $amount = [];
        while ($count_months > 0) {
            $end_date = strval(getEndDate($curr_month));
            $start = $curr_year . '-' . $curr_month . '-' . $start_date . ' ' . $curr_time;
            $end = $curr_year . '-' . $curr_month . '-' . $end_date . ' ' . $curr_time;
            $start = new DateTime($start);
            $end = new DateTime($end);
            $start = new MongoDB\BSON\UTCDateTime($start->getTimestamp() * 1000);
            $end = new MongoDB\BSON\UTCDateTime($end->getTimestamp() * 1000);
            $cond = ['time' => ['$gte' => $start, '$lte' => $end]];

            $result  = $fan_volume_coll->find($cond);
            array_unshift($amount, getAverage($result)) . '    ';
            array_unshift($months, getMonth($curr_month));
            if ($curr_month == 1) {
                $curr_month = 12;
                $curr_year -= 1;
            } else {
                $curr_month -= 1;
            }
            $count_months -= 1;
        }
        return array("amount" => $amount, "months" => $months);
    }

    static function getHumiVolume()
    {
        $db = DB::getInstance();
        $fan_volume_coll = $db->selectCollection('humi_volume');
        $curr_year = date('Y');
        $curr_month = date('m');
        $start_date = "01";
        $curr_time = "00:00:00";
        $count_months = 5;
        $months = [];
        $amount = [];
        while ($count_months > 0) {
            $end_date = strval(getEndDate($curr_month));
            $start = $curr_year . '-' . $curr_month . '-' . $start_date . ' ' . $curr_time;
            $end = $curr_year . '-' . $curr_month . '-' . $end_date . ' ' . $curr_time;
            $start = new DateTime($start);
            $end = new DateTime($end);
            $start = new MongoDB\BSON\UTCDateTime($start->getTimestamp() * 1000);
            $end = new MongoDB\BSON\UTCDateTime($end->getTimestamp() * 1000);
            $cond = ['time' => ['$gte' => $start, '$lte' => $end]];

            $result  = $fan_volume_coll->find($cond);
            array_unshift($amount, getAverage($result)) . '    ';
            array_unshift($months, getMonth($curr_month));
            if ($curr_month == 1) {
                $curr_month = 12;
                $curr_year -= 1;
            } else {
                $curr_month -= 1;
            }
            $count_months -= 1;
        }
        return array("amount" => $amount, "months" => $months);
    }

    static function getLedVolume()
    {
        $db = DB::getInstance();
        $fan_volume_coll = $db->selectCollection('led_volume');
        $curr_year = date('Y');
        $curr_month = date('m');
        $start_date = "01";
        $curr_time = "00:00:00";
        $count_months = 5;
        $months = [];
        $amount = [];
        while ($count_months > 0) {
            $end_date = strval(getEndDate($curr_month));
            $start = $curr_year . '-' . $curr_month . '-' . $start_date . ' ' . $curr_time;
            $end = $curr_year . '-' . $curr_month . '-' . $end_date . ' ' . $curr_time;
            $start = new DateTime($start);
            $end = new DateTime($end);
            $start = new MongoDB\BSON\UTCDateTime($start->getTimestamp() * 1000);
            $end = new MongoDB\BSON\UTCDateTime($end->getTimestamp() * 1000);
            $cond = ['time' => ['$gte' => $start, '$lte' => $end]];

            $result  = $fan_volume_coll->find($cond);
            array_unshift($amount, getSum($result));
            array_unshift($months, getMonth($curr_month));
            if ($curr_month == 1) {
                $curr_month = 12;
                $curr_year -= 1;
            } else {
                $curr_month -= 1;
            }
            $count_months -= 1;
        }
        return array("amount" => $amount, "months" => $months);
    }

    static function getPirVolume()
    {
        $db = DB::getInstance();
        $fan_volume_coll = $db->selectCollection('pir_volume');
        $curr_year = date('Y');
        $curr_month = date('m');
        $start_date = "01";
        $curr_time = "00:00:00";
        $count_months = 5;
        $months = [];
        $amount = [];
        while ($count_months > 0) {
            $end_date = strval(getEndDate($curr_month));
            $start = $curr_year . '-' . $curr_month . '-' . $start_date . ' ' . $curr_time;
            $end = $curr_year . '-' . $curr_month . '-' . $end_date . ' ' . $curr_time;
            $start = new DateTime($start);
            $end = new DateTime($end);
            $start = new MongoDB\BSON\UTCDateTime($start->getTimestamp() * 1000);
            $end = new MongoDB\BSON\UTCDateTime($end->getTimestamp() * 1000);
            $cond = ['time' => ['$gte' => $start, '$lte' => $end]];

            $result  = $fan_volume_coll->find($cond);
            array_unshift($amount, getAverage($result) * 100);
            array_unshift($months, getMonth($curr_month));
            if ($curr_month == 1) {
                $curr_month = 12;
                $curr_year -= 1;
            } else {
                $curr_month -= 1;
            }
            $count_months -= 1;
        }
        return array("amount" => $amount, "months" => $months);
    }

    static function getServoVolume()
    {
        $db = DB::getInstance();
        $fan_volume_coll = $db->selectCollection('servo_volume');
        $curr_year = date('Y');
        $curr_month = date('m');
        $start_date = "01";
        $curr_time = "00:00:00";
        $count_months = 5;
        $months = [];
        $amount = [];
        while ($count_months > 0) {
            $end_date = strval(getEndDate($curr_month));
            $start = $curr_year . '-' . $curr_month . '-' . $start_date . ' ' . $curr_time;
            $end = $curr_year . '-' . $curr_month . '-' . $end_date . ' ' . $curr_time;
            $start = new DateTime($start);
            $end = new DateTime($end);
            $start = new MongoDB\BSON\UTCDateTime($start->getTimestamp() * 1000);
            $end = new MongoDB\BSON\UTCDateTime($end->getTimestamp() * 1000);
            $cond = ['time' => ['$gte' => $start, '$lte' => $end]];

            $result  = $fan_volume_coll->find($cond);
            array_unshift($amount, getSum($result)) . '    ';
            array_unshift($months, getMonth($curr_month));
            if ($curr_month == 1) {
                $curr_month = 12;
                $curr_year -= 1;
            } else {
                $curr_month -= 1;
            }
            $count_months -= 1;
        }
        return array("amount" => $amount, "months" => $months);
    }

    static function getTempVolume()
    {
        $db = DB::getInstance();
        $fan_volume_coll = $db->selectCollection('temp_volume');
        $curr_year = date('Y');
        $curr_month = date('m');
        $start_date = "01";
        $curr_time = "00:00:00";
        $count_months = 5;
        $months = [];
        $amount = [];
        while ($count_months > 0) {
            $end_date = strval(getEndDate($curr_month));
            $start = $curr_year . '-' . $curr_month . '-' . $start_date . ' ' . $curr_time;
            $end = $curr_year . '-' . $curr_month . '-' . $end_date . ' ' . $curr_time;
            $start = new DateTime($start);
            $end = new DateTime($end);
            $start = new MongoDB\BSON\UTCDateTime($start->getTimestamp() * 1000);
            $end = new MongoDB\BSON\UTCDateTime($end->getTimestamp() * 1000);
            $cond = ['time' => ['$gte' => $start, '$lte' => $end]];

            $result  = $fan_volume_coll->find($cond);
            array_unshift($amount, getAverage($result)) . '    ';
            array_unshift($months, getMonth($curr_month));
            if ($curr_month == 1) {
                $curr_month = 12;
                $curr_year -= 1;
            } else {
                $curr_month -= 1;
            }
            $count_months -= 1;
        }
        return array("amount" => $amount, "months" => $months);
    }
}

function getAverage($result)
{
    $sum = 0;
    $count = 0;
    foreach ($result as $item) {
        $sum += $item['value'];
        $count += 1;
    }
    return number_format($sum / $count, 2);
}

function getSum($result)
{
    $sum = 0;
    foreach ($result as $item) {
        $sum += $item['value'];
    }
    return $sum;
}

function getEndDate($month)
{
    $month = intval($month);
    $endDate = null;
    switch ($month) {
        case 2:
            $endDate = 28;
            break;
        case 2:
        case 4:
        case 6:
        case 9:
        case 11:
            $endDate = 30;
            break;
        default:
            $endDate = 31;
    }
    return $endDate;
}

function getMonth($month)
{
    if ($month == 1) return "January";
    elseif ($month == 2) return "February";
    elseif ($month == 3) return "March";
    elseif ($month == 4) return "April";
    elseif ($month == 5) return "May";
    elseif ($month == 6) return "June";
    elseif ($month == 7) return "July";
    elseif ($month == 8) return "August";
    elseif ($month == 9) return "September";
    elseif ($month == 10) return "October";
    elseif ($month == 11) return "November";
    elseif ($month == 12) return "December";
}
