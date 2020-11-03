<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/event.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate event object
$event = new Event($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$event->startDate = $data->startDate;
$event->eventTitle = $data->eventTitle;
$event->description = $data->description;
$event->endDate = $data->endDate;
$event->userID = $data->userID;
$event->inviteID = $data->inviteID;


//Create event
if($event->create_event()){
    echo json_encode(
        array('message' => 'Event Created')
    );
}else{
    echo json_encode(
        array('message' => 'Event Not Created')
    );
}