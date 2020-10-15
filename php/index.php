<?php
session_start();

include_once 'connect.php';

$postTitle = $_POST['postTitle'];
$pText = $_POST['pText'];
$date = date("Y-m-d");
$serviceType = $_POST['serviceType'];

$query = 'SELECT 
    *
FROM 
    post
INNER JOIN spage
ON post.postID = spage.pageID';

$stmt = $mysqli->prepare("SELECT serviceType FROM spage INNER JOIN post ON spage.pageID = post.postID");

//$stmt = $mysqli->prepare("INSERT INTO post (postTitle, pText, postDate) VALUES (?, ?, ?)");

//$stmt->bind_param("i", $serviceType);

$stmt->execute();

$stmt->close();

while($stmt = true){
    echo "wiki bro";
    break;
}
//header('Location: posts.php');

?>