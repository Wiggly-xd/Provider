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
    $pageID = $_GET["pageID"];
    $_SESSION['pageID'] = $pageID;

    echo "<form action='image.php?pageID=$pageID' method='post' class='form' enctype='multipart/form-data'>";
    
    include_once 'loop.php';
    echo '<br>';
    ?>
        <input type="text" name="postTitle" placeholder="Enter title of post">
        <br>
        <input type="text" name="pText" placeholder="Enter text">
        <br>

        <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<p>logged in as: " . $_SESSION['username'] . "!";
            } else {
                header('Location: login.html');
            }
        ?>
        <br>
            <input type="file" name="img"/>
            <br>
    <input type="radio" id="1" name="comment" value="on" checked>
        <label for="comment">comment on</label>
        <input type="radio" id="2" name="comment" value="off">
        <label for="comment">comment off</label>
        <br>
        <input type="submit" value="Submit" name="save_btn">






    </form>
</body>
</html>