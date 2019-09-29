<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="..\css\registrationform.css">
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
        <script>
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
    <body background="..\images\background.jpg">
        <div class=div>
            <form class=form method="POST" action="register.php" onsubmit="return validateForm()">
                <p class=p1>REGISTER</p>
                <input id="fName" name="fName" type="text" placeholder="Enter first name" minlength="2" maxlength="15" required>
                <input id="lName" name="lName" type="text" placeholder="Enter last name" minlength="2" maxlength="15" required>
                <input id="username" name="uName" onblur="checkUname()" type="text" placeholder="Enter username" minlength="4" maxlength="15" required>
                <input id="emailId" name="email" type="email" placeholder="Enter email id" required>
                <input id="password" name="pss" type="password" placeholder="Enter password" required>
                <input id="cPassword" name="cpss" type="password" placeholder="Confirm password" required>
                <button id="done" type="submit">Register</button>
            </form>
        </div>
    </body>
</html>