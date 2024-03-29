<?php

require_once('DB.php');

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
        else if($pss == password_verify($pss,$user["pss"])){
            $_SESSION['user'] = $_POST['username'];
            return "Exists";
        }
        else {
            return "Pss Error";
        }
    }

    function getDetails($name) {
        $result = $this->conn->query("SELECT * FROM Users where uname='{$name}'");
        $result = $result->fetch_assoc();
        $uname = $name;
        $uid = $result["UID"];
        $firstName = $result["FirstName"];
        $lastName = $result["LastName"];
        $password = $result["pss"];
        $email = $result["email"];
        $details = array("uname" => $uname, "uid" => $uid, "fname" => $firstName, "lname" => $lastName, "pss" => $password, "email" => $email);
        return $details;

    }

    function createUser($fname, $lname, $uname, $email, $pss) {
        $hashed_password = password_hash($pss, PASSWORD_BCRYPT);
        $r = $this->conn->query("INSERT INTO Users(FirstName, LastName, uname, email, pss) VALUES('{$fname}', '{$lname}', '{$uname}', '{$email}', '{$hashed_password}')");
        return $r;
    }

    function userNameExists($name) {
        $r = $this->conn->query("SELECT * FROM Users WHERE uname='{$name}'");
        $r = mysqli_fetch_assoc($r);
        if($r == ''){
            return false;
        }
        else {
            return true;
        }
    }

    function emailIsRegistered($email) {
        $r = $this->conn->query("SELECT * FROM Users WHERE email='{$email}'");
        $r = mysqli_fetch_assoc($r);
        if($r == ''){
            return false;
        }
        else {
            return true;
        }
    }

    function getId($uname) {
        $r = $this->conn->query("SELECT * FROM Users WHERE uname='{$uname}'")->fetch_assoc();
        return $r['UID'];
    }

    function pssIsCorrect($uid, $pss) {
    $res = $this->conn->query("SELECT * from Users where UID={$uid}");
        $res = $res->fetch_assoc();
        if($pss == password_verify($pss, $res['pss']) ){
            return true;
        }
        else{
            return false;
        }
    }

    function changePss($uid, $pss) {
    $this->conn->querry("UPDATE Users SET pss='{$pss}' where UID={$uid}");
    }
}