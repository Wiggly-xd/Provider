<html>
<body>
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'wider';

    $conn = new mysqli($servername, $username, $password, $db) or die("Unable to connect");
?>
    <?php echo $_POST["eventTitle"]; ?><br>
    <?php echo $_POST["description"]; ?><br>
    <?php echo $_POST["startDate"]; ?><br>
    <?php echo $_POST["endDate"]; ?><br>

<?php
    $sql = "INSERT INTO event(eventTitle,description,startDate,endDate) VALUES('$_POST[eventTitle]', '$_POST[description]', '$_POST[startDate]', '$_POST[endDate]')";
    if (mysqli_query($conn, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Was not able to execute $sql. " . mysqli_error($conn);
    }
?>
</body>
</html>