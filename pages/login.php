
<?php

require ('UserRepository.php');
session_start();
$user = User::getInstance();
$r = $user->userLogin($_POST['username'], $_POST['password']);
if($r == "Exists") {
//    header('Location: /Movie-Review-System');
}
else if($r == "Username Error"){
    header('Location: /Movie-Review-System?error=username');
}
else {
    header('Location: /Movie-Review-System?error=password');
}

?>
