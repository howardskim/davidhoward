<?php
require_once("mysql_connect.php");

if(empty($_POST["id"]) || empty($_POST["todo"])) {
    $output["errors"] = "Edit Failed";
  }


$id = $_POST["id"];
$todo = $_POST["todo"];

$query = "UPDATE `dh_todo` SET `id` = '$id', `todo` = '$todo'";
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
