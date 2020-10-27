<?php
include_once 'connect.php';

$stmt = 'SELECT userID FROM user';

$res = mysqli_query($mysqli, $stmt);

echo '<br>';
echo '<label for="userID">Select user:</label>';
echo '<select name="userID">';
while($qryres = mysqli_fetch_array($res)){

    $length = count($qryres);
    

    for ($i=1; $i<$length; $i++){
    echo '<option value="' . $qryres["userID"] . 'name="userID">'. $qryres["userID"] . '</option>';
    }
}
echo '</select>';
echo '<br>';
?>