<?php 
	
require_once '../../db_connect.php';
session_start();
if ($_POST) {
   $message = $_POST['message'];
   $id = $_POST['id'];

   if(isset($_SESSION["admin"])){
        $user_id = $_SESSION["admin"];
      }elseif(isset($_SESSION["user"])){
        $user_id =$_SESSION["user"];
      }
  

   $sql = "INSERT INTO comments (message, fk_event_id, fk_user_id) VALUES ('$message', $id,".$_SESSION['admin']." )";

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