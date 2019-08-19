<?php 

include_once '../db_config.php';

$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if($con->connect_error) {
      die("connection failed: " . $con->connect_error);
  }


//adding a user to a group = setting user status in table grusers to verified

  $group = $_GET['id'];
  
  $userID = $_POST['userID'];
  
  if($id > 0){

    // Check if record exists
    $checkRecord = mysqli_query($con,"SELECT * FROM grusers WHERE fk_user_id = $userID AND fk_group_id = $group");
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows == 1){

      echo 'You already applied to this group.';

    } else {
      // 
      $sql = "INSERT INTO grusers (fk_group_id, fk_user_id, gruser_status) VALUES ($group, $userID, 'applied');";
      $query = mysqli_query($con,$sql);

      echo 1;
      exit;
    }
  }
  
  echo 0;
  exit;

  $con->close();

?>