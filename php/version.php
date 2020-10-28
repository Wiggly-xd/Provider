<?php

$stmt2 = $mysqli->prepare("INSERT INTO history (historyDate, historyText, serviceID, historyImage) VALUES (?, ?, ?, ?)");

$stmt2->bind_param("ssis", $date, $pText, $serviceID, $filepath);

$stmt2->execute();

$stmt2->close();

?>