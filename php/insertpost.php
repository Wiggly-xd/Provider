<!DOCTYPE html>
<html>


<br>

<?php
include("dbconn.php");


$postTitle = $_POST["postTitle"];
$pText = $_POST["pText"];
$date = date("Y-m-d");

$button = '<form action="insertcomment.php" method="post"><input type="text" required name="fornamn"><textarea id="gang" required name="comments" rows="4" cols="50"></textarea><input type="submit" name="comment" value="comment"/></form>';
$button2 = '<input type="text" id="fname"><input type="text" id="comment"><button id="formsubmit">Skicka data</button><textarea id="response" style="width:200px; height:100px; resize:none;"></textarea>';


?>

<?php

if(isset($_POST['save_btn']))
{
    if($con = mysqli_connect('localhost', 'root', '', 'provider'))
    {
        $filetemp = $_FILES['img']['tmp_name'];
        $filename = $_FILES['img']['name'];
        $filetype = $_FILES['img']['type'];
        $filepath = "pics/".$filename;

        move_uploaded_file($filetemp,$filepath);
        $query = mysqli_query($con,"call imageInsert('$filename','$filepath','$filetype')");
      
    }
}
$stmt = $con->prepare("INSERT INTO post (postTitle, pText, postDate, imageURL) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $postTitle, $pText, $date, $filepath);

$stmt->execute();
$dbid = $db->insert_id;
$stmt->close();

$stmt2 = $db->prepare("INSERT INTO spage (pageID) VALUES (?)");

$stmt2->bind_param("i", $dbid);

$stmt2->execute();

$stmt2->close();
?>


<h2>
<?php echo $_POST["postTitle"] . ' ';
?>
</h2>
<a> <?php echo $_POST["pText"] . ' ';
?>
</a>

<?php echo $date;
?>
<?php echo ' ' . "<img src='$filepath'>";
?>

<?php
$radioVal = $_POST["comment"];

if($radioVal == "on")
{
    
    echo $button;
    
}
else if ($radioVal == "off")
{
    
}
?>






<a href="post.php">Gå tillbaka</a>
</form>
</body>
</html>