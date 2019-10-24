<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header('Location: /Movie-Review-System/');
    }
?>

<!doctype html>

<html>

    <head>
        <title>MOVIES</title>
        <link rel="stylesheet" href="../css/movies.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            #navbarDropdown{
                margin-top: 0.35%;
            }

            #movieInfo{
                height: 650px;
                width: 700px;
                margin-top: -0.5%;
                margin-left: 26%;
            }

            #movieTitle{
                color: tomato;
                font-size: 40px;
                letter-spacing: 1px;
                font-weight: lighter;
                font-style: bold;
            }

            #movieImg{
                height: 350px;
                width: 305px;
                margin-top: 0.5%;
                margin-left: 27.5%;
            }

            #description{
                background: transparent;
                color: antiquewhite;
                font-size: 15px;
                width: 600px;
                height: 200px;
                margin-left: 7%;
                border: none;
                margin-top: 2%;
                align: justify;
            }

            .gradient-border {
                --borderWidth: 4px;
                background: #1D1F20;
                position: relative;
                border-radius: var(--borderWidth);
                }
                .gradient-border:after {
                content: '';
                position: absolute;
                top: calc(-1 * var(--borderWidth));
                left: calc(-1 * var(--borderWidth));
                height: calc(100% + var(--borderWidth) * 2);
                width: calc(100% + var(--borderWidth) * 2);
                /* background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82); */
                background: linear-gradient(60deg, #ff5500, #fa0000, #ff6924, #b3450b, #d67711, #e8553f, #ff3333, #ffc14f);
                border-radius: calc(2 * var(--borderWidth));
                z-index: -1;
                animation: animatedgradient 5s ease alternate infinite;
                background-size: 300% 300%;
                }


                @keyframes animatedgradient {
                    0% {
                        background-position: 0% 50%;
                    }
                    50% {
                        background-position: 100% 50%;
                    }
                    100% {
                        background-position: 0% 50%;
                    }
                }

                #commentArea{
                height: 650px;
                width: 700px;
                margin-top: 2%;
                margin-left: 26%;
                /* background: rgba(0, 0, 0, 0.3); */
                background: transparent;
                }


            #myComment{
                background: rgba(0, 0, 0, 0.3);
                color: antiquewhite;
                font-size: 15px;
                width: 700px;
                height: 125px;
            }

            #myComment:focus{
                outline: none;
                border: solid tomato 1.5px;
            }

            #post{
                margin-top: 1%;
                height: 30px;
                width: 70px;
                background: tomato;
                color: antiquewhite;
                font-size: 15px;
                letter-spacing: 0.5px;
                border: none;
                border-radius: 50px;
            }

            #post:hover{
                opacity: 0.8;
            }

            #post:focus{
                outline:none;
            }

            #userComments{
                background: rgba(0, 0, 0, 0.3);
                color: antiquewhite;
                font-size: 15px;
                width: 700px;
                height: 125px;
                margin-top: 5%;
                
            }

            

        </style>
    </head>

    <body background="../images/background.jpg">

    <?php
        require_once('MoviesRepository.php');
        // require_once('Report.php');
        // include('_navbar.php');
        include('navigationBar.php');
        
        $id  = $_REQUEST['id'];
        $movie = Movies::getInstance();
        $movie = $movie->getMovie($id);

        echo    '<div id=movieInfo class="gradient-border">';
        echo    '<p align=center id=movieTitle>' . $movie->getName(). '</p>';
        echo    '<img src="data:image/jpeg;base64,' . $movie->getImage() .'"id=movieImg>';
        echo    '<textarea style="font-size: 15px;" id="description" align=justify name="description" cols="40" rows="5" placeholder="Movie Description here" disabled>'.$movie->getDescription(    ).'</textarea>';
        echo    '</div>';
        echo    '<div id=commentArea>';
        echo    '<form method="POST" action="addComment.php">';
        echo    '<input type="int" name="MID" value="'.$movie->getId().'" hidden>';
        echo    '<input type="text" name="uname" value="'.$_SESSION['user'].'" hidden>';
        echo    '<textarea style="font-size: 15px;" id=myComment align=justify name=myComment cols="40" rows="5" placeholder="Write your comment here"></textarea>';
        echo    '<button id=post type="submit">Post</button>';
        echo    '</form>';
        
        foreach($movie->getComments() as $comment)
        {       
            echo    '<br>';
            echo    '<form action="Report.php" type="POST">';
            echo    '<textarea style="font-size: 15px;" id=myComment align=justify name=myComment cols="40" disabled>';
            echo    $comment["comment"];
            echo    '</textarea>';
            echo    '<input type="int" name="ID" value="'.$comment["ID"].'" hidden>';
            echo    '<input type="int" name="movieID" value="'.$movie->getId().'" hidden>';
            echo    '<button class="btn" type="Submit" id="'.$comment['ID'].'"><img id="img'.$comment['ID'].'" src="../images/icons/report.png"></button>';
            echo    '</form>';
            ?>
            <?php
        }
        echo    '</div>';
    ?>
    <script>
        $(document).ready(function() {
            <?php foreach($movie->getComments() as $comment) {
                echo    'if('.$comment["reported"].' != 1) {
                    $("#img'. $comment["ID"] .'").attr("src", "../images/icons/reported.png");
                }
                else{
                    $("#img'. $comment["ID"] .'").attr("src", "../images/icons/report.png");
                }';
            } ?>
        });
    </script>
    </body>
</html>