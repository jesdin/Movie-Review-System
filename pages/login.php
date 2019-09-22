<?php

require ('UserRepository.php');
session_start();
$user = User::getInstance();
echo($_POST['username']);
$r = $user->userLogin($_POST['username'], $_POST['password']);
echo($r);
if($r == true) {
    $_SESSION['user'] = $_POST['username'];
//    header('Location: /Movie-Review-System');
}
else if($r == "Username Error"){
    header('Location: /Movie-Review-System?user');
}
else {
    header('Location: /Movie-Review-System?pss');
}