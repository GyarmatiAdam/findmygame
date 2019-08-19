<?php
session_start();

require_once '../../db_connect.php';

$sql = "SELECT chats.fk_group_id, chats.chat_text FROM chats JOIN groups ON chats.fk_group_id = groups.group_id WHERE fk_group_id = ".$_SESSION["group_id"].";";

    $result = $conn->query($sql);

    // if($result->num_rows > 0) {
    //         while($row = $result->fetch_assoc()) {
    //             echo "<div id='refresh'><div id='load_chat'><tr>""<th scope='1'>".$row['chat_text'] . "</th></tr></div></div><br>";
    //         }
    //     }
        

    $rows = $result->fetch_assoc();
    foreach($rows as $row){
        
        echo $row["chat_text"]."<br>";
    }





















    