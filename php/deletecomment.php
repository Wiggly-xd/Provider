<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    
        include("dbconn.php");



        $ID = $_GET['rn'];

        $sql = "DELETE FROM comment WHERE commentID=$ID";
        mysqli_query($db,$sql);

        if($sql){

            $sql2 = "INSERT INTO history(historyText) VALUES(cText)";
            mysqli_query($db, $sql2);
        }
    
    ?>

</body>
</html>