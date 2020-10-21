<?php
include_once 'connect.php';

echo '<form action="delete.php" method="post">';

include_once 'loop.php';

echo '<input type="submit" value="Delete" name="Delete">';
echo '</form>';


$stmt = 'SELECT * FROM service, spage, post WHERE service.serviceID = post.serviceID AND post.pageID = spage.pageID';

$res = mysqli_query($mysqli, $stmt);

while($qryresult = mysqli_fetch_array($res)){
    echo '<div style="border: 1px solid black; width: 50vw; margin-left:auto; margin-right: auto; padding-left: 1vw;"><h1>' . $qryresult["serviceTitle"] . '</h1><br>' . '<p>Creation date: ' . $qryresult["serviceDate"] . '</p><p>wiki=1, blog=0: </p>' . $qryresult["serviceType"] . '<h2>' . $qryresult["postTitle"] . '</h2><br>' . '<p>content: ' . $qryresult["pText"] . '</p><br>' . '<p>Post date: ' . $qryresult["postDate"] . '</p></div>','<br/>';
}
?>