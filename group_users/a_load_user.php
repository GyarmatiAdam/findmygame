<?php

include_once '../db_config.php';

$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if($con->connect_error) {
      die("connection failed: " . $con->connect_error);
}


$id = $_POST['id'];

if($id > 0){

	$sql ="SELECT * FROM users ";
	$sql .= "WHERE user_id = $id;";

    // Check if record exists
    $checkRecord = mysqli_query($con, $sql);
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows == 1){
      // Delete record
      $user = mysqli_fetch_array($checkRecord);

      $userinfo = $user['username']."_".$user['email'];

      echo $userinfo;
      exit;
    }
  }

  echo 0;
  exit;

$con->close();