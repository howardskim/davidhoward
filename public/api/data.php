<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');


if((empty($_GET["action"]))){
	exit("no action specified");
}

require("mysql_connect.php");

$output = [
	"success"=> false,
	"errors"=>[]
];

switch($_GET["action"]){
	case "read":
		include("data_api/read.php");
		break;
	case "insert":
		include("data_api/insert.php");
		break;
	case "delete":
		include("data_api/delete.php");
		break;
	case "update":
		include("data_api/update.php");
		break;
}

$outputJSON = json_encode($output);

print($outputJSON);

?>
