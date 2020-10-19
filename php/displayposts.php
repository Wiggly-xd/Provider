<?php
session_start();
include_once 'connect.php';
$stmt = 'SELECT * FROM spage INNER JOIN service ON service.serviceID = spage.serviceID INNER JOIN post ON post.pageID = spage.pageID';

$res = mysqli_query($mysqli, $stmt);

while($qryres = mysqli_fetch_array($res)){

    echo '<div style="border: 1px solid black;"><h1>' . $qryres["serviceTitle"] . '</h1><br>' . '<p>Wiki creation date: ' . $qryres["serviceDate"] . '</p>' . $qryres["serviceType"] . '<h2>' . $qryres["postTitle"] . '</h2><br>' . '<p>content: ' . $qryres["pText"] . '</p><br>' . '<p>Post date: ' . $qryres["postDate"] . '</p></div>','<br/>';
}
?>