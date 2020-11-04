<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';
include_once '../../models/Comment.php';
include_once '../../models/Event.php';
include_once '../../models/History.php';
include_once '../../models/Image.php';
include_once '../../models/User.php';
include_once '../../models/Service.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate post object
$post = new Post_history($db);
$result = $post->read_post_history();

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

$comment = new Comment_history($db);
$result2 = $comment->read_comment_history();

//Get row count
$num2 = $result2->rowCount();

//Check if any comments
if($num2 > 0){
    //Comment array
    $comments_arr = array();
    $comments_arr['data'] = array();

    while($row = $result2->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $comment_item = array(
            'postID' => $postID,
            'cText' => $cText,
            'cDate' => $cDate,
            'commentID' => $commentID
        );

        //Push to "data"
        array_push($comments_arr['data'], $comment_item);
    }
    //Turn to JSON and output
    echo json_encode($comments_arr);

}else{
//No Comments
echo json_encode(
    array('message' => 'No Comments Found')
);
}

$event = new Event_history($db);
$result3 = $event->read_event_history();

//Get row count
$num3 = $result3->rowCount();

//Check if any events
if($num3 > 0){
    //Event array
    $events_arr = array();
    $events_arr['data'] = array();

    while($row = $result3->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $event_item = array(
            'eventID' => $eventID,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'eventTitle' => $eventTitle,
            'description' => $description
        );

        //Push to "data"
        array_push($events_arr['data'], $event_item);
    }
    //Turn to JSON and output
    echo json_encode($events_arr);

}else{
//No events
echo json_encode(
    array('message' => 'No Events Found')
);
}

$history = new History_history($db);
$result4 = $history->read_history_history();

//Get row count
$num4 = $result4->rowCount();

//Check if any history
if($num4 > 0){
    //History array
    $historys_arr = array();
    $historys_arr['data'] = array();

    while($row = $result4->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $history_item = array(
            'historyID' => $historyID,
            'historyDate' => $historyDate,
            'historyText' => $historyText,
            'historyImage' => $historyImage,
            'postID' => $postID
        );

        //Push to "data"
        array_push($historys_arr['data'], $history_item);
    }
    //Turn to JSON and output
    echo json_encode($historys_arr);
}else{
//No history
echo json_encode(
    array('message' => 'No History Found')
);
}

$image = new Image_history($db);
$result5 = $image->read_image_history();

//Get row count
$num5 = $result5->rowCount();

//Check if any images
if($num5 > 0){
    //Image array
    $images_arr = array();
    $images_arr['data'] = array();

    while($row = $result5->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $image_item = array(
            'name' => $name,
            'path' => $path,
            'type' => $type,
            'serviceID' => $serviceID
        );

        //Push to "data"
        array_push($images_arr['data'], $image_item);
    }
    //Turn to JSON and output
    echo json_encode($images_arr);

}else{
//No images
echo json_encode(
    array('message' => 'No Images Found')
);
}

$user = new User_history($db);
$result6 = $user->read_user_history();

//Get row count
$num6 = $result6->rowCount();

//Check if any users
if($num6 > 0){
    //User array
    $users_arr = array();
    $users_arr['data'] = array();

    while($row = $result6->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $user_item = array(
            'username' => $username,
            'password' => $password,
            'firstName' => $firstName,
            'middleName' => $middleName,
            'lastName' => $lastName,
            'moderator' => $moderator,
            'admin' => $admin,
            'userID' => $userID
        );

        //Push to "data"
        array_push($users_arr['data'], $user_item);
    }
    //Turn to JSON and output
    echo json_encode($users_arr);

}else{
//No users
echo json_encode(
    array('message' => 'No Users Found')
);
}

$service = new Service_history($db);
$result7 = $service->read_service_history();

//Get row count
$num7 = $result7->rowCount();

//Check if any services
if($num7 > 0){
    //Service array
    $services_arr = array();
    $services_arr['data'] = array();

    while($row = $result7->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $service_item = array(
            'serviceID' => $serviceID,
            'serviceDate' => $serviceDate,
            'serviceTitle' => $serviceTitle
        );

        //Push to "data"
        array_push($services_arr['data'], $service_item);
    }
    //Turn to JSON and output
    echo json_encode($services_arr);

}else{
//No services
echo json_encode(
    array('message' => 'No Services Found')
);
}


?>