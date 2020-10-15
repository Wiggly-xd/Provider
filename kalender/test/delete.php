<html>
<body>
<?php
    require_once 'test.php';

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'wider';

    $conn = new mysqli($servername, $username, $password, $db) or die("Unable to connect");

?>
<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM event WHERE eventID = '$id'";

    if (mysqli_query($conn, $sql)){
        mysqli_close($conn);
        header('Location:calendar.php');
        exit;
    } else{
        echo "Error deleting record";
    }


?>
</body>
</html>