<?php

// require('DB.php');
require('UserRepository.php');
$conn = DB::getInstance()->conn;
$uid = User::getInstance()->getId($_POST['uname']);
$r = $conn->query("SELECT count('ID') FROM Comments WHERE UID={$uid} AND MovieID={$_POST['MID']}")->fetch_assoc();
$id = $r["count('ID')"];
$r = $conn->query("INSERT INTO Comments(UID, MovieID, ID, Comment) VALUES({$uid}, {$_POST['MID']}, {$id}, '{$_POST['myComment']}')");

header('Location: /Movie-Review-System/pages/DisplayMovie.php?id='.$_POST['MID']);