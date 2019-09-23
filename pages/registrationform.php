<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="..\css\registrationform.css">
    </head>
    <body background="..\images\background.jpg">
        <div class=div>
            <form class=form method="POST" action="register.php">
                <p class=p1>REGISTER</p>
                <input id="fName" name="fName" type="text" placeholder="Enter first name" required minlength="2" maxlength="15">
                <input id="lName" name="lName" type="text" placeholder="Enter last name" required minlength="2" maxlength="15">
                <input id="username" name="uName" type="text" placeholder="Enter username" required minlength="4" maxlength="15">
                <input id="emailId" name="email" type="email" placeholder="Enter email id" required>
                <input id="password" name="pss" type="password" placeholder="Enter password" required>
                <input id="cPassword" name="cpss" type="password" placeholder="Confirm password" required>
                <button id="done" type="submit">Register</button>
            </form>
        </div>
    </body>
</html>