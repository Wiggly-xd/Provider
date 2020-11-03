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
$result = $post->read_post();

//Get row count
$num = $result->rowCount();

//Check if any posts
if($num > 0){
    //Post array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_item = array(
            'postID' => $postID,
            'postTitle' => $postTitle,
            'username' => $username,
            'pText' => $pText,
            'lastUpdate' => $lastUpdate,
            'postDate' => $postDate,
            'imageURL' => $imageURL,
            'pageID' => $pageID,
            'serviceID' => $serviceID,
            'serviceType' => $serviceType
        );

        //Push to "data"
        array_push($posts_arr['data'], $post_item);
    }
    //Turn to JSON and output
    echo json_encode($posts_arr);

}else{
//No posts
echo json_encode(
    array('message' => 'No Posts Found')
);
}


?>