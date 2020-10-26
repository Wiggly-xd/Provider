<?php 
 
include_once("dbconn.php");

 
 $sql2 = "SELECT postID from post";

 $result = mysqli_query($db,$sql2);
 
 echo '<label for="postID">Select postID</label>';
 echo ' <select name="postID">';

while($posts = mysqli_fetch_array($result))
{

    echo '<option value="'.$posts["postID"].'" name="'.$posts["postID"].'">'.$posts["postID"].'</option>';
}
    echo '</select>';
    ?>