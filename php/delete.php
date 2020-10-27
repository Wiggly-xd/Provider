<?php
session_start();
include_once 'connect.php';

$serviceID = $_SESSION['serviceID'];

$stmt = $mysqli->prepare("DELETE FROM service WHERE serviceID='$serviceID'");

$stmt->execute();

$stmt->close();

$stmt1 = $mysqli->prepare("DELETE FROM spage WHERE serviceID='$serviceID'");

$stmt1->execute();

$stmt1->close();

$stmt2 = $mysqli->prepare("DELETE FROM post WHERE serviceID='$serviceID'");

$stmt2->execute();

$stmt2->close();

if($stmt){
        
    $stmt3 = "INSERT INTO history(historyText, historyImage, historyDate) VALUES ('$postTitle', '$filepath', '$date')";
    mysqli_query($con, $stmt3);

}

header('Location: display.php');

?>