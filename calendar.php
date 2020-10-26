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

        $title = '';
        $description = '';
        $startDate = '';
        $endDate = '';


        while($ev = mysqli_fetch_array($result)){
            echo "<div>
                    <div>".$ev['eventTitle']."</div>
                    <div>".$ev['description']."</div>
                    <div>".$ev['startDate']."</div>
                    <div>".$ev['endDate']."</div>
                </div>
                ";
        }
    ?>
    <?php
        session_start();
        include_once 'connect.php';

        

        $sql = "SELECT * FROM event ";
        $result = mysqli_query($conn, $sql);

        echo '<form action="redigerad.php" method="post">';
        echo '<label for="eventTitle">Välj event:</label>';
        echo '<select id="eventID" name="eventID">';
        while($rev = mysqli_fetch_array($result)){

    

            
        echo '<option value="' . $rev["eventID"] . '" >'. $rev["eventTitle"] .'</option>';
        
        }
        echo '</select>';
    ?>
        <input type="text" name="eventTitle" value="<?php echo $title; ?>"placeholder="Skriv ny titel">
        <input type="text" name="description" value="<?php echo $description; ?>" placeholder="Skriv ny beskrivning">
        <input type="date" name="startDate" value="<?php echo $startDate; ?>"placeholder="Skriv ny titel">
        <input type="date" name="endDate" value="<?php echo $endDate; ?>" placeholder="Skriv ny beskrivning">
        <button type="submit" name="save">Uppdatera</button>
    </form>
    
    <?php
    $sql = "SELECT * FROM event ";
        $result = mysqli_query($conn, $sql);

        echo '<form action="delete.php" method="post">';
        echo '<label for="eventTitle">Välj event:</label>';
        echo '<select id="eventID" name="eventID">';
        while($rev = mysqli_fetch_array($result)){

    

            
        echo '<option value="' . $rev["eventID"] . '" >'. $rev["eventTitle"] .'</option>';
        
        }
        echo '</select>';

    ?>
    <button type="submit" name="delete">Ta bort</button>
    </form>
</body>
</html>