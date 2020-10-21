<?php
session_start();

include_once 'connect.php';

echo '<label for="serviceID">Select service to delete:</label>';
echo '<select id="serviceID">';
while($qryres = mysqli_fetch_array($res)){

    $length = count($qryres);
    
    $serviceID = $qryres["serviceID"];

    for ($i=1; $i<$length; $i++){
    echo '<option value="' . $serviceID . 'name="' . "serviceID" . '">'. $serviceID . '</option>';
    $_SESSION['serviceID'] = $serviceID;
    echo '<option value="'$serviceID'" name="serviceID">'$serviceID'</option>';
    $query = 'DELETE * FROM service, spage, post WHERE service.serviceID = $serviceID';
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $type, $reporter);
    $stmt->execute();
    }
}
echo '</select>';


?>