<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/user.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate user
$user = new User($db);
$result = $user->read_user();

//Get row count
$num = $result->rowCount();

//Check if any user
if($num > 0){
    //User array
    $users_arr = array();
    $users_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $user_item = array(
            'username' => $username,
            'password' => $password
        );

        //Push to "data"
        array_push($users_arr['data'], $user_item);
    }
    //Turn to JSON and output
    echo json_encode($users_arr);

}else{
//No users
echo json_encode(
    array('message' => 'No users Found')
);
}


?>