<!doctype>
<html>
    <head>
    <title>MOVIES</title>  
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>

    /* .nav-link{
        font-size: 20px;
    } */

    #allMovies,
    #addMovie,
    #navbarDropdown{
        background: transparent;
        border: none;
        color: tomato;
        font-size: 20px;
        padding: 9px;
    }

    #allMovies:hover,
    #addMovie:hover,
    #navbarDropdown:hover{
        background: tomato;
        color: antiquewhite;
    }

    #searchBar{
        margin-left: 700px;
        height: 30px;
        width: 250px;
        font-size: 15px;
        background: transparent;
        /* border: none;
        border: solid tomato 1.5px; */
        outline: none;
        color: antiquewhite;
    }

    searchBar:focus{
        border: none;
        border-bottom: solid tomato 2px;
        outline: tomato;
    }

    #searchButton{
        height: 30px;
        width: 80px;
        font-size: 12px;
        border: solid tomato 2px;
        color: tomato;
    }

    #searchButton:hover{
        background: tomato;
        color: antiquewhite;
    }

    #user{
        font-size: 20px;
        margin-top: 17%;
        margin-left: 25px;
        color: tomato;
        width: 50px;
        border: none;
        outline: none;
        /* border: solid tomato 1px; */
    }

    #logout{
        font-size: 20px;
        margin-top: 35%;
        margin-left: -15px;
        color: tomato;
        width: 50px;
        border: none;
        outline: none;
    }

    #user:hover,
    #logout:hover{
        background: transparent;
        color: antiquewhite;
        border: none;
        outline: none;
        /* border-radius: 50px; */
    }

    #user:focus,
    #logout:focus{
        background: transparent;
        color: antiquewhite;
        border: none;
        outline: none;
        /* border-radius: 50px; */
    }

    </style>


    </head>

    <body background="../images/background.jpg">
    <!-- <nav class=bg-custom> -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:rgba(0, 0, 0, 0.3)"> -->
    <br>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">  
        <div class="navbar-nav">
        <button class="nav-item nav-link" href="http://localhost/Movie-Review-System/pages/AllMovies.php?#" id="allMovies">All Movies</button>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Genre
        </a>
        <button class="nav-item nav-link" href="http://localhost/Movie-Review-System/pages/AddMovie.php" id="addMovie">Add Movie</button>

        <form class="form-inline my-2 my-lg-0">
            <input id="searchBar" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchButton">Search</button>
            </form>

        <p>
        <button type="button" class="btn btn-default btn-sm" id="user">
        <span class="glyphicon glyphicon-user"></span> 
        </button>
         </p>

         <p>
        <button type="button" class="btn btn-default btn-sm" id="logout">
          <span class="glyphicon glyphicon-log-out"></span>
        </button>
        </p>

        </div>
        </div>
        </nav>
         <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Genre
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
        </div>

        <a class="navbar-brand" href="#">Add Movie</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <p>
        <button type="button" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-user"></span> User 
        </button>
         </p>

         <p>
        <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
        </p>
        </nav> -->

        

    </body>
</html>