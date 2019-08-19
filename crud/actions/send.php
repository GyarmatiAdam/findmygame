<?php 
 session_start();
 
 require_once '../../db_config.php';

$chat_text = isset($_POST['chat_text']) ? $_POST['chat_text'] : null;

// $sql="SELECT user_id FROM users"; join group table and fetch group id, than insert 
//into chats table

$query = "INSERT INTO chats (chat_text, fk_group_id, fk_user_id) VALUES ('$chat_text', ".$_SESSION['group_id'].", ".$_SESSION['user'].")";

if(mysqli_query($connect,$query)){
        echo "insert success";
}
?>