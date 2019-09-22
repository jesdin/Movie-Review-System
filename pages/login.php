<?php

require ('UserRepository.php');
session_start();
$user = User::getInstance();
$r = $user->userLogin($_POST['username'], $_POST['password']);
if($r == "Exists") {
    $_SESSION['user'] = $_POST['username'];
//    header('Location: /Movie-Review-System');
}
else if($r == "Username Error"){
    header('Location: /Movie-Review-System?user');
}
else {
    header('Location: /Movie-Review-System?pss');
}