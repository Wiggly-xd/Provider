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

$stmt3 = $mysqli->prepare("DELETE FROM image WHERE serviceID='$serviceID'");

$stmt3->execute();

$stmt3->close();

if($stmt){

    $sql = "INSERT INTO history(historyText) VALUES('$postTitle')";
    mysqli_query($db, $sql);

}

header('Location: posts.php');

?>
<a href="search.php">Sök</a>
</body>
</html>