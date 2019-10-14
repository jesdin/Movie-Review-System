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

    public function addMovie($_name, $_description, $_img, $_genres) {
//        echo    '<img src="data:image/jpeg;base64,'.base64_encode( $_img ) .'"height="200" width="200" class="movieImg">';
        $_img = base64_encode($_img);
        $this->conn->query("INSERT INTO Movies(Name, Description, Poster) VALUES('{$_name}', '{$_description}', '{$_img}')");
        $_id = $this->conn->query("SELECT id FROM Movies WHERE Name='{$_name}'")->fetch_assoc();
        $_id = $_id['id'];
        print_r($_genres);
        foreach($_genres as $genre) {
            echo 'br';
            echo $genre;
            $this->conn->query("INSERT INTO Genres(MovieID, genre) VALUES({$_id}, '$genre')");
        }
    }
}
//
//$movies = Movies::getInstance();
//$movies->set(0);
//foreach ($movies->get() as $movie) {
//    echo($movie->getName());
//}