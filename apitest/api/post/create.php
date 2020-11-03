<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate post object
$post = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->postTitle = $data->postTitle;
$post->pText = $data->pText;
$post->postDate = $data->postDate;
$post->username = $data->username;
$post->pageID = $data->pageID;

//Create post
if($post->create()){
    echo json_encode(
        array('message' => 'Post Created')
    );
}else{
    echo json_encode(
        array('message' => 'Post Not Created')
    );
}