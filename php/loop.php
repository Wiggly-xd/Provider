<?php
session_start();
include_once 'connect.php';

$stmt = 'SELECT serviceID FROM service';

$res = mysqli_query($mysqli, $stmt);


echo '<label for="serviceID">Select service:</label>';
echo '<select id="serviceID">';
while($qryres = mysqli_fetch_array($res)){

    $length = count($qryres);
    
    $serviceID = $qryres["serviceID"];

    for ($i=1; $i<$length; $i++){
    echo '<option value="' . $serviceID . 'name="' . "serviceID" . '">'. $serviceID . '</option>';
    $_SESSION['serviceID'] = $serviceID;
    //<option value=$serviceID name="serviceID">$serviceID</option>
    }
}
echo '</select>';
?>