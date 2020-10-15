<?php
include_once 'connect.php';


$query = 'SELECT *
FROM post
INNER JOIN spage
ON post.postID = spage.pageID';


?>