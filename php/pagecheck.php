<?php

include_once 'connect.php';

$serviceTitle = $_POST['serviceTitle'];
$sDate = date("Y-m-d");
$serviceType = $_POST['serviceType'];
$serviceType2 = $_POST['serviceType2'];
$serviceID = $_POST['serviceID'];

$stmt1 = $mysqli->prepare("INSERT INTO spage (serviceType, serviceID) VALUES (?, ?)");

$stmt1->bind_param("ii", $serviceType, $serviceID);

$stmt1->execute();

$pageID = mysqli_insert_id($mysqli);

$stmt1->close();

$stmt2 = $mysqli->prepare("INSERT INTO service (serviceTitle, serviceDate, serviceID) VALUES (?, ?, ?)");

$stmt2->bind_param("ssi", $serviceTitle, $sDate, $serviceID);

$stmt2->execute();

$stmt2->close();

if($_POST['serviceType'] == 1){
    header('Location: postmaker.php?pageID='.$pageID);
}
elseif($_POST['serviceType'] == 0){
    header('location: post.php?pageID='.$pageID);
}

?>