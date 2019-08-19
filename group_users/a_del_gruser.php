<?php 

//deleting a user from a group = setting user status in table grusers to removed

  $con = new mysqli('localhost','root','','findmygame'); 

  if($con->connect_error) {
      die("connection failed: " . $con->connect_error);
  }

  $id = $_POST['id'];
  $group = $_POST['group'];

  if($id > 0){

    // Check if record exists
    $checkRecord = mysqli_query($con,"SELECT * FROM grusers WHERE fk_user_id = $id AND fk_group_id = $group");
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows == 1){
      // Delete record
      $sql = "UPDATE grusers SET gruser_status = 'removed' WHERE fk_user_id = $id AND fk_group_id = $group;";
      $query = mysqli_query($con,$sql);

      echo 1;
      exit;
    }
  }

  echo 0;
  exit;

  $con->close();

?>