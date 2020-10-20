<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    
        include_once 'connect.php';

        $sql = "SELECT * FROM event";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

    


    ?>

    <div>
        <form action="redigerad.php" method="post"> 
            <input type="text" name="title" placeholder="Skriv ny titel">
            <input type="text" name="description" placeholder="Skriv ny beskrivning">
            </br>
            <button type="submit" name="save">Uppdatera</button>
        </form>
    </div>

</body>
</html>