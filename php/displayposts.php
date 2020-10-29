<?php
include_once 'connect.php';

echo '<form action="delete.php" method="post">';

include_once 'loop.php';

echo '<input type="submit" value="Delete" name="Delete">';
echo '</form>';


$stmt = 'SELECT * FROM service, spage, post WHERE service.serviceID = post.serviceID AND post.pageID = spage.pageID';

$res = mysqli_query($mysqli, $stmt);

$stmt2 = "SELECT path FROM image";

$imgres = mysqli_query($mysqli, $stmt2);

$qryimgresult = mysqli_fetch_array($imgres);



$stmt3 = "SELECT user.username FROM user INNER JOIN post WHERE user.userID = post.username";

$usernameres = mysqli_query($mysqli, $stmt3);

$qryusernameresult = mysqli_fetch_array($usernameres);

while($qryresult = mysqli_fetch_array($res)){


    if($qryresult["serviceType"] == 1){
        $serviceType = "Wiki";
    }else{
        $serviceType = "Blogg";
    }


    echo '<div style="border: 1px solid black; width: 50vw; margin-left:auto; margin-right: auto; padding-left: 1vw;">';
    echo '<h1>' . $qryresult["serviceTitle"] . '</h1>';
    echo '<br>';
    echo '<p>Creation date: ' . $qryresult["serviceDate"] . '</p>';
    echo '<p>Service Type: ' . $serviceType . '</p>';
    echo '<h2>' . $qryresult["postTitle"] . '</h2>';
    echo '<br>';
    echo '<p>content: ' . $qryresult["pText"] . '</p>';
    echo '<br>';
    echo '<p>Post date: ' . $qryresult["postDate"] . '</p>';
    echo '<br>';
    echo '<p>Service ID:' . $qryresult["serviceID"] . '</p>';
    echo '<br>';
    echo '</div>';
}

$cstmt = "SELECT cText FROM comment INNER JOIN post WHERE comment.pageID = post.pageID";

$cres = mysqli_query($mysqli, $cstmt);
echo '<form method="post" action="deletecomment.php">';
while($cqryres = mysqli_fetch_array($cres)){
    echo "Comment: " . $cqryres['cText'] . "<input type='radio' name='cText' value=" . $cqryres['cText'] . ">";
    echo '<input type="text" name="newcText">';
    echo '<br>';
}
echo '<input type="submit" value="Delete" name="delete_btn">';
echo '<input type="submit" value="Edit" name="edit_btn">';
echo '</form>';


?>