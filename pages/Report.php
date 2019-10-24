<?php

//session_start();
require_once('UserRepository.php');
require_once('DB.php');

class Reports {
    private $conn;
    private static $instance = null;

    function __construct() {
        $this->conn = DB::getInstance()->conn;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Reports();
        }
        return self::$instance;
    }

    function addReport($ID, $movieID) {
        $UID = User::getInstance()->getId($_SESSION['user']);
        $query = "INSERT INTO Reports VALUES({$UID}, {$movieID}, {$ID})";
        $r = $this->conn->query($query);
        echo('console.log("'
            .$r
            .'\n'
            .$query
            .'")');
    }

    function removeReport($ID, $movieID) {
        $UID = User::getInstance()->getId($_SESSION['user']);
        $query = "DELETE FROM Reports WHERE UID=" .$UID. " AND MovieID=" .$movieID. " AND ID=" .$ID;
        $r = $this->conn->query($query);
        echo('console.log("'
            .$r
            .'\n'
            .$query
            .'")');
    }

    function checkIfReported($commentID, $movieID, $UID) {

    }
}
