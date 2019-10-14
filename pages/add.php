<?php

require('MoviesRepository.php');

//$img = $_POST['img'];
$img = $_FILES['img']['name'];
$name = $_POST['name'];
$description = $_POST['description'];
$genres = $_POST['genres'];
$genres = explode(",",$genres);

print_r($genres);
$movies = Movies::getInstance();
$movies->addMovie($name, $description, file_get_contents($_FILES['img']['tmp_name']) , $genres);
//header('Location: /Movie-Review-System/pages/AllMovies.php');