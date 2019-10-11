<?php

require('DB.php');

class Movie {
    private $id;
    private $name;
    private $description;
    private $img;
    private $genre;

    public function set($_id, $_name, $_description, $_img, $_genre) {
        $this->id = $_id;
        $this->name = $_name;
        $this->description = $_description;
        $this->img = $_img;
        $this->genre = $_genre;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->img;
    }

    public function getGenre() {
        return $this->genre;
    }
}

class Movies {
    //$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
    private $conn;
    private static $instance;
    private $movies = array();

    function __construct() {
        $this->conn = DB::getInstance()->conn;
    }

    public static function getInstance() {
        if ( self::$instance == null ) {
            self::$instance = new Movies();
        }
        return self::$instance;
    }

    public function set($offset) {
        $result = $this->conn->query("SELECT * FROM Movies LIMIT 10 OFFSET {$offset}");
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $g = null;
                $res = $this->conn->query("SELECT * FROM Genres WHERE MovieID={$row['ID']}");
                if($res->num_rows > 0) {
                    while($r = $res->fetch_assoc()) {
                        $g[] = $r['genre'];
                    }
                }
                $m = new Movie();
                $m->set($row['ID'], $row['Name'], $row['Description'], $row['Poster'], $g);
                $this->movies[] = $m;
            }
        }
    }

    public function get() {
        return $this->movies;
    }
}
//
//$movies = Movies::getInstance();
//$movies->set(0);
//foreach ($movies->get() as $movie) {
//    echo($movie->getName());
//}