<!doctype>
<html>
    <head>
        <title>MOVIES</title>
        <link rel="stylesheet" href="../css/movies.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            .divMovies{
            border: solid tomato 3px;
            height: 300px;
            width: 1500px;
            margin-top: 2%;
            }

            .badge-info{
            background: transparent;
            border: solid tomato 2px;
            border-radius: 10px;
            color: tomato;
            margin-left: 1%;
            letter-spacing: 1px;
            }

            .genre{
                margin-left: 26%;
                margin-top: -2.6%;
            }
        </style>
    </head>
    <body background="../images/background.jpg">

    <?php
        require('MoviesRepository.php');
        include('_navbar.php');
        $movies = Movies::getInstance();
        $movies->set(0);
        foreach ($movies->get() as $movie) {
            echo   '<div onclick="location.href="www.google.com";" class=divMovies>';
//            echo    '<img src="data:image/jpeg;base64,'.base64_encode( $movie->getImage() ) .'"height="200" width="200" class="movieImg">';
            echo    '<img src="data:image/jpeg;base64,' . $movie->getImage() .'"height="200" width="200" class="movieImg">';
            echo    '<p class="p1">' .$movie->getName().'</p>';
            echo    '<p class="p2">'.$movie->getDescription().'</p>';
            // for($i=0; $i<=1; $i++){
            // echo    ' <p class="p3">Genre : '.$movie->getGenre()[$i].'</p>';
            // }
            echo    ' <p class="p2">Genre :</p><p class=genre>';
            foreach($movie->getGenre() as $genre) {
                echo    '<span class="badge badge-info">';
                  echo     $genre.'';
                  echo    '</span>';
                }
            echo    '</p>';
            echo    '</div>';
        }

    ?>

    </body>
</html>
