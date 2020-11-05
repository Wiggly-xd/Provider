<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Comment.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate post object
$comment = new Comment($db);
$result = $comment->read_comment();

//Get row count
$num = $result->rowCount();

//Check if any posts
if($num > 0){
    //Post array
    $comments_arr = array();
    $comments_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $comment_item = array(
            'commentID' => $commentID,
            'cText' => $cText,
            'cDate' => $cDate,
            'pageID' => $pageID
        );

        //Push to "data"
        array_push($comments_arr['data'], $comment_item);
    }
    //Turn to JSON and output
    echo json_encode($comments_arr);

}else{
//No posts
echo json_encode(
    array('message' => 'No Comments Found')
);
}


?>