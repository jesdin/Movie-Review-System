<?php

require('UserRepository.php');
$user = User::getInstance();

// Check if username exists
if( isset($_REQUEST['uname']) ) {
    echo($user->userNameExists($_REQUEST['uname']));
    return;
}

// Check email is registered
if( isset($_REQUEST['emailId']) ) {
    echo($user->emailIsRegistered($_REQUEST['emailId']));
    return;
}

// Registration Form Validation
$error = "";
$fname = $_POST['fName'];
$lname = $_POST['lName'];
$uname = $_POST['uName'];
$email = $_POST['email'];
$pss = $_POST['pss'];
if(strlen($fname) == 0 || strlen($fname) > 15){
    if(strlen($fname) == 0) {
        $error = "First Name required";
    }
    else{
        $error = "First Name max length is 15";
    }
}
if(strlen($lname) == 0 || strlen(lfname) > 15){
    if(strlen(lfname) == 0) {
        $error = "Last Name required";
    }
    else{
        $error = "Last Name max length is 15";
    }
}
if(strlen($uname) == 0 || strlen($uname) > 15){
    if(strlen($uname) == 0) {
        $error = "UserName required";
    }
    else{
        $error = "UserName max length is 15";
    }
}
if(strlen($pss) <4) {
    $error = "Password must contain at least 4 characters";
}
else if($pss != $_POST['cpss']) {
    $error = "Password does not match";
}
if($error != "") {
    header('Location: /Movie-Review-System/pages/registrationform.php?error=' . $error);
}

$r = $user->createUser($fname, $lname, $uname, $email, $_POST['pss']);
echo($r);
header('Location: /Movie-Review-System');