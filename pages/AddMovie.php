<!doctype>
<html>
    <head>
        <title>MOVIES</title>
        <link rel="stylesheet" href="../css/movies.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
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
                margin-left: 22%;
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
                margin-top: -135%;
                margin-left: 120%;
                letter-spacing: 2px;
            }

            .p2{
                color: tomato;
                font-size: 18px;
                margin-top: 5%;
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
                margin-top: -5%;
                height: 30px;
                width: 500px;
            }

            #description{
                border:none;
                background: rgba(0, 0, 0, 0.3);
                color: antiquewhite;
                outline: none;
                margin-left: 120%;
                margin-top: -5%;
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

            .badge-info-selected{
                background: tomato;
                color: antiquewhite;
            }

            #done{
                border: solid tomato 1.5px;
                background: tomato;
                color: antiquewhite;
                outline: none;
                border-radius: 5px;
                font-size: 15px;
                width: 100px;
                height: 30px;
                margin-left: 120%;
                margin-top: -15%;
            }

            .container{
                margin-top: -5%;
                margin-left:110%;
                width: 500px;
                height: 100px;
                /* border: solid tomato 3px; */
                /* overflow-x: hidden;
                overflow-y: scroll; */
                /* overflow: auto; */
                
            }
        </style>
        <script>
            var selectedGenre = [];
        </script>
    </head>
    <body background="../images/background.jpg">

    <?php
        $mGenre = array('Action', 'Adventure', 'Comedy', 'Crime', 'Drama', 'Fantasy', 'Historical', 'Horror', 'Mystery', 'Political', 'Romance', 'Science-Fiction', 'Thriller');
        include('_navbar.php');
        echo    '<div class=divAddMovie>';
        echo    '<div class=addImage>';
        echo    '<form action="MoviesRepository.php" method="post"><img src="" id="moviePoster" class=poster>';
        echo    '<input type="file" name="img" id="img" class=selectImage required>';
        echo    '<p class=p1>Title:</p><input id="name" name="name" type=text placeholder="Enter Title" required autocomplete=off>';
        echo    '<p class=p2>Description:</p><textarea id="description" name="description" cols="40" rows="5" placeholder="Enter description" required></textarea>';
        echo    '<p class=p3>Genre:</p>';
        echo    '<p class=p4>';
        // echo    '<input  id="genre" name="genre" type=text placeholder="Enter Genre" required autocomplete=off disabled>'; 
        // echo    '<div class="btn-group mr-2" role="group" aria-label="First group">';
        echo    '<div class=container>';
        foreach ($mGenre as $genre){
            echo    '&nbsp';
            echo     '<text id='.$genre.' class="badge badge-info">'.$genre.'</text>';
            ?>
            <script>
                $('#<?php echo $genre ?>').click(function() {
                    // $('#<?php echo $genre ?>').css({
                    //     'background-color': 'red',
                    //     'color': 'white',
                    //     'font-size': '44px'
                    // });
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
                    console.log(selectedGenre);
                });
            </script>
            <?php
            if($genre == $mGenre[6] || $genre == $mGenre[12])
            {
                echo '<br>';
            }

        }      
        echo    '</div>';
        echo    '</p>';
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
        

        echo    '</div></div></form></div></div>';

        require('DB.php');
                

    ?>



    


    </body>
</html>