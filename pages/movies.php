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
    //     $sql = "SELECT title, descriptionn, genre, img from addmovie";
    //     // $result = $conn-> query($sql);
    //     $result = mysqli_query($conn,$sql);
    //     if($result-> num_rows>0) 
    //     {
    //         while($row = $result -> fetch_assoc())
    //         {
    //             echo   '<div onclick="location.href="www.google.com";" class=divMovies>';
    //             echo    '<img src='.$row["img"].' height="200" width="200" class="movieImg">';
    //             echo    '<p class="p1">'.$row["title"].'</p>';
    //             echo    '<p class="p2">'.$row["descriptionn"].'</p>';
    //             echo    ' <p class="p2">Genre :'.$row["genre"].'</p>';
    //             echo    '</div>';
    //             // echo "<br><br><label><b>".$row["title"]."</b><br><br><i>".$row["descriptionn"]."</i><br><br>".$row["genre"]."<br><br><hr></label>";
    //         }
    //     }

    // ?>

    </body>
</html>
