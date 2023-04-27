<?php
require_once('connection.php');
class User
{
    // public $profile_photo;
    public $id;
    public $email;
    public $fname;
    public $lname;
    public $gender;
    public $state;
    public $type;
    public $payment;
    public $concurrent_device;
    public $phone_number;
    public $birthday;
    public $date_created;
    // public $password;

    public function __construct($id, $email, $fname, $lname, $gender, $state, $type, $payment, $concurrent_device, $phone_number, $birthday, $date_created)
    {
        $this->id = $id;
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->gender = $gender;
        $this->state = $state;
        $this->type = $type;
        $this->payment = $payment;
        $this->concurrent_device = $concurrent_device;
        $this->phone_number = $phone_number;
        $this->birthday = $birthday;
        $this->date_created = $date_created;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $users_collection = $db->selectCollection('user');
        $user_all = $users_collection->find();
        $users = [];
        foreach ($user_all as $user) {
            $users[] = new User(
                $user['_id'],
                $user['email'],
                $user['fname'],
                $user['lname'],
                $user['gender'],
                $user['state'],
                $user['type'],
                $user['payment'],
                $user['concurrent_device'],
                $user['phone_number'],
                $user['birthday'],
                $user['date_created']
                // Do not return password
            );
        }
        return $users;
    }

    // static function get($email)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query(
    //         "
    //         SELECT email, profile_photo, fname, lname, gender, age, phone, createAt, updateAt
    //         FROM user
    //         WHERE email = '$email'
    //         ;"
    //     );
    //     $result = $req->fetch_assoc();
    //     $user = new User(
    //         $result['email'],
    //         $result['profile_photo'],
    //         $result['fname'],
    //         $result['lname'],
    //         $result['gender'],
    //         $result['age'],
    //         $result['phone'],
    //         $result['createAt'],
    //         $result['updateAt'],
    //         '' // Do not return password
    //     );
    //     return $user;
    // }

    // static function insert($email, $profile_photo, $fname, $lname, $gender, $age, $phone, $password)
    // {
    //     $password = password_hash($password, PASSWORD_DEFAULT);
    //     $db = DB::getInstance();


    //     $req = $db->query(
    //         "
    //         INSERT INTO USER (email, profile_photo, fname, lname, gender, age, phone, createAt, updateAt, password)
    //         VALUES ('$email', '$profile_photo', '$fname', '$lname', $gender, $age, '$phone', NOW(), NOW(), '$password')
    //         ;"
    //     );



    //     return $req;
    // }

    // static function delete($email, $createAt)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("DELETE FROM user WHERE email = '$email' AND createAt = '$createAt';");
    //     return $req;
    // }


    static function update($id, $email, $fname, $lname, $type, $gender, $phone_number, $payment, $concurrent_device)
    {
        $db = DB::getInstance();
        $users_collection = $db->selectCollection('user');
        $cond = ['_id' => $id];
        $changeValue = ['$set' => ['email' => $email, 'fname' => $fname, 'lname' => $lname, 'type' => $type, 'gender' => $gender, 'phone_number' => $phone_number, 'payment' => $payment, 'concurrent_device' => $concurrent_device]];
        $result = $users_collection->updateOne($cond, $changeValue);
        return $result;
    }

    // public $profile_photo;
    // public $id;
    // public $email;
    // public $fname;
    // public $lname;
    // public $gender;
    // public $state;
    // public $type;
    // public $payment;
    // public $concurrent_device;
    // public $phone_number;
    // public $birthday;
    // public $date_created;
    // // public $password;


    // static function validation($email, $password)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("SELECT * FROM user WHERE email = '$email'");
    //     if (@password_verify($password, $req->fetch_assoc()['password']))
    //         return true;
    //     else
    //         return false;
    // }
}
