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
    ?>
    <form action="pagecheck.php" method="post" class="form">
        <p>title</p>
        <input type="text" name="serviceTitle" placeholder="title" required="required">
        <p>service id</p>
        <input type="text" name="serviceID" placeholder="service ID" required="required">
        <p>Wiki</p>
        <input type="radio" name="serviceType" value="1">
        <p>Blog</p>
        <input type="radio" name="serviceType" value="0">
 
        <input type="submit" value="Submit" name="btn">
    </form>

    <form action="historik.php" method="post" type="hidden">
        <button>Historik</button>
    </form>
</body>
</html>