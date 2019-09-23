<?php

require('UserRepository.php');
$user = User::getInstance();
echo($_POST['fName']);
echo($_POST['lName']);
echo($_POST['uName']);
echo($_POST['email']);
echo($_POST['pss']);
echo($_POST['cpss']);
$r = $user->createUser($_POST['fName'], $_POST['lName'], $_POST['uName'], $_POST['email'], $_POST['pss'], $_POST['cpss']);
echo($r);
if($r == 1) {
    echo("User Created");
}
else if($r == ''){
    echo("Error");
}