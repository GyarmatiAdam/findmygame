<?php
/************************************************************************
 * This page only for admins                                            *
 * Admin can delete category here                                       *
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
        <br><a href='../../admin.php'><button class='btn btn-dark' type='button'>Back</button></a><br><br>
        
        <?php
        if ($_GET["cat_id"]) {
        $cat_id = $_GET['cat_id'];

        $sql = "DELETE FROM categories WHERE cat_id = {$cat_id};";
            if($connect->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">The category was successfully deleted!!</div>';

            } else {
                echo '<div class="alert alert-danger" role="alert">' . $connect->error . '</div>';
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