<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/event.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate event object
$event = new Event($db);
$result = $event->read_event();

//Get row count
$num = $result->rowCount();

//Check if any events
if($num > 0){
    //Event array
    $events_arr = array();
    $events_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $event_item = array(
            'startDate' => $startDate,
            'eventTitle' => $eventTitle,
            'description' => $description,
            'endDate' => $endDate,
            'userID' => $userID,
            'inviteID' => $inviteID
        );

        //Push to "data"
        array_push($events_arr['data'], $event_item);
    }
    //Turn to JSON and output
    echo json_encode($events_arr);

}else{
//No events
echo json_encode(
    array('message' => 'No events Found')
);
}


?>