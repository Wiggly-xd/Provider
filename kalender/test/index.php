<html>
<body>
<?php
    session_start();
    include('connection.php');
?>
<form action="test.php" method="post">
    Händelse: <input type="text" name ="eventTitle"><br>
    Beskrvining: <input type="text" name ="description"><br>
    Startdatum: <input type="date" name="startDate"><br>
    Slutdatum: <input type="date" name="endDate"><br>
    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
    <input type= "submit">
</form>
</body>
</html>