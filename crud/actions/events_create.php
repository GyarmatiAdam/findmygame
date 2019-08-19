<?php 

require_once '../../db_connect.php';

if ($_POST) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $desc = $_POST[ 'desc'];
   $date = $_POST[ 'date'];
   $location = $_POST[ 'location'];
   $pic = $_POST['pic'];

   $sql = "INSERT INTO events (event_name, event_type, event_desc, event_date, event_location, event_pic) VALUES ('$name', '$type', '$desc', '$date', '$location', '$pic')";

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