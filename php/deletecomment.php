<?php
include_once 'connect.php';
$cText = $_POST["cText"];

if(isset($_POST["delete_btn"])){
$stmt = $mysqli->prepare("DELETE FROM comment WHERE cText = '$cText'");

$stmt->execute();

$stmt->close();
}

if(isset($_POST["edit_btn"])){
$newcText = $_POST["newcText"];
$stmt2 = $mysqli->prepare("UPDATE comment SET cText = '$newcText' WHERE cText = '$cText'");

$stmt2->execute();

$stmt2->close();
}


header('Location: posts.php');
?>
