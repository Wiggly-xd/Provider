
<?php
include("dbconn.php");

$commenttext = $_POST['commenttext'];
$date = date("F j, Y, g:i a");

$stmt = $db->prepare("INSERT INTO comment (cText, cDate) VALUES (?, ?)");

$stmt->bind_param("ss", $commenttext, $date);

$stmt->execute();

$stmt->close();

echo 'comment: ' . $commenttext;
echo '<br>';
echo 'date: ' . $date;
echo '<br>';
echo '<a href="post.php">Gå tillbaka</a>';

?>