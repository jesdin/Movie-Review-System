<!doctype>
<html>
<head>
        <title>MOVIES</title>
        <link rel="stylesheet" href="../css/movies.css">
    </head>

    <body background="../images/background.jpg">
    <div class="div1">
        <form action="#" method="GET">
            <button id="featured" type="submit">Featured Movies</button>
        </form>
        <form action="#" method="GET">
            <button id="all" type="submit">All Movies</button>
        </form>
        <form action="#" method="GET">
            <button id="feedback" type="submit">Feedback</button>
        </form>
        <p class="account">
            <a class="a1" href="#">Account</a>
            <a class="a2" href="loginpage.html">Logout</a>
        </p>
        </form>

    </div>

    <?php
        require('MoviesRepository.php');
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
