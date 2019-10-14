<!DOCTYPE html>

<?php
require('pages/UserRepository.php');
session_start();
if(isset($_SESSION["user"]) and $_SESSION['user'] != null)
{
    header('Location: /Movie-Review-System/pages/AllMovies.php');
}
else{

?>
    <html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" href="css\index.css">
        <script>
            window.onload = function() {
                var error = get('error')
                if(error){
                    if(error = 'Username is incorrect'){
                        // TODO: Error Message
                    }
                    else if(error = 'password') {
                        // TODO: Error Message
                    }
                }
            };
            function get(name){
                if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
                    return decodeURIComponent(name[1]);
                else
                    return false;
            }
        </script>
    </head>
    <body background="images\background.jpg">
    <div class=div>
        <form class=form method="POST" action="pages/login.php">
            <p class=p1>SIGN IN</p>
            <input id="username" name="username" type=text placeholder="Username" required>
            <br><br><br>
            <input id="password" name="password" type="password" placeholder="Password" required>
            <br><br><br>
            <button id="login" type="submit">SIGN IN</button>
        </form>
        <a class=a1 href="forgotpassword.html">Forgot password?</a><br>
        <hr class=hr1><p class=p2>or</p><hr class=hr2><br>
        <a class=a2 href="pages/registrationform.php">Create a new account</a>
    </div>
    </body>
    </html>
<?php } ?>