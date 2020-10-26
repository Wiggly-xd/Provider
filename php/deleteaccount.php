<?php
include_once 'connect.php';

$userID = $_POST["userID"];

$stmt = $mysqli->prepare("DELETE FROM user WHERE userID='$userID'");

$stmt->execute();

$stmt->close();

$stmt2 = $mysqli->prepare("DELETE FROM privilege WHERE userID='$userID'");

$stmt2->execute();

$stmt2->close();

header('Location: admin.php');

?>