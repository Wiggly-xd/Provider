<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post" class="form">
        <input type="text" name="postTitle" placeholder="Enter title of post" required="required">
        <br>
        <input type="text" name="pText" placeholder="Enter text" required="required">
        <br>

        <?php

        include_once 'connect.php';
        include_once 'loop.php';

        $pageID = $_GET["pageID"];
        $_SESSION['pageID'] = $pageID;
        ?>
        <br>

        <input type="submit" value="Submit" name="btn">
    </form>
</body>
</html>