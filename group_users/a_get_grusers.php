<?php
include_once '../db_connect.php';

/*$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if($con->connect_error) {
      die("connection failed: " . $con->connect_error);
}*/

if($_GET['id']) {
    $id = $_GET['id'];

$sql ="SELECT grusers.fk_group_id, grusers.fk_user_id, grusers.gruser_role, grusers.gruser_status, users.username FROM grusers ";
$sql .= "INNER JOIN users ON grusers.fk_user_id = users.user_id ";
$sql .= "WHERE grusers.fk_group_id = $id AND grusers.gruser_status = 'verified';";

$sql2 = "SELECT * FROM groups WHERE group_id = ".$id;

$query = mysqli_query($conn, $sql);
$query2 = mysqli_query($conn, $sql2);

$group = mysqli_fetch_array($query2);

$members = array();

while ($row = mysqli_fetch_array($query))
{
    $members[] = $row;            
} 

return $members;
}

$conn->close();