<?php
//headers
header('Access-Contorl-Allow_Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With");

//initializing api
include_once('../includes/config.php');
include_once('../core/PlantParameters.php');

//make connection
$database = new config();
$db = $database->connect();
//instantiare post
$add = new PlantParameters($db);
//execute
$result = $add->add_plant_parameters();

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

$add->plantGenus = $data->plantGenus;
$add->optimalLight = $data->optimalLight;
$add->waterEveryHour = $data->waterEveryHour;
$add->optimalTemp = $data->optimalTemp;

//execute
if($add->add_plant_parameters()){
    echo json_encode(
        array('message'=>'Insert done')
    );
}else{
    echo json_encode(
        array('message' => 'insert not done'));
}
 
