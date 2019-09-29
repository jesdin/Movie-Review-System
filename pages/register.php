<?php

require('UserRepository.php');
$user = User::getInstance();

if( isset($_REQUEST['uname']) ) {
    echo($user->userNameExists($_REQUEST['uname']));
    return;
}

$r = $user->createUser($_POST['fName'], $_POST['lName'], $_POST['uName'], $_POST['email'], $_POST['pss'], $_POST['cpss']);
echo($r);
header('Location: /Movie-Review-System');
if($r == 1) {
    echo("User Created");
    
}
else if($r == ''){
    echo("Error");
}