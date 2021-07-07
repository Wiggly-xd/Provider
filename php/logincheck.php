<?php

//startar sessionen
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$admin = 0;
$moderator = 0;
$admin = $_POST['admin'];
$moderator = $_POST['moderator'];

//inkluderar anslutningen
include_once 'connect.php';

if(is_null($moderator)){
    $moderator = 0;
}

if(is_null($admin)){
    $admin = 0;
}

//förbereder uttryck
$stmt = $mysqli->prepare("SELECT * FROM user,privilege WHERE user.username = ? AND user.password = ? AND privilege.admin = ? AND privilege.moderator = ?");

//binder uttryck
$stmt->bind_param("ssii", $username, $password, $admin, $moderator);

//kör uttryck
$stmt->execute();

//kollar om inmatning är rätt
$exist = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

if ($exist) {
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $username;
$_SESSION['admin'] = $admin;
$_SESSION['moderator'] = $moderator;
header('Location: pagemaker.php');
exit();
}
else {
header('Location: login.html');
exit();
}
?>