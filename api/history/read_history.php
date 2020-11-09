<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/History.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate history object
$history = new History($db);
$result = $history->read_history();

//Get row count
$num = $result->rowCount();

//Check if any History
if($num > 0){
    //History array
    $history_arr = array();
    $history_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $history_item = array(
            'postTitle' => $postTitle,
            'postDate' => $postDate,
            'pText' => $pText,
            'pageID' => $pageID
        );

        //Push to "data"
        array_push($history_arr['data'], $history_item);
    }
    //Turn to JSON and output
    echo json_encode($history_arr);

}else{
//No History
echo json_encode(
    array('message' => 'No History Found')
);
}


?>