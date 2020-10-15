<?php
session_start();
include_once 'connect.php';

$postTitle = $_POST['postTitle'];
$pText = $_POST['pText'];
$date = date("Y-m-d");
$serviceType = $_POST['serviceType'];

$stmt = $mysqli->prepare("INSERT INTO post (postTitle, pText, postDate) VALUES (?, ?, ?)");

$stmt->bind_param("sss", $postTitle, $pText, $date);

$stmt->execute();

$stmt->close();


header('Location: posts.php');

?>