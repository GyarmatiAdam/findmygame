<?php
/************************************************************************
 * This page only for admins                                            *
 * able to create, delete, update and display datas from                * 
 * users                                                                *
 ************************************************************************/

include_once 'navbar.php';



if ($_GET['user_id']) {
    $user_id = $_GET['user_id'];

?>

<!-------------------------------------- display html content --------------------------------------->
<html>
<head>
    <style>
        #cont{
            margin-top: 80px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-2 mt-5">
        <br><a href='../../admin.php'><button class='btn btn-dark' type='button'>Back</button></a><br><br>
        </div>

        <div class="col-sm-8" id="cont">
<!-------------------------------------- user details ------------------------------------------------>
            <?php
                    $sql1 = "SELECT * FROM users WHERE user_id = {$user_id}";

                    $result1 = $connect->query($sql1);
                     
                    if($result1->num_rows > 0) {
                        while($row1 = $result1->fetch_assoc()) {
            ?>
            <table class="table border">
                <thead>
                <tr>
                <th scope="col">Email</th>
                <th scope="col">Date of borth</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>

                </tr>
                </thead>
                <tbody>
                <?php


                    echo "<tr><td scope='row'>".$row1['email'] . "</td>";
                    echo "<td scope='row'>".$row1['dob'] . "</td>";
                    echo "<td scope='row'>".$row1['user_role'] . "</td>";
                    echo "<td scope='row'>".$row1['user_status'] . "</td></tr>";

                    }
                    } else  {
                        echo  '<div class="alert alert-danger" role="alert">There are no available user data.</div>';
                    }
                ?>
            </tbody>
            </table>
<!-------------------------------------- user group details ------------------------------------------------>
                    <?php
                    $sql2 = "SELECT * FROM grusers 
                            WHERE fk_user_id = {$user_id}";

                    $result2 = $connect->query($sql2);
                    
                    if($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                    ?>


            <table class="table border">
                <thead>
                <tr>
                <th scope="col">User groups:</th>

                </tr>
                </thead>
                <tbody>

                <?php
                    echo "<br><a href='user_gruser_delete.php?user_id=" .$user_id."'><button class='btn btn-danger' type='button'>Delete</button></a>";
                    echo "<tr><td scope='row'>".$row2['group_name'] . "</td></tr>";

                    }
                    } else  {
                        echo  '<div class="alert alert-danger" role="alert">This user has no group.</div>';
                    }
                ?>

                 </tbody>
            </table>

<!-------------------------------------- user event details ------------------------------------------------>
                    <?php
                    $sql3 = "SELECT * FROM events WHERE fk_user_id = {$user_id}";

                    $result3 = $connect->query($sql3);
                     
                    if($result3->num_rows > 0) {
                        while($row3 = $result3->fetch_assoc()) {

                    ?>

                <table class="table border">
                <thead>
                <tr>
                <th scope="col">User events:</th>

                </tr>
                </thead>
                <tbody>
                <?php
                    echo "<br><a href='user_details_delete.php?user_id=" .$user_id."'><button class='btn btn-danger' type='button'>Delete</button></a>";
                    echo "<tr><td scope='row'>".$row3['event_name'] . "</td></tr>";

                    }
                    } else  {
                        echo  '<div class="alert alert-danger" role="alert">This user do not have any event or comment</div>';
                    }
                    ?>

                     </tbody>
            </table>
<!-------------------------------------- user chats ------------------------------------------------>
                <?php $sql5 = "SELECT * FROM chats WHERE fk_user_id = {$user_id}";

                $result5 = $connect->query($sql5);
                
                if($result5->num_rows > 0) {
                    while($row5 = $result5->fetch_assoc()) {
                ?>

                <table class="table border">
                <thead>
                <tr>
                <th scope="col">User events:</th>

                </tr>
                </thead>
                <tbody>
                <?php
                        
                        echo "<br><a href='user_chat_delete.php?user_id=" .$user_id."'><button class='btn btn-danger' type='button'>Delete</button></a>";
                        echo "<tr><td scope='row'>".$row5['chat_date'] .' '.$row5['chat_text'] . "</td></tr>";

                    }
                    } else  {
                        echo  '<div class="alert alert-danger" role="alert">This user do not have any chat message</div>';
                    }


            }//close tag if ($_GET['user_id'])
            ?>
             </tbody>
            </table>

        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>
</body>