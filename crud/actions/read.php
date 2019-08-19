<?php
          require_once ("../../db_connect.php");
          session_start();
          
          $sql = "SELECT * FROM groups INNER JOIN comments on groups.group_id = comments.fk_groups_id INNER JOIN users on users.user_id = comments.fk_user_id WHERE comments.fk_groups_id =  ".$_SESSION["id"]." GROUP BY timestamp";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  " <div class=\"shadow-lg container mt-2\" id=\"com\"><div class=\"row d-flex align-items-center ml-2\"><img id=\"pic\" src=\"".$row['image_path']."\" height=\"70\" width=\"70\"><p class=\"ml-2\" id=\"from\">From: ".$row['first_name']."<br>".$row['email']."</p></div><hr id=\"hr-com\"><p class=\"ml-2\" id=\"show-com\">\"".$row['message']."\"</p>

                   		<span id=\"time\">".$row['timestamp']."</span>

                   		<a href='update_comment.php?id=" .$row['id']."'><button id=\"button\" class=\"text-center\" type='button'>Edit</button></a>
                   		<a href='delete_comment.php?id=" .$row['id']."'><button id=\"button\" class=\"text-center\" type='button'>Delete</button></a>
							
                   		
                   		</div>
                       		";
               }
           } else  {
               echo  '<div>No Comments Avaliable</div>';
           }
            ?>