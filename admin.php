<?php
/************************************************************************
 * This page only for admins                                            *
 * able to create, delete, update and display datas from                * 
 * categories and users table                                           *
 ************************************************************************/

include_once 'navbar.php';

if(!isset($_SESSION["admin"])){
    exit;
}

include_once 'include/class.admin.php';
include_once 'include/class.pagination.php';

$user = new User(); 
$admin = new Admin(); 
$pag = new Pagination();

////////////////////////////////////add new events//////////////////////////////////////

//select all from categories
    $catdata="SELECT * FROM categories";
//call the results
    $cat_result = mysqli_query($admin->db,$catdata);
//fetch them into rows
    $cat_rows = $cat_result->fetch_all(MYSQLI_ASSOC);


//paginate users
$data = "SELECT * FROM users";
$data_result = mysqli_query($admin->db,$data);
$rows = $data_result->fetch_all(MYSQLI_ASSOC);
$numbers = $pag->Paginate($rows,3);
$result = $pag->fetchResult();


//on submit event will be inserted into database
//extract assighn values to variables
if (isset($_POST['submit'])){
    extract($_POST);
    $addevent = $admin->create_event(
        $fk_cat_id, 
        $event_name, 
        $event_type, 
        $event_desc, 
        $event_date, 
        $event_location);
 

    if ($addevent) {
// event creation was successfull
    echo '<div class="alert alert-success" role="alert">Event was successfully created!!</div>';
    } else {
// event creation was unsuccessfull
    echo '<div class="alert alert-danger" role="alert">Event can not be created!</div>';
    }
}

////////////////////////////////////add new categories//////////////////////////////////////////////////

if (isset($_POST['submit2'])){
    extract($_POST);
    $addcategory = $admin->create_category($cat_type);

    if ($addcategory) {
// category creation was successfull
    echo '<div class="alert alert-success" role="alert">Category was successfully created!!</div>';
    } else {

    echo '<div class="alert alert-danger" role="alert">Category can not be created!</div>';
    }
}

////////////////////////////////submit to create new admin/////////////////////////////////////////////////
if (isset($_POST['submit3'])){
    extract($_POST);
    echo $createadmin = $admin->create_admin(
        $first_name, 
        $last_name, 
        $username, 
        $dob, 
        $pass, 
        $email);

    if ($createadmin) {
// admin creation was successfull
    echo '<div class="alert alert-success" role="alert">Admin account was successfully created!!</div>';
    } else {
// admin creation was unsuccessfull
    echo '<div class="alert alert-danger" role="alert">Admin can not be created!</div>';
    }
}
?>

<!-------------------------------------- display html content --------------------------------------->
<html>
<head>
    <style>
        body{
            margin-top: 80px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-2 mt-5">
           
        </div>

        <div class="col-sm-8">
<!------------------------------------- display all users here--------------------------------------->
    <div class="border">
        <h3>Update or delete User data here:</h3><br>
        <?php

        //pagination tabs
        foreach($numbers as $num){
            echo '<a type="button" class="btn btn-primary btn-sm" href="admin.php?page='.$num.'">'.$num.'</a>';
        }
        
        ?><br><hr><?php

        //page contents
        foreach($result as $r){
            echo"<div class='border'><div class='row'>
            <div>
                <a href='crud/userscrud/user_update.php?user_id=" .$r['user_id']."'><button class='btn btn-warning' type='button'>Edit</button></a>
                <a href='crud/userscrud/user_delete.php?user_id=" .$r['user_id']."'><button class='btn btn-danger' type='button'>Delete</button></a>
                <a href='crud/userscrud/user_detail.php?user_id=" .$r['user_id']."'><button class='btn btn-secondary' type='button'>Details</button></a>
            </div> 
            <br><hr>";
            echo '<div class="card">
                        <div class="card-header">
                        <h6 class="card-text" value="'.$r["user_id"].'"><small>Name: </small>'.$r["first_name"].' '.$r["last_name"].'<small> Username: </small>'.$r["username"].'</h6>
                        </div>
                    </div>
                </div>
            </div><hr>';

        }
        ?>
    </div><br>
          
<!---------------------------------create event form --------------------------------------------------->
    <div class="border">
        <br><h3>Create Event:</h3>
            <form action="" method="post" id="addevent">
                <div class="form-group">
                    <label for="category">Category: </label>
                    <select class="form-control" name="fk_cat_id">
                        <?php
                            foreach($cat_rows as $row){
                                echo '<option value="'.$row["cat_id"].'">'.$row["cat_type"].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">    
                    <p>Event Name:</p>
                    <input class="form-control" type="text" name="event_name" required="" />
                    <p>Event type:</p>
                    <input class="form-control" type="text" name="event_type" required="" />
                    <p>Description:</p>
                    <input class="form-control" type="text" name="event_desc" required="" />
                    <p>Date:</p>
                    <input class="form-control" type="datetime-local" name="event_date" required="" />
                    <p>Location:</p>
                    <input class="form-control" type="text" name="event_location" required="" /><br>
                    <input onclick="return(submitevent());" type="submit" name="submit"  class="btn btn-primary btn-block" value="Create event" />
                </div>
            </form>
    </div><br><hr>
            
<!------------------------------------ create category form ------------------------------------------->
    <div class="border">
        <h3>Create Category:</h3>
            <form id="form2" action="" method="post" id="addcategory">
                <div class="form-group">
                    <p>Category type:</p>
                    <input class="form-control" type="text" name="cat_type" required="" /><br>
                    <input onclick="return(submitcategory());" type="submit" name="submit2" class="btn btn-primary btn-block" value="Add new category" />
                </div>
            </form>
    </div><br><hr>
            
<!------------------------------------ add new admin ------------------------------------------------->
        <div class="border">
            <h3>Register Admin</h3>
            <form action="" method="post" id="regadmin">
                <div class="form-group">
                    <p>First Name:</p>
                    <input class="form-control" type="text" name="first_name" required="" />           
                    <p>Last Name:</p>
                    <input class="form-control" type="text" name="last_name" required="" />
                    <p>User Name:</p>
                    <input class="form-control" type="text" name="username" required="" />
                    <p>Date of borth:</p>
                    <input class="form-control" type="date" name="dob" required="" />
                    <p>Email:</p>
                    <input class="form-control" type="text" name="email" required="" />
                    <p>Password:</p>
                    <input class="form-control" type="password" name="pass" required="" /><br>
                    <input onclick="return(submitadminreg());" type="submit" name="submit3" class="btn btn-primary btn-block" value="Add new Admin" />
                </div>
            </form>
        </div><br>

<!------------------------------------ display all categories ------------------------------------------->
        <div class="border"><h3>Delete Categories here:</h3><br>
        <?php

        foreach($cat_rows as $row){
            echo"<div class='border'><div class='row'><a href='crud/categoriescrud/cat_delete.php?cat_id=" .$row['cat_id']."'>
            <button class='btn btn-danger' type='button'>Delete</button></a>
            <br><hr>";
            echo '<p value="'.$row["cat_id"].'">'.$row["cat_type"].'</p></div></div><br><hr>';

        }
        ?>
        </div>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>

<!-- javascript to handle the forms -->
<script src="web/js/admin.js" type="text/javascript"></script>
</body>
</html>