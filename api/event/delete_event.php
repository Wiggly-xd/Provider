<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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

//Set eventID to DELETE
$event->eventID = $data->eventID;

//Delete event
if($event->delete_event()){
    echo json_encode(
        array('message' => 'Event Deleted')
    );
}else{
    echo json_encode(
        array('message' => 'Event Not Deleted')
    );
}