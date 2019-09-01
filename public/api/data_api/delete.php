<?php
require_once("mysql_connect.php");

if((empty($_POST["id"]))){
	exit("no ID specified");
}

$id = $_POST["id"];

$query = "DELETE FROM `dh_todo` WHERE `id` = $id";
                
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
