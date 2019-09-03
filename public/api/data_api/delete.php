<?php
require_once("../api/mysql_connect.php");

if((empty($_GET["id"]))){
	exit("no ID specified");
}

$id = $_GET["id"];

$query = "DELETE FROM `list` WHERE `id` = $id";
                
$result = mysqli_query($conn, $query);

if(!isset($result)){
	die("Database Connection Error: " . mysqli_connect_error());
}else{
	if(mysqli_affected_rows($conn)){
		echo 'delete success!';
	}else{
		echo 'delete error!';
	}
}

?>
