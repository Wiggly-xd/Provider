<?php
session_start();

include_once 'connect.php';

$postTitle = $_POST['postTitle'];
$pText = $_POST['pText'];
$date = date("Y-m-d");
$serviceID = $_SESSION['serviceID'];
$pageID = $_SESSION['pageID'];
$filepath = $_SESSION['filepath'];
if(isset($_POST['save_btn']))
{
if($mysqli = mysqli_connect('localhost', 'root', '', 'provider'))
{
    $filetemp = $_FILES['img']['tmp_name'];
    $filename = $_FILES['img']['name'];
    $filetype = $_FILES['img']['type'];
    $filepath = "bilder/".$filename;

    move_uploaded_file($filetemp,$filepath);
    $query = mysqli_query($mysqli,"call imageInsert('$filename','$filepath','$filetype')");
}
}

$stmt = $mysqli->prepare("INSERT INTO post (postTitle, pText, postDate, serviceID, pageID, imageURL, username) VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssiiss", $postTitle, $pText, $date, $serviceID, $pageID, $filepath, $_SESSION['username']);

$stmt->execute();

$stmt->close();

header('Location: posts.php');

?>