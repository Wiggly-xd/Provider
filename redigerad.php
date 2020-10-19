<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
        require_once 'connect.php';

        $title = "";
        $description = "";

        if(isset($_GET['edit'])){
            $id = $_GET['eventID'];
            $result = $mysqli->query("SELECT * FROM event WHERE id=$id") or die($mysqli->error());
            if (count($result)==1){
                $row = $result->fetch_array();
                $title = $row['eventTitle'];
                $description = $row['description'];
            }
        }

    ?>
</body>
</html>