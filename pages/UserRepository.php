<?php

require('DB.php');

class User {
    private $conn;
    private $UID = null;
    public $name = null;

    function __construct()
    {
        $this->conn = DB::getInstance()->conn;
    }

    function getInstance() {
        static $instance = null;
        if($instance == null) {
            $instance = new User();
        }
        return $instance;
    }

    function userLogin($name, $pss) {
        $result = $this->conn->query("SELECT * FROM Users where uname='{$name}'");
        $user = mysqli_fetch_assoc($result);
        $this->UID = $user["UID"];
        $this->name = $user["uname"];
        echo("Welcome {$user['FirstName']}");
    }

    function userLogout() {
        $this->UID = null;
        $this->name = null;
    }
}