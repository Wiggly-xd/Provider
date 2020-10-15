<?php
session_start();
include_once 'connect.php';


$get = 'SELECT * FROM post';

$res = mysqli_query($mysqli, $get);

$jointest = 'SELECT post.postTitle
FROM post
INNER JOIN page ON post.pageID=page.pageID';

echo $jointest;

while($qryres = mysqli_fetch_array($res)){

    echo $qryres["postTitle"] . " " . $qryres["pText"] . " " . $qryres["postDate"],'<br/>';
}
?>