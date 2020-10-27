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
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo "<p>logged in as: " . $_SESSION['username'] . "!";
        } else {
            header('Location: login.html');
        }
    include_once 'search.php';
    include_once 'displayposts.php';
    ?>
</body>
</html>