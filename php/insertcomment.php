<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<br>

<?php
include("dbconn.php");

$fornamn = $_POST['fornamn'];
$comments = $_POST['comments'];
$date = date("F j, Y, g:i a");

echo $fornamn . ' ';
echo $comments . ' ';
echo $date;

$stmt = $db->prepare("INSERT INTO comment (cName, cText, cDate) VALUES (?, ?, ?)");

$stmt->bind_param("sss", $fornamn, $comments, $date);

$stmt->execute();

$stmt->close();
?>

</form>
</body>
</html>