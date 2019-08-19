<?php 

require_once '../../db_connect.php';

if ($_POST) {
   $name = $_POST['name'];
   $desc = $_POST[ 'desc'];
   $vacancy_number = $_POST[ 'vacancy_number'];
   $vacancy_desc = $_POST[ 'vacancy_desc'];
   $pic = $_POST['pic'];
  

   $id = $_POST['id'];

   $sql = "UPDATE groups SET group_name = '$name', group_desc = '$desc', vacancy_number = $vacancy_number, vacancy_desc = '$vacancy_desc', groups_pic = '$pic' WHERE group_id = {$id}";
   if($conn->query($sql) === TRUE) {
       echo  "<a href='../books_admin.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>