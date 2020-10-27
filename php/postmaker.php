<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="image.php" method="post" class="form" enctype="multipart/form-data">
        <input type="text" name="postTitle" placeholder="Enter title of post" required="required">
        <br>
        <input type="text" name="pText" placeholder="Enter text" required="required">
        <br>

        <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<p>logged in as: " . $_SESSION['username'] . "!";
            } else {
                header('Location: login.html');
            }
        include_once 'connect.php';
        include_once 'loop.php';

        $pageID = $_GET["pageID"];
        $_SESSION['pageID'] = $pageID;
        ?>
        <br>
    <table>
        <tr>
            <td><label>Image</label></td>
            <td><label>:</label></td>
            <td><label><input type="file" name="img"/></label></td>
        </tr>
        <tr>
            <td><label></label></td>
            <td><label></label></td>
        </tr>
    </table>
        <input type="submit" value="SAVE" name="save_btn">
    </form>

    
</body>
</html>