<?php

require('UserRepository.php');
$user = User::getInstance();
$r = $user->createUser($_POST['fName'], $_POST['lName'], $_POST['uName'], $_POST['email'], $_POST['pss'], $_POST['cpss']);
echo($r);
if($r == 1) {
    echo("User Created");
}
else if($r == ''){
    echo("Error");
}