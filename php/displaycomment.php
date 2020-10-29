<?php

include("dbconn.php");

$query = "SELECT * FROM comment";
$bonk = mysqli_query($db,$query);

echo '<table border="2" align="center" cellpadding="5" cellspacing="5">
    <tr>';