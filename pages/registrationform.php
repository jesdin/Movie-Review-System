<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="..\css\registrationform.css">
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
        <script>
            window.onload = function() {
                var error = get('error')
                if(error){
                    // TODO: Display error message. For the diff errors check the validation errors in register.php
                }
            };
            function get(name){
                if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
                    return decodeURIComponent(name[1]);
                else
                    return false;
            }
            function checkUname(uname = document.getElementById("username").value) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.responseText == 1){
                        console.log("uname exists");
                        document.getElementById("username").focus();
                        // TODO: Display Error Message
                    }
                };
                xhttp.open("GET", "register.php?uname=" + uname, true);
                xhttp.send();
            }
            function checkEmail(email = document.getElementById("emailId").value){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.responseText == 1){
                        console.log("email is registered");
                        document.getElementById("username").focus();
                        // TODO: Display Error Message
                    }   
                };
                xhttp.open("GET", "register.php?emailId=" + email, true);
                xhttp.send();
            }
            function validateForm() {
                if(document.getElementById('password').value != document.getElementById('cPassword').value) {
                    console.log("Password does not match");
                    // TODO: Display Error Message
                    return false;
                }
                else {
                    return true;
                }
            }
        </script>
        
    </head>
    <body background="../images/aEndgame.jpg">
        <div class=div>
            <form class=form method="POST" action="register.php">
                <p class=p1>REGISTER</p>
                <input id="fName" name="fName" type="text" placeholder="Enter first name" maxlength="15" required autocomplete=off>
                <input id="lName" name="lName" type="text" placeholder="Enter last name" maxlength="15" required autocomplete=off>
                <input id="username" name="uName" onblur="checkUname()" type="text" placeholder="Enter username" maxlength="15" required autocomplete=off>
                <input id="emailId" name="email" onblur="checkEmail()" type="email" placeholder="Enter email id" required autocomplete=off>
                <input id="password" name="pss" type="password" placeholder="Enter password" minlength="4" required autocomplete=off>
                <input id="cPassword" name="cpss" type="password" placeholder="Confirm password" required autocomplete=off>
                <button id="done" type="submit">Register</button>
            </form>
        </div>
    </body>
</html>