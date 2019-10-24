
<?php session_start(); ?>
<!doctype html>

<html>

    <head>
        <title>MOVIES</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <style>
            #navbarDropdown{
                margin-top: 0.35%;
            }

            .div1{
                height: 600px;
                width:  500px;
                border: solid tomato 2px;
                margin-left: 33%;
                border-radius: 0px 40px 0px 40px;
                background: rgba(0, 0, 0, 0.2);
            }

            .a1{
                color: tomato;
                font-size: 17px;
                letter-spacing: 1.5px;
                margin-top: 12%;
                margin-left: 10%;

            }

            .p1{
                color: tomato;
                font-size: 17px;
                letter-spacing: 1.5px;
                margin-top: 5%;
                margin-left: 10%;
            }

            .p2{
                color: tomato;
                font-size: 15px;
                letter-spacing: 1.5px;
                margin-left: 7.5%;

            }
            .input1{
                background: transparent;
                color: antiquewhite;
                font-size: 15px;
                border: none;
                border-bottom: solid tomato 1.5px;
                width: 400px;
                margin-left: 7.5%;
            }

            .input1:focus{
                outline: none;
                border-bottom: solid chartreuse 1.5px;
            }

            .input{
                background: transparent;
                color: antiquewhite;
                font-size: 15px;
                border: none;
                border-bottom: solid tomato 2px;
                margin-left: 10%;
                width: 400px;
            }

            .input:hover{
                border-bottom: solid chartreuse 2px; 
            }

            #changePass{
                border: solid tomato 1.5px;
                background: tomato;
                color: antiquewhite;
                outline: none;
                border-radius: 30px;
                font-size: 15px;
                width: 200px;
                height: 40px;
                margin-top: 7%;
                margin-left: 29%;
                letter-spacing: 1.5px;
            }

            #changePass:hover{
                opacity: 0.9;
            }

            .modal-header{
                background: black;
                opacity: 0.9;
                border: none; 
                border-bottom: solid tomato 3px;
                color: tomato;
                letter-spacing: 1px;
                font-size: 15px;
            }

            .modal-body{
                background: black;
                opacity: 0.9;
                border: none; 
                /* border-bottom: solid tomato 3px;
                border-top: solid tomato 3px; */
                color: tomato;
                letter-spacing: 1px;
                font-size: 15px;
                outline: none;
            }

            .modal-footer{
                background: black;
                opacity: 0.9;
                color: tomato;
                letter-spacing: 1px;
                font-size: 15px;
            }
            
            .modal-title{
                font-size: 15px;
                align: center;
            }

            #confirm{
                background: tomato;
                color: antiquewhite;
                font-size: 15px;
                letter-spacing: 1.5px;
                border: none;
            }

            #close{
                font-size: 15px;
            }
            
        </style >
        </head>

        <body background="../images/background.jpg">

            <?php
                require('UserRepository.php');
                include('navigationBar.php');

            ?>
            <?php
                require_once('UserRepository.php');
                $user = new User();
                $user = $user->getDetails($_SESSION['user']);
            ?>
            <div class="div1">
            <p class=a1>Username</p>
            <input  id="username" name="username" class=input type=text  autocomplete=off disabled value="<?php echo($user['uname']) ?>">
            <br><br>
            <p class=p1>First Name</p>
            <input  id="firstName" name="firstName" class=input type=text autocomplete=off disabled value="<?php echo($user['fname']) ?>">
            <br><br>
            <p class=p1>Last Name</p>
            <input  id="lastName" name="lastName" class=input type=text autocomplete=off disabled value="<?php echo($user['lname']) ?>">
            <br><br>
            <p class=p1>Email id</p>
            <input  id="emailId" name="emailId" class=input type=text autocomplete=off disabled value="<?php echo($user['email']) ?>">
            <br><br>
            <button id="changePass" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Change Password</button>
            <form type="POST" action="changepss.php">
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <br>
                        <p class=p2>Current Password:</p>
                        <input  id="currentPass" name="currentPass" class=input1 type=text autocomplete=off ><br><br> 

                        <p class=p2>New Password:</p>
                        <input  id="newPass" name="newPass" class=input1 type=text autocomplete=off ><br><br>

                        <p class=p2>New Password Again:</p>
                        <input  id="confirmNewPass" name="confirmNewPass" class=input1 type=text autocomplete=off ><br><br><br>                                  
                    </div>
                    <div class="modal-footer">
                        <button id=close type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id=confirm class="btn btn-primary">Confirm</button>
                    </div>
                    </div>
                </div>
                </div>
            </form>
            </div>

        </body>

    </html>