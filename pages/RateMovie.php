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

            .movieInfo{
                /* border: solid tomato 3px; */
                height: 650px;
                width: 700px;
                margin-top: -0.5%;
                margin-left: 26%;
                background: rgba(0, 0, 0, 0.3);
            }

            #movieTitle{
                color: tomato;
                font-size: 30px;
                /* margin-top: 5%; */
                margin-left: 32%;
                letter-spacing: 1px;
            }

            #movieImg{
                height: 350px;
                width: 305px;
                margin-top: 0.5%;
                margin-left: 26.5%;
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
            }

            .rating{
                border: solid tomato 3px;
                margin-top: 2%;
                height: 300px;
                width: 700px;
                margin-left: 26%;

            }

            /* .fa-star{
                font-size: 20px;
                color: antiquewhite;
                margin-top: 1%;
                margin-left: 2%;
            }

            .fa-star:hover{
                color: tomato;
            } */

            .rating {
                    float:left;
                    width:300px;
                }
                .rating span { float:right; position:relative; }
                .rating span input {
                    position:absolute;
                    top:0px;
                    left:0px;
                    opacity:0;
                }
                .rating span label {
                    display:inline-block;
                    width:30px;
                    height:30px;
                    text-align:center;
                    color:#FFF;
                    background:#ccc;
                    font-size:30px;
                    margin-right:2px;
                    line-height:30px;
                    border-radius:50%;
                    -webkit-border-radius:50%;
                }
                .rating span:hover ~ span label,
                .rating span:hover label,
                .rating span.checked label,
                .rating span.checked ~ span label {
                    background:#F90;
                    color:#FFF;
                }

        </style>
    </head>

    <body background="../images/background.jpg">

    <?php
        require('MoviesRepository.php');
        // include('_navbar.php');
        include('navigationBar.php');
        
        echo    '<div class=movieInfo>';
        echo    '<p id=movieTitle>Movie Title Here</p>';
        echo    '<img src=../images/aEndgame.jpg id=movieImg>';
        echo    '<textarea style="font-size: 15px;" id="description" name="description" cols="40" rows="5" placeholder="Movie Description here" disabled></textarea>';
        echo    '</div>';

        echo    '<div class=rating>';
        echo    '<span><input class="fa fa-star type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                <span><input class="fa fa-star type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                <span><input class="fa fa-star type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                <span><input class="fa fa-star type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                <span><input class="fa fa-star type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                </div>';

        echo    '<script>$(document).ready(function(){
            // Check Radio-box
            $(".rating input:radio").attr("checked", false);
        
            $(".rating input").click(function () {
                $(".rating span").removeClass("checked");
                $(this).parent().addClass("checked");
            });
        
            $("input:radio").change(
              function(){
                var userRating = this.value;
                alert(userRating);
            }); 
        })</script>';

        echo    '</div>';

    ?>


    </body>


</html>