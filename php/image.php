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

$stmt = $mysqli->prepare("INSERT INTO post (postTitle, pText, postDate, serviceID, pageID, imageURL) VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssiis", $postTitle, $pText, $date, $serviceID, $pageID, $filepath);

$stmt->execute();

$stmt->close();

if($stmt){
        
    $stmt3 = "INSERT INTO history(historyText, historyImage, historyDate) VALUES ('$postTitle', '$filepath', '$date')";
    $rlt = mysqli_query($con, $stmt3);

}

header('Location: posts.php');

?>