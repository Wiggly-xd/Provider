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

        
    $sql2 = "INSERT INTO history(historyText, historyDate) VALUES ('$postTitle', '$postDate')";
    mysqli_query($db, $sql2);
    echo "<form action='historik.php' method='post'>
    
        <div>Har uppdaterats</div>
    
    </form>";

}
    header('location: display.php');



?>

<a href="search.php">Sök</a>
</body>
</html>