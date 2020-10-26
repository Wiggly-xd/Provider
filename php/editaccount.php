<?php
include_once 'connect.php';

$userID = $_POST["userID"];
$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$admin = $_POST['admin'];
$moderator = $_POST['moderator'];


if(is_null($moderator)){
    $moderator = 0;
}

if(is_null($middleName)){
    $middleName = '';
}

if(is_null($admin)){
    $admin = 0;
}


if(isset($userID)){
    $sql = "UPDATE user, privilege SET user.username = '$username', user.password = '$password', user.firstName = '$firstName', user.middleName = '$middleName', user.lastname = '$lastName', privilege.admin = '$admin', privilege.moderator = '$moderator' WHERE user.userID = privilege.userID AND user.userID = '$userID'";
mysqli_query($mysqli, $sql);
}

header('location: admin.php');

?>