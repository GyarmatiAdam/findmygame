<?php
/************************************************************************
 * This page only for admins                                            *
 * Admin can update user datas                                          *
 ************************************************************************/


include_once 'navbar.php';

if ($_GET['user_id']) {
    $user_id = $_GET['user_id'];
 
    $sql = "SELECT * FROM users WHERE user_id = {$user_id}";

    

    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    $connect->close();

?>
<body>

<br><br><div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6 mt-5">
        <form class="border" method="POST" enctype="multipart/form-data" action="user_action_update.php">
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Status:</label>
                    </div>
                    <select class="custom-select" name="user_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div> 
            </div> 
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" required value="<?php echo $data['first_name']?>"><br>
                <input type="text" class="form-control" name="last_name" required value="<?php echo $data['last_name']?>"><br>
                <input type="text" class="form-control" name="username" required value="<?php echo $data['username']?>"><br>
                <input type="text" class="form-control" name="email" required value="<?php echo $data['email']?>"><br>
                <input type="date" class="form-control" name="dob" required value="<?php echo $data['dob']?>"><hr>
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">User-role:</label>
                    <select class="custom-select"  name="user_role" required value="<?php echo $data['user_role']?>">
                        <option value="">Select One</option>
                        <option value="1">Admin</option>
                        <option value="2">Group user</option>
                        <option value="3">USer</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="user_id" value="<?php echo $data['user_id']?>"/>
            <div>
            <button class="btn btn-warning" name="submit" type="submit">Save Changes</button>
            <a href= "../../admin.php"><button class="btn btn-dark" type="button">Back</button></a>
            </div>
        </form>

        <?php 
            } else  {
                echo '<div class="alert alert-danger" role="alert">User data can not be updated!!</div>';
            }
        ?>
        </div>
        <div class="col-sm-3">
        </div>

    </div>
</div>    
</body>