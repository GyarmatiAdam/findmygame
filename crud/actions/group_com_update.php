<?php 

require_once '../../db_connect.php';

if ($_POST) {
   $message = $_POST['message'];
  

   $id = $_POST['id'];

   $sql = "UPDATE comments SET message = '$message' WHERE id = {$id}";
   if($conn->query($sql) === TRUE) {
       echo  "<a href='../books_admin.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>