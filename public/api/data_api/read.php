<?php
require_once("mysql_connect.php");

$query = "SELECT `id`, `todo` FROM `list`";

$result = mysqli_query($conn, $query);

if(empty($result)) {
	$output['error'] = 'database error';
	} else if ($result) {
		$output['success'] = true;
		$output['data'] = [];
		$i=0;
		while($row = mysqli_fetch_assoc($result)) {
			array_push($output['data'], $row);
		}
		} else {
			$output['error'] = 'no data';
		};

?>
