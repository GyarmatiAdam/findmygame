<?php 

require_once '../../db_connect.php';

if ($_POST) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $desc = $_POST[ 'desc'];
   $date = $_POST[ 'date'];
   $location = $_POST[ 'location'];
   $pic = $_POST['pic'];
  

   $id = $_POST['id'];

   $sql = "UPDATE events SET event_name = '$name', event_type = '$type', event_desc = '$desc', event_date = '$date', event_location = '$location', event_pic = '$pic' WHERE id = {$id}";
   if($conn->query($sql) === TRUE) {
       echo  "<a href='../books_admin.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>