<?php
session_start();

include_once 'connect.php';

$postTitle = $_POST['postTitle'];
$pText = $_POST['pText'];
$date = date("Y-m-d");
$serviceID = $_SESSION['serviceID'];
$pageID = $_SESSION['pageID'];

//$qry = 'SELECT pageID FROM spage INNER JOIN post ON spage.serviceID = post.serviceID';

$stmt = $mysqli->prepare("INSERT INTO post (postTitle, pText, postDate, serviceID, pageID) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param("sssii", $postTitle, $pText, $date, $serviceID, $pageID);

$stmt->execute();

$stmt->close();

header('Location: posts.php');

?>