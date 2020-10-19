<?php
session_start();

include_once 'connect.php';

$serviceTitle = $_POST['serviceTitle'];
$sDate = date("Y-m-d");
$serviceType = $_POST['serviceType'];



$stmt = $mysqli->prepare("INSERT INTO spage (serviceType) VALUES (?)");

$stmt->bind_param("i", $serviceType);

$stmt->execute();

$stmt->close();

$stmt2 = $mysqli->prepare("INSERT INTO service (serviceTitle, serviceDate) VALUES (?, ?)");

$stmt2->bind_param("ss", $serviceTitle, $sDate);

$stmt2->execute();

$stmt2->close();
/*
while($stmt = true){
    echo "wiki bro";
    break;
}*/
header('Location: test.html');

?>