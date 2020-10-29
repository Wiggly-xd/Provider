<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    if($stmt){
        
        $stmt3 = "INSERT INTO history(historyText, historyImage, historyDate) VALUES ('$postTitle', '$filepath', '$date')";
        $rlt = mysqli_query($con, $stmt3);

    }
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

<?php 

    $sql = "SELECT * FROM comment";

    $result = mysqli_query($con, $sql);


    while($res = mysqli_fetch_array($result)){
        echo "<div>
            <div name='comment'>".$res['cText']."</div>
            <div name='namn'>".$res['cName']."</div>
            <div name='tabort'><a href='deletecomment.php?rn=$res[commentID]'>Ta bort</a></div>
        </div>
        ";
    }

?>




<a href="post.php">Gå tillbaka</a>
</form>
</body>
</html>