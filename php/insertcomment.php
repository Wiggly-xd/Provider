<?php

include 'connect.php';
$pageID = $_GET["pageID"];
$_SESSION['pageID'] = $pageID;




$commenttext = $_POST['commenttext'];
$date = date("F j, Y, g:i a");

$stmt = $mysqli->prepare("INSERT INTO comment (cText, cDate, pageID) VALUES (?, ?, ?)");

$stmt->bind_param("sss", $commenttext, $date, $pageID);

$stmt->execute();

$stmt->close();
header('Location: posts.php');
?>