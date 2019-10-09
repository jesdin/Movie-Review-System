<!doctype>
<html>
    <head>
        <title>MOVIES</title>
        <link rel="stylesheet" href="../css/movies.css">
    </head>
    <body background="../images/background.jpg">

    <?php
        require('MoviesRepository.php');
        include('_navbar.php');
        $movies = Movies::getInstance();
        $movies->set(0);
        foreach ($movies->get() as $movie) {
            echo   '<div onclick="location.href="www.google.com";" class=divMovies>';
            echo    '<img src="data:image/jpeg;base64,'.base64_encode( $movie->getImage() ) .'"height="200" width="200" class="movieImg">';
            echo    '<p class="p1">' .$movie->getName().'</p>';
            echo    '<p class="p2">'.$movie->getDescription().'</p>';
            echo    ' <p class="p2">Genre :'.$movie->getGenre()[0].'</p>';
            echo    '</div>';
        }
    ?>

    </body>
</html>
