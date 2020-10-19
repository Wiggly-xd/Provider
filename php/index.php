<?php
session_start();

include_once 'connect.php';

$postTitle = $_POST['postTitle'];
$pText = $_POST['pText'];
$date = date("Y-m-d");
$serviceType = $_POST['serviceType'];



$stmt = $mysqli->prepare("SELECT serviceType FROM spage INNER JOIN post ON spage.pageID = post.pageID");

$stmt->execute();

$stmt->close();

$stmt2 = $mysqli->prepare("INSERT INTO post (postTitle, pText, postDate, postType) VALUES (?, ?, ?, ?)");

$stmt2->bind_param("sssi", $postTitle, $pText, $date, $serviceType);

$stmt2->execute();

$stmt2->close();
/*
while($stmt = true){
    echo "wiki bro";
    break;
}*/
header('Location: posts.php');

?>