<?php
include("dbconn.php");
session_start();

$postTitle = $_POST["postTitle"];
$pText = $_POST["pText"];
$date = date("Y-m-d");


if(isset($_POST['save_btn']))
{
    if($db = mysqli_connect('localhost', 'root', '', 'provider'))
    {
        $filetemp = $_FILES['img']['tmp_name'];
        $filename = $_FILES['img']['name'];
        $filetype = $_FILES['img']['type'];
        $filepath = "pics/".$filename;

        move_uploaded_file($filetemp,$filepath);
        $query = mysqli_query($db,"call imageInsert('$filename','$filepath','$filetype')");
      
    }
}
$stmt = $db->prepare("INSERT INTO post (postTitle, pText, postDate, imageURL) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $postTitle, $pText, $date, $filepath);

$stmt->execute();

$dbid = $db->insert_id;

$stmt->close();



$stmt2 = $db->prepare("INSERT INTO spage (pageID) VALUES (?)");

$stmt2->bind_param("i", $dbid);

$stmt2->execute();

$stmt2->close();


echo '<h2>' . $postTitle . '</h2>';


echo 'text: ' . $pText;
echo '<br>';
echo 'date: ' . $date;
echo '<br>';
echo '<img src=' . $filepath . '>';


$comment = $_POST["comment"];

if($comment == "on")
{
    echo "<div>
    <form method='post' action='insertdata.php'>
    <div>
    <label for='comment'>Comment: </label>
    <textarea name='commenttext'></textarea>
    </div>
    <button type='submit' value='Submit''>Submit</button>
    </form>
    </div>";
    
}
else
{
    
}

?>