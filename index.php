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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="pages\imageSlideshow.js">
        <script src="pages\loginpage.js">
            window.onload = function() {
                var error = get('error')
                if(error){
                
                    if(error = 'Username is incorrect'){

                        // <div class="container">
                        //     <h2>Modal Example</h2>
                        //     <!-- Trigger the modal with a button -->
                        //     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

                        //     <!-- Modal -->
                        //     <div class="modal fade" id="myModal" role="dialog">
                        //         <div class="modal-dialog">
                                
                        //         <!-- Modal content-->
                        //         <div class="modal-content">
                        //             <div class="modal-header">
                        //             <button type="button" class="close" data-dismiss="modal">&times;</button>
                        //             <h4 class="modal-title">Error</h4>
                        //             </div>
                        //             <div class="modal-body">
                        //             <p>Incorrect Username</p>
                        //             </div>
                        //             <div class="modal-footer">
                        //             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        //             </div>
                        //         </div>
                                
                        //         </div>
                        //     </div>
                            
                        //     </div>
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
    <body background="images\aEndgame.jpg">
    <div class=div>
        <form class=form method="POST" action="pages/login.php">
            <p class=p1>SIGN IN</p>
            <input id="username" name="username" type=text placeholder="Username" required autocomplete=off>
            <br><br><br>
            <input id="password" name="password" type="password" placeholder="Password" required autocomplete=off>
            <br><br><br>
            <button id="login" type="submit">SIGN IN</button>
        </form>
        <br>
        <a class=a1 href="forgotpassword.html">Forgot password?</a>
        <hr class=hr1 style="margin-top: 10%;"><p class=p2 style="margin-top: -7%;">or</p><hr class=hr2>
        <a class=a2 href="pages/registrationform.php" style="margin-left: 25%;">Create a new account</a>
    </div>
    </body>
    </html>
<?php } ?>