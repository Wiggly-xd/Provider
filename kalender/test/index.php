<html>
<body>
<?php
    include('connection.php');
?>
<form action="test.php" method="post">
    Händelse: <input type="text" name ="eventTitle"><br>
    Beskrvining: <input type="text" name ="description"><br>
    Startdatum: <input type="date" name="startDate"><br>
    Slutdatum: <input type="date" name="endDate"><br>
    <input type= "submit">
</form>
</body>
</html>