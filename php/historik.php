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

    $sql = "SELECT * FROM history";
    $result = mysqli_query($mysqli, $sql);

    

    
    while($row = mysqli_fetch_array($result)){
    echo "<div>
    
        <div>".$row['historyText']."</div>
        <div>".$row['historyImage']."</div>
        <div>".$row['historyDate']."</div>

    </div>";
    }
?>
</body>
</html>