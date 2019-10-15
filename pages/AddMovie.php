<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if ($_SESSION['user'] == null) {
        header('Location: /Movie-Review-System/');
    }
}
?>

<!doctype>
<html>
    <head>
        <title>MOVIES</title>
        <link rel="stylesheet" href="../css/movies.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
       <script>
        selectedGenre = new Array();
       </script>
        <style>
            .addImage{
                border: none;
                height : 285px;
                width : 250px;
                margin-top: 0.5%;
                margin-left: 0.5%;
            }
        
            .divAddMovie{
                border: none;
                height: 360px;
                width: 1000px;
                margin-top: 5%;
                margin-left: 25%;
            }

            .poster{
                margin-top: 0.5%;
                height : 320px;
                width : 250px;

            }

            .selectImage{
                margin-top: 3%;
                margin-left: 18%;
                color: tomato;
                cursor: pointer;
            }

            .p1{
                color: tomato;
                font-size: 18px;
                margin-top: -140%;
                margin-left: 120%;
                letter-spacing: 2px;
            }

            .p2{
                color: tomato;
                font-size: 18px;
                margin-top: -100%;
                margin-left: 120%;
                letter-spacing: 2px;
            }

            .p3{
                color: tomato;
                font-size: 18px;
                margin-top: 5%;
                margin-left: 120%;
                letter-spacing: 2px;
            }

            .p4{
                margin-left: 130%;
                border: tomato;
            }

            #name{
                border:none;
                background: rgba(0, 0, 0, 0.3);
                color: antiquewhite;
                outline: none;
                margin-left: 120%;
                margin-top: -120%;
                height: 30px;
                width: 500px;
            }

            #description{
                border:none;
                background: rgba(0, 0, 0, 0.3);
                color: antiquewhite;
                outline: none;
                margin-left: 120%;
                margin-top: 0.5%;
                height:  120px;
                width: 500px;

            }

            #genre{
                border:none;
                background: rgba(0, 0, 0, 0.3);
                color: antiquewhite;
                outline: none;
                margin-left: 120%;
                margin-top: -5%;
                height: 30px;
                width: 500px;

            }

            .badge-info{
            background: transparent;
            border: solid tomato 2px;
            border-radius: 10px;
            color: tomato;
            margin-left: 1%;
            margin-top: 1%;
            letter-spacing: 1px;
            outline: none;
            }

            .badge-info:hover{
                background: tomato;
                color: antiquewhite;
                /* opacity: 0.9; */
            }

            .badge-info:inset{
                background: tomato;
                color: antiquewhite;
            }

            #done{
                border: solid tomato 1.5px;
                background: tomato;
                color: antiquewhite;
                outline: none;
                border-radius: 10px;
                font-size: 15px;
                width: 100px;
                height: 30px;
                margin-left: 200%;
                margin-top: -10%;
            }

            .container1{
                margin-top: -5%;
                margin-left:118%;
                width: 500px;
                height: 100px;
                /* border: solid tomato 3px; */
                /* overflow-x: hidden;
                overflow-y: scroll; */
                /* overflow: auto; */
            }
        </style>
    </head>
    <body background="../images/background.jpg">

    <?php
        $mGenre = array('Action', 'Adventure', 'Comedy', 'Crime', 'Drama', 'Fantasy', 'Historical', 'Horror', 'Mystery', 'Political', 'Romance', 'Science-Fiction', 'Thriller');
        include('navigationBar.php');
        // include('_navbar.php');
        echo    '<div onclick="location.href=\"www.google.com\";" class=divAddMovie>';
        echo    '<div class=addImage>';
        echo    '<form action="add.php" method="post" enctype="multipart/form-data"><img src="" id="moviePoster" class=poster>';
        echo    '<input style="font-size: 12px;" type="file" name="img" id="img" class=selectImage required>';
        echo    '<p class=p1>Title:</p><input style="font-size: 15px;" id="name" name="name" type=text placeholder="Enter Title" required autocomplete=off>';
        echo    '<p class=p2>Description:</p><textarea style="font-size: 15px;" id="description" name="description" cols="40" rows="5" placeholder="Enter description" required></textarea>';
        echo    '<p class=p3>Genre:</p>';
        echo    '<p class=p4>';
        echo    '<input type="text" id="genres" name="genres" hidden>';
        // echo    '<input  id="genre" name="genre" type=text placeholder="Enter Genre" required autocomplete=off disabled>'; 
        // echo    '<div class="btn-group mr-2" role="group" aria-label="First group">';
        echo    '<div class=container1>';
        foreach ($mGenre as $genre){
            echo    '&nbsp';
            echo     '<text id='.$genre.' class="badge badge-info" style="background:transparent;
                        border: solid tomato 2px; border-radius: 10px; margin-left: 1%; margin-top: 1%; letter-spacing: 1px; 
                        outline: none;font-size: 12px; color: antiquewhite;">'.$genre.'</text>';
            ?>
            <script>
                $('#<?php echo $genre ?>').click(function() {
                    if($('#<?php echo $genre ?>').hasClass('badge badge-info')) {
                        $('#<?php echo $genre ?>').removeClass('badge badge-info');
                        $('#<?php echo $genre ?>').addClass('badge badge-info-selected');
                        selectedGenre.push('<?php echo $genre ?>');
                    }
                    else{
                        $('#<?php echo $genre ?>').removeClass('badge badge-info-selected');
                        $('#<?php echo $genre ?>').addClass('badge badge-info');
                        selectedGenre.pop('<?php echo $genre ?>');
                    }
                    document.getElementById('genres').value = selectedGenre;
                    console.log(selectedGenre);
                });
            </script>
            <?php
            if($genre == $mGenre[6] || $genre == $mGenre[12])
            {
                echo '<br>';
            }

        }      
        echo    '</p>';
        echo    '</div>';
        echo    '<button id="done" type="submit">DONE</button>';
        echo    '<script type="text/javascript" >
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $("#moviePoster").attr("src", e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#img").change(function(){
                    readURL(this);
                });
                </script>';
        

        echo    '</div></div></form>';

        require('DB.php');
                

    ?>

    </body>
</html>