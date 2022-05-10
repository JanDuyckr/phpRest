<?php
//headers
header('Access-Contorl-Allow_Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

//initializing api

include_once('../includes/config.php');
include_once('../core/Pots.php');

$database = new config();
$db = $database->connect();

//instantiare post
$pots = new Pots($db);
//execute
$result = $pots->get_pot_numbers();
//get the rowCount
$num = $result->rowCount();

if($num > 0){
    $post_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'potNumber' => $potNumber
        );
        array_push($post_arr,$post_item);
    }
    //conver to JSON and output
    echo json_encode($post_arr);   
}else{
    echo json_encode(array('message'=>'nothing found'));
}
