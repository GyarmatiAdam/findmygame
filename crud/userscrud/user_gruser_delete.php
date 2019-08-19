<?php
/************************************************************************
 * This page only for admins                                            *
 * Admin can delete all kuser related data here                         *
 ************************************************************************/
/*require_once "../../db_config.php";*/
include_once 'navbar.php';
?>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6 mt-5">
        <!-- <br><a href='user_detail.php'><button class='btn btn-dark' type='button'>Back</button></a><br><br> -->
       
            <?php
            if ($_GET["user_id"]) {
            $user_id = $_GET['user_id'];

            echo "<br><a href='user_detail.php?user_id=" .$user_id."'><button class='btn btn-dark' type='button'>Back</button></a><br>";
       
             $sql = "DELETE FROM grusers WHERE fk_user_id = {$user_id}";

                if($connect->query($sql) === TRUE) {
                    echo '<br><div class="alert alert-success" role="alert">All user related group data was successfully deleted!!</div>';

                } else {
                    echo '<br><div class="alert alert-danger" role="alert">' . $connect->error . '</div>';
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