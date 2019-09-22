<?php

require('DB.php');

class User {
    private $conn;
    private static $instance = null;

    function __construct()
    {
        $this->conn = DB::getInstance()->conn;
    }

    function getInstance() {
        if ( self::$instance == null ) {
            self::$instance = new User();
        }
        return self::$instance;
    }

    function userLogin($name, $pss) {
        $result = $this->conn->query("SELECT pss FROM Users where uname='{$name}'");
        $user = mysqli_fetch_assoc($result);
        if($user == "") {
            return "Username Error";
        }
        else if($pss == $user["pss"]){
            return "Exists";
        }
        else {
            return "Pss Error";
        }
    }

    function userLogout() {
        self::$UID = null;
        self::$name = null;
    }

    function getDetails($name) {
        $result = $this->conn->query("SELECT * FROM Users where uname='{$name}'");
    }
}