<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Service.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate service object
$service = new Service($db);
$result = $service->read_service();

//Get row count
$num = $result->rowCount();

//Check if any service
if($num > 0){
    //Service array
    $service_arr = array();
    $service_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $service_item = array(
            'postID' => $postID,
            'postTitle' => $postTitle,
            'username' => $username,
            'pText' => $pText,
            'imageURL' => $imageURL,
            'pageID' => $pageID,
            'serviceID' => $serviceID,
            'publish' => $publish,
            'serviceType' => $serviceType
        );

        //Push to "data"
        array_push($service_arr['data'], $service_item);
    }
    //Turn to JSON and output
    echo json_encode($service_arr);

}else{
//No service
echo json_encode(
    array('message' => 'No Services Found')
);
}


?>