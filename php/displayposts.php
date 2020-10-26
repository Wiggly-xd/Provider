<?php
include_once 'connect.php';

echo '<form action="delete.php" method="post">';

include_once 'loop.php';

echo '<input type="submit" value="Delete" name="Delete">';
echo '</form>';


$stmt = 'SELECT * FROM service, spage, post WHERE service.serviceID = post.serviceID AND post.pageID = spage.pageID';

$res = mysqli_query($mysqli, $stmt);

$stmt2 = 'SELECT path FROM image';

$imgres = mysqli_query($mysqli, $stmt2);

$qryimgresult = mysqli_fetch_array($imgres);





while($qryresult = mysqli_fetch_array($res)){


    if($qryresult["serviceType"] == 1){
        $serviceType = "Wiki";
    }else{
        $serviceType = "Blogg";
    }


    echo '<div style="border: 1px solid black; width: 50vw; margin-left:auto; margin-right: auto; padding-left: 1vw;"><h1>' . $qryresult["serviceTitle"] . '</h1><br>' . '<p>Creation date: ' . $qryresult["serviceDate"] . '</p><p>Service Type: ' . $serviceType . '</p><h2>' . $qryresult["postTitle"] . '</h2><br>' . '<p>content: ' . $qryresult["pText"] . '</p><br>' . '<p>Post date: ' . $qryresult["postDate"] . '</p>' . '<br><p>Service ID:' . $qryresult["serviceID"] . '</p><br><img src="' . $qryimgresult["path"] . '"><br></div>';
}

?>