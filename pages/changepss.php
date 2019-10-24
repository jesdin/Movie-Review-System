<?php
session_start();
require_once('UserRepository.php');
$ur = User::getInstance();

// check if pss is right
if( isset($_REQUEST['checkPss']) ) {
}
