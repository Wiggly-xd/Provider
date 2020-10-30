<html>
<body>
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'provider';

    $conn = new mysqli($servername, $username, $password, $db) or die("Unable to connect");
?>
    <?php echo $_POST["eventTitle"]; ?><br>
    <?php echo $_POST["description"]; ?><br>
    <?php echo $_POST["startDate"]; ?><br>
    <?php echo $_POST["endDate"]; ?><br>

<?php
    $startdate = $_POST['startDate'];
    $enddate = $_POST['endDate'];

    if($enddate<$startdate){

        echo "Slutdatum kan inte vara mindre än startdatum" . mysqli_error($conn);
    } else{

        $sql = "INSERT INTO event(eventTitle,description,startDate,endDate,userID) VALUES('$_POST[eventTitle]', '$_POST[description]', '$_POST[startDate]', '$_POST[endDate]', '$_POST[id]')";
    header('location:../../calendar.php');
    if (mysqli_query($conn, $sql)){
    } else{
        echo "ERROR: Was not able to execute $sql. " . mysqli_error($conn);
    }
    }

?>
</body>
</html>