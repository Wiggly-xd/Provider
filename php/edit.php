<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="editaccount.php" method="post" class="form">
    <h1>edit account</h1>
    <input type="text" name="username" placeholder="Choose a new username" required="required">
    <br>
    <input type="password" name="password" placeholder="Choose a new password" required="required">
    <br>
    <input type="text" name="firstName" placeholder="Change your first name" required="required">
    <br>
    <input type="text" name="middleName" placeholder="Change your middle name">
    <br>
    <input type="text" name="lastName" placeholder="Change your last name" required="required">
    <br>

    <p>Admin</p>
    <input type="radio" name="admin" value="1">
    <p>Moderator</p>
    <input type="radio" name="moderator" value="1">

    <?php include 'userIDoption.php'; ?>

    <input type="submit" value="Edit" name="btn" class="btn">
    </form>
    <form action="deleteaccount.php" method="post" class="form">
        <h1>Delete account</h1>
        <?php include 'userIDoption.php'; ?>
        <input type="submit" value="Delete" name="btn" class="btn">
</form>

</body>
</html>