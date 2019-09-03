<?php
require_once("../api/mysql_connect.php");

$todo_id = $_GET["id"];
$todo_name = $_GET["todo"];

$query = "INSERT INTO `list` (`todo`)
			VALUES ('$todo_name')";

$result = mysqli_query($conn, $query);

$output = [
	'success' => false,
	'error' => []
];

if(!isset($result)){
	
	die("Database Connection Error: " . mysqli_connect_error());
}else{
	if(mysqli_affected_rows($conn)){
		$output['success'] = true;
		echo 'insert success!';
	}else{
		echo 'insert error!';
	}
}
?>
