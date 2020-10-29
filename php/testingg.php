<?php
include_once 'connect.php';

$sth = mysqli_query($mysqli, "SELECT * FROM service, spage, post WHERE service.serviceID = post.serviceID AND post.pageID = spage.pageID");
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
print json_encode($rows);

?>