<?php
session_start();
include_once 'connect.php';

$stmt = 'SELECT serviceID FROM service';

$res = mysqli_query($mysqli, $stmt);


echo '<label for="serviceID">Select service to post in:</label>';
echo '<select id="serviceID">';
while($qryres = mysqli_fetch_array($res)){

    $length = count($qryres);
    

    for ($i=1; $i<$length; $i++){
    echo '<option value="' . $qryres["serviceID"] . 'name="' . $qryres["serviceID"] . '">'. $qryres["serviceID"] . '</option>';
    }
}
echo '</select>';
?>