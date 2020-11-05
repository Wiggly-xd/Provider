<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Comment.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate comment object
$comment = new Comment($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$comment->cText = $data->cText;
$comment->cDate = $data->cDate;
$comment->pageID = $data->pageID;



//Create comment
if($comment->create_comment()){
    echo json_encode(
        array('message' => 'Comment Created')
    );
}else{
    echo json_encode(
        array('message' => 'Comment Not Created')
    );
}