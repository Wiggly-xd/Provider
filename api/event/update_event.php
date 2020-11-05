<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
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

//Set eventID to UPDATE
$event->startDate = $data->startDate;
$event->eventTitle = $data->eventTitle;
$event->description = $data->description;
$event->endDate = $data->endDate;
$event->userID = $data->userID;
$event->inviteID = $data->inviteID;

//Update event
if($event->update_event()){
    echo json_encode(
        array('message' => 'event Updated')
    );
}else{
    echo json_encode(
        array('message' => 'event Not Updated')
    );
}