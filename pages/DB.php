<?php

class DB {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "MovieReviewSystem";
    public $conn;
    function __construct()
    {
        $this->conn =  new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    function getInstance()
    {
        static $instance = null;
        if ($instance == null) {
            $instance = new DB();
        }
        return $instance;
    }
}
