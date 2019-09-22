<!DOCTYPE html>

<?php
require('pages/UserRepository.php');
session_start();
if(isset($_SESSION["user"]) and $_SESSION['user'] != null)
{
    echo("User is Logged in");
//    header('Location: /Movie-Review-System');
}
else{ ?>
    <html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" href="css\index.css">
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
        <a class=a2 href="registrationform.html">Create a new account</a>
    </div>
    </body>
    </html>
<?php } ?>