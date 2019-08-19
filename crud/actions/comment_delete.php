<?php 

require_once '../../db_connect.php';

if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM comments WHERE id = {$id}";
    if($conn->query($sql) === TRUE) {
       echo "<a href='../books_admin.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>