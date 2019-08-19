<?php
/************************************************************************
 * This page only for admins                                            *
 * Admin can update user datas here                                     *
 ************************************************************************/

include_once 'navbar.php';

//get datas from the form of user_update.php 
if ($_POST){
    $user_status = $_POST['user_status'];
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $user_role = $_POST['user_role'];

//updates the data in database
    $sql = "UPDATE users SET 
      first_name = '$first_name',
      last_name = '$last_name', 
      username = '$username',
      email = '$email',
      dob = '$dob',
      user_role = $user_role,
      user_status = '$user_status' 
      WHERE user_id = {$user_id}";
      
?>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6 mt-5">
      <?php
            if($connect->query($sql) === TRUE) {
              echo "<br><a href='user_update.php?user_id=" .$user_id."'><button class='btn btn-dark' type='button'>Back</button></a><br>";
              echo '<br><div class="alert alert-success" role="alert">The user data was successfully updated!!</div>';
              } else  {
                echo "Error " . $sql . ' ' . $connect->error;
          }
        
          $connect->close();
        }

      ?>
    </div>
    <div class="col-sm-3">
    </div>

  </div>
</div>  
</body>