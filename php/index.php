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

$stmt = $mysqli->prepare("INSERT INTO post (postTitle, pText, postDate) VALUES (?, ?, ?)");

$stmt->bind_param("sss", $postTitle, $pText, $date);

$stmt->execute();

$stmt->close();


header('Location: posts.php');

?>