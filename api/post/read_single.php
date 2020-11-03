<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate post object
$post = new Post($db);

//Get pageID from URL
$post->pageID = isset($_GET['pageID']) ? $_GET['pageID'] : die();

//Get post
$post->read_single();

//Create array
$post_arr = array(
    'pageID' => $post->pageID,
    'postTitle' => $post->postTitle,
    'pText' => $post->pText,
    'postDate' => $post->postDate,
    'username' => $post->username,
    'serviceType' => $post->serviceType
);

//Make JSON
print_r(json_encode($post_arr));

?>