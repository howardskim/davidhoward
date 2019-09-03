<?php
require_once("../api/mysql_connect.php");

if(empty($_GET["id"]) || empty($_GET["todo"])) {
    $output["errors"] = "Edit Failed";
  }


$id = $_GET["id"];
$todo = $_GET["todo"];

$query = "UPDATE `list` SET `todo` = '$todo' WHERE `id` = '$id'";
$result = mysqli_query($conn, $query);

if(empty($result)) {
    $output["errors"][] = "Database Error";
    } else {
        if(mysqli_affected_rows($conn) > 0) {
        $output["success"] = true;
        } else {
            $output["errors"][] = "Update Error";
        }
    }
?>
