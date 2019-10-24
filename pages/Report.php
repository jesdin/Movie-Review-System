<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
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
        echo($query);
    }

    function removeReport($ID, $movieID) {
        $UID = User::getInstance()->getId($_SESSION['user']);
        $query = "DELETE FROM Reports WHERE UID=" .$UID. " AND MovieID=" .$movieID. " AND ID=" .$ID;
        $r = $this->conn->query($query);
        echo($query);
    }

    function checkIfReported($commentID, $movieID) {
        $UID = User::getInstance()->getId($_SESSION['user']);        
        $query = "SELECT * FROM Reports WHERE UID=" .$UID. " AND MovieID=" .$movieID. " AND ID=" .$commentID;
        $r = $this->conn->query($query);
        $r = $r->fetch_assoc();
        if($r['ID']=='') {
            return 1;
        }
        else{
            return 0;
        }
    }
}
if(isset($_REQUEST['ID'])){
    $report = new Reports();
    if($report->checkIfReported($_REQUEST['ID'], $_REQUEST['movieID'])) {
        $report->addReport($_REQUEST['ID'], $_REQUEST['movieID']);
    }
    else {
        $report->removeReport($_REQUEST['ID'], $_REQUEST['movieID']);
    }
    print_r($_REQUEST);

    header('Location: /Movie-Review-System/pages/DisplayMovie.php?id=' .$_REQUEST['movieID']);
}