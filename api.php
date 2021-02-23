<?php

require_once "models/Beer.php";
require_once "controllers/BeerController.php";

header('Content-type: application/json');
// Takes raw data from the request
$json = file_get_contents('php://input');
$data = json_decode($json);

$controller = new BeerController();

$entity = "";

if(isset($_GET['entity'])){
    $entity = $_GET['entity'];
}

switch($entity){
    case "beer":
	$controller->addBeer($data->title);
	echo json_encode(['msg' => "Pivo bolo vložené"]);
	break;
    case "rating";
	$controller->addRating( (int) $data->beerId, (int) $data->value);
    	break;
    default:
	echo json_encode($controller->list());
	break;
}


