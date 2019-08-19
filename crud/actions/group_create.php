<?php 

require_once '../../db_connect.php';

if ($_POST) {
   $name = $_POST['name'];
   $desc = $_POST[ 'desc'];
   $vacancy_number = $_POST[ 'vacancy_number'];
   $vacancy_desc = $_POST[ 'vacancy_desc'];
   $pic = $_POST['pic'];

   $sql = "INSERT INTO groups (group_name, group_desc, vacancy_number, vacancy_desc, groups_pic) VALUES ('$name', '$desc', $vacancy_number, '$vacancy_desc', '$pic')";

   if($conn -> query($sql) === TRUE) {
       echo '<script type="text/javascript">
          
          
                $( document ).ready(function() {
                Swal.fire(
                  "Created",
                  "The CD is saved in the Database",
                  "success"
            )
            });
          
          </script>';
          echo  "<a href='../cd_admin.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error " .$sql. ' ' . $conn->conn_error;
   }

   $conn->close();
}





?>