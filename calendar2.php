<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="kalender/test/index.php">

        <button>Lägg till event</button>

    </form>
    
    <?php

        include_once 'connect.php';

        $sql = "SELECT * FROM event";

        $result = mysqli_query($conn, $sql);


    $sqlget = "SELECT * FROM event";
    $sqldata = mysqli_query($conn, $sqlget) or die("error");

    echo "<table>";
    echo "<tr><th>Ta bort</th><th>Händelse</th><th>Beskrivning</th><th>Startdatum</th><th>Slutdatum</th></tr>";

    while($row = mysqli_fetch_assoc($sqldata)) {

        echo "<tr><td>";
        ?>
        <a href="kalender/test/delete.php?id=<?php echo $row['eventID'];?>">Delete</a>
        <?php
        echo "</td><td>";
        echo $row['eventTitle'];
        echo "</td><td>";
        echo $row['description'];
        echo "</td><td>";
        echo $row['startDate'];
        echo "</td><td>";
        echo $row['endDate'];
        echo "</td></tr>";

    }

echo "</table>";

    ?>

</body>
</html>