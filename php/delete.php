<!DOCTYPE html>
<html>
<body>

<?php

include("dbconn.php");


$postTitle = $_GET['rn'];
$query = "DELETE FROM post WHERE postTitle = '$postTitle'";

$data = mysqli_query($db,$query);

if($data)
{
   echo "Godkänd";
}
else{
    echo "icke godkänd";
}
?>
<a href="search.php">Sök</a>
</body>
</html>