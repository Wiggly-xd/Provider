<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/user.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate user object
$user = new User($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set userID
$user->username = $data->username;
$user->password = $data->password;

//Create user
if($user->create_user()){
    echo json_encode(
        array('message' => 'User Created')
    );
}else{
    echo json_encode(
        array('message' => 'User Not Created')
    );
}