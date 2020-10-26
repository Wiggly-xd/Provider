<html>
<body>
<?php
    require_once 'calendar.php';

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'wider';

    $conn = new mysqli($servername, $username, $password, $db) or die("Unable to connect");

?>
<?php
    $id = $_POST['eventID'];

    if(isset($_POST['eventID'])){
        $id = $_POST['eventID'];

    $sql = "DELETE FROM event WHERE eventID = '$id'";
    if (mysqli_query($conn, $sql)){
        mysqli_close($conn);
    } else{
        echo "Error deleting record";
    }    
    }

    header('location:calendar.php');

    


?>
</body>
</html>