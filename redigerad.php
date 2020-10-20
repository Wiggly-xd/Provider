<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 

        session_start();
        require_once 'connect.php';

        $id = 0;
        $title = '';
        $description = '';

        if(isset($_POST['eventID'])){
            $id = $_POST['eventID'];
            $title = $_POST['eventTitle'];
            $description = $_POST['description'];

            $sql = "UPDATE event SET eventTitle='$title', description='$description' WHERE eventID=$id";
            mysqli_query($conn, $sql);
            
        }
        header('location: calendar.php');
    ?>
</body>
</html>