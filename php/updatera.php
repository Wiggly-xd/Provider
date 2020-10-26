<!DOCTYPE html>
<html>
<body>

<?php

include("dbconn.php");


$postID = $_POST['postID'];
$postTitle = $_POST['postTitle'];
$postDate = date("Y-m-d");
$pText = $_POST['pText'];




if(isset($postID)){
   

    $sql = "UPDATE post SET postTitle='$postTitle', postDate = '$postDate', pText ='$pText' WHERE postID= $postID";
    mysqli_query($db,$sql);
}
    header('location: display.php');



?>

<a href="search.php">Sök</a>
</body>
</html>