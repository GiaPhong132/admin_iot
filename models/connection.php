<?php
require 'vendor/autoload.php';


class DB
{
    public static $instance = NULL;
    public static function getInstance()
    {
        $connect =  new MongoDB\Client('mongodb+srv://giaphong:123@cluster0.iyuulht.mongodb.net');
        self::$instance = $connect->selectDatabase('company');

        return self::$instance;
    }
}
