<?php
session_start();
include_once 'connect.php';


$get = 'SELECT * FROM post';

$res = mysqli_query($mysqli, $get);

//while($)

/*
while($qryres = mysqli_fetch_array($res)){

    echo $qryres["postTitle"] . " " . $qryres["pText"] . " " . $qryres["postDate"],'<br/>';
}*/
?>