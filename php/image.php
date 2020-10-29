<?php
session_start();

include_once 'connect.php';

$postTitle = $_POST['postTitle'];
$pText = $_POST['pText'];
$date = date("Y-m-d");
$serviceID = $_POST['serviceID'];
$pageID = $_GET["pageID"];
$_SESSION['pageID'] = $pageID;
if(isset($_POST['save_btn']))
{

    $filetemp = $_FILES['img']['tmp_name'];
    $filename = $_FILES['img']['name'];
    $filetype = $_FILES['img']['type'];
    $filepath = "bilder/".$filename;

    


    $query = $mysqli->prepare("INSERT INTO image (name, path, type, serviceID) VALUES (?, ?, ?, ?)");
    
    $query->bind_param("sssi", $filename, $filepath, $filetype, $serviceID);

    $query->execute();

    $query->close();
}

$stmt2 = $mysqli->prepare("INSERT INTO post (postTitle, pText, postDate, serviceID, pageID, imageURL, username) VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt2->bind_param("sssiiss", $postTitle, $pText, $date, $serviceID, $pageID, $filepath, $_SESSION['username']);

$stmt2->execute();

$stmt2->close();

$comment = $_POST['comment'];

if($comment == "on"){
    echo '<form method="post" action="insertcomment.php?pageID='.$pageID.'">';
    echo '<label for="comment">Comment: </label>';
    echo '<textarea name="commenttext"></textarea>';
    echo '<button type="submit" value="submit">Submit</button>';
    echo '</form>';
    
}else{
    
}
?>