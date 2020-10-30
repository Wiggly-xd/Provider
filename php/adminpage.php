<?php
include_once 'connect.php';
$stmt = 'SELECT * FROM user, privilege WHERE user.userID = privilege.userID';

$res = mysqli_query($mysqli, $stmt);

while($qryresult = mysqli_fetch_array($res)){
    $privilege = '';
    if($qryresult["moderator"] == 1 & $qryresult["admin"] == 0){
        $privilege = 'Moderator';
    }
    if($qryresult["admin"] == 1 & $qryresult["moderator"] == 0){
        $privilege = 'Admin';
    }
    if($qryresult["moderator"] == 1 & $qryresult["admin"] == 1){
        $privilege = 'Admin & Moderator';
    }
    if($qryresult["moderator"] == 0 & $qryresult["admin"] == 0){
        $privilege = 'User';
    }
    echo '<div style="border: 1px solid black;">';
    echo '<p> userID: ' . $qryresult["userID"] . '</p>';
    echo '<br>';
    echo '<p> username: ' . $qryresult["username"] . '</p>';
    echo '<br>';
    echo '<p> password: ' . $qryresult["password"] . '</p>';
    echo '<br>';
    echo '<p> first name: ' . $qryresult["firstName"] . '</p>';
    echo '<br>';
    echo '<p> middle name: ' . $qryresult["middleName"] . '</p>';
    echo '<br>';
    echo '<p> last name: ' . $qryresult["lastName"] . '</p>';
    echo '<br>';
    echo '<p> privilege: ' . $privilege . '</p>';
    echo '<br>';
    echo '</div>';
}

?>