<?php
session_start();
require_once('UserRepository.php');
$ur = User::getInstance();

// check if pss is right
// if( isset($_REQUEST['checkPss']) ) {
// }

if(isset($_POST['uid'])){
    if($ur->pssIsCorrect($_POST['uid'], $_POST['currentPass'])) {
        $ur->changePss($_POST['uid'], $_POST['newPass']);
    }
}

