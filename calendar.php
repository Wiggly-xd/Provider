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

        while($ev = mysqli_fetch_array($result)){
            echo $ev["eventTitle"] . " " . $ev["description"] . " " . $ev["startDate"] . " " . $ev["endDate"],'<br/>';
        }



    ?>

</body>
</html>