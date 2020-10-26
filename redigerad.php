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

        $eventID = $_POST['eventID'];
        $title = '';
        $description = '';
        $startDate = '';
        $endDate = '';

        if(isset($_POST['eventID'])){
            $eventid = $_POST['eventID'];
            $title = $_POST['eventTitle'];
            $description = $_POST['description'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];


            $sql = "UPDATE event SET eventTitle='$title', description='$description', startDate='$startDate', endDate='$endDate' WHERE eventID=$eventID";
            mysqli_query($conn, $sql);
            
        }
        header('location: calendar.php');
    ?>
</body>
</html>