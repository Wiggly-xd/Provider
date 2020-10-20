<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="laggtill.php">

        <button>Lägg till event</button>

    </form>
    
    <?php

        include_once 'connect.php';

        $sql = "SELECT * FROM event";

        $result = mysqli_query($conn, $sql);

        $title = '';
        $description = '';
        $dettaärenvariablesominnehållereventID = "";


        while($ev = mysqli_fetch_array($result)){
            echo "<div>
                    <div>".$ev['eventTitle']."</div>
                    <div>".$ev['description']."</div>
                    <div>".$ev['startDate']."</div>
                    <div>".$ev['endDate']."</div>
                </div>
                ";
                $dettaärenvariablesominnehållereventID = $ev['eventID'];
        }
    ?>
    <?php
        session_start();
        include_once 'connect.php';

        $sql = 'SELECT eventID FROM event';

        $result = mysqli_query($conn, $sql);


        echo '<label for="eventID">Välj event:</label>';
        echo '<select id="eventID">';
        while($rev = mysqli_fetch_array($result)){

            $length = count($rev);
    

            for ($i=1; $i<$length; $i++){
                echo '<option value="' . $rev["eventID"] . 'name="' . $rev["eventID"] . '">'. $rev["eventID"] . '</option>';
            }
        }
        echo '</select>';
    ?>
   <form action="redigerad.php" method="post">
        <input type="text" name="eventTitle" value="<?php echo $title; ?>"placeholder="Skriv ny titel">
        <input type="text" name="description" value="<?php echo $description; ?>" placeholder="Skriv ny beskrivning">
        <input type="hidden" name="eventID" value="<?php echo $dettaärenvariablesominnehållereventID; ?>">
        <button type="submit" name="save">Uppdatera</button>
    </form>

</body>
</html>