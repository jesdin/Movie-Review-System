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

            #badge{
            background: transparent;
            height: 20px;
            border: solid tomato 2px;
            border-radius: 10px;
            color: tomato;
            margin-top: 8px;
            margin-left: 1%;
            letter-spacing: 1px;
            font-size: 10px;
            }

            .genre{
                margin-left: 26%;
                margin-top: -2.6%;
            }
            /* #badge{
                background: transparent;
            } */
        </style>
    </head>
    <body background="../images/background.jpg">

    <?php
        session_start();
        if($_SESSION['user'] === null)
        {
            header('Location: /Movie-Review-System/');
        }
        
        require('MoviesRepository.php');
        // include('_navbar.php');
        include('navigationBar.php');

        $movies = Movies::getInstance();
        $movies->set(0);
        foreach ($movies->get() as $movie) {
            echo   '<div onclick="location.href=\'DisplayMovie.php?id=' .$movie->getId(). '\';" class=divMovies>';
            echo    '<img src="data:image/jpeg;base64,' . $movie->getImage() .'"height="200" width="200" class="movieImg">';
            echo    '<p class="p1">' .$movie->getName().'</p>';
            echo    '<p class="p2">'.$movie->getDescription().'</p>';
            echo    ' <p class="p2">Genre :</p><p class=genre>';
            foreach($movie->getGenre() as $genre) {
                echo    '<span class="badge badge-info" id=badge>';
                  echo     $genre.'';
                  echo    '</span>';
                }
            echo    '</p>';
            echo    '</div>';
        }

    ?>

    </body>
</html>
