<html>
<body>
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'provider';

    $conn = new mysqli($servername, $username, $password, $db) or die("Unable to connect");
    $userID = $_POST['userID'];
    $eventID = $_POST['eventID'];

    $sql = "UPDATE event SET inviteID='$userID' WHERE eventID=$eventID";
    header('location:calendar.php');
    if (mysqli_query($conn, $sql)){
    } else{
        echo "ERROR: Was not able to execute $sql. " . mysqli_error($conn);
    }

?>
</body>
</html>