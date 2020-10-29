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
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] == 1) {
            echo "<p>logged in as: " . $_SESSION['username'] . "!";
        } else {
            header('Location: login.html');
        }
    include_once 'adminpage.php';
    ?>
</body>
</html>