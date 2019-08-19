<?php


include_once '../../db_connect.php';
 
$name = $_POST["name"];

if(!$name){
    $sql = "SELECT * FROM groups";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($row as $value){
          echo  "
                          <div class=\"mt-4 col-3 ml-1 shadow-lg\"> 
                              <img id=\"pic\" class=\"card-img-top\" src=\"".$value['groups_pic']."\">

                              <div class=\"card-body\">

                                <h4 class=\"card-title text-center mt-2\">".$value['group_name']."</h4>
                                <p class=\"m-3\"><".$value['group_desc']."</p>
                                <h6 class=\"card-subtitle mb-2 text-center\">Location<br>".$value['vacancy_desc']."</h6>
                                <div class=\"d-none d-lg-block d-md-block img\">
                                  <img src=\"\"> 
                                </div>

                                <div class=\"row\">
                                <a href='crud/event_details.php?id" .$value['id']."'><button class=\"col-12 btn btn-info mb-2 \" type='button'>See Event</button></a><div class=\"col-12\"></div>

                                <a href='crud/update_event.php?id=" .$value['id']."'><button class=\"col-12 btn btn-primary\" type='button'>Edit</button></a>
                                <a href='crud/delete_event.php?id=" .$value['id']."'><button class=\"col-12 offset-1 btn btn-danger ml-1\" type='button'>Delete</button></a></div>

                          </div>
                        </div>";
               }
}else{
$sql = "SELECT * FROM groups WHERE group_name LIKE '%".$name."%'";
$result = mysqli_query($conn, $sql);

$count = $result->num_rows;


if($count == 1 ){
    $row = $result->fetch_assoc();
    echo  "
                          <div class=\"mt-4 col-3 ml-1 shadow-lg\"> 
                              <img id=\"pic\" class=\"card-img-top\" src=\"".$row['groups_pic']."\">

                              <div class=\"card-body\">

                                <h4 class=\"card-title text-center mt-2\">".$row['group_name']."</h4>
                                <p class=\"m-3\"><".$row['group_desc']."</p>
                                <h6 class=\"card-subtitle mb-2 text-center\">Location<br>".$row['vacancy_desc']."</h6>
                                <div class=\"d-none d-lg-block d-md-block img\">
                                  <img src=\"\"> 
                                </div>

                                <div class=\"row\">
                                <a href='crud/event_details.php?id" .$row['id']."'><button class=\"col-12 btn btn-info mb-2 \" type='button'>See Event</button></a><div class=\"col-12\"></div>

                                <a href='crud/update_event.php?id=" .$row['id']."'><button class=\"col-12 btn btn-primary\" type='button'>Edit</button></a>
                                <a href='crud/delete_event.php?id=" .$row['id']."'><button class=\"col-12 offset-1 btn btn-danger ml-1\" type='button'>Delete</button></a></div>

                          </div>
                        </div>";
               

}elseif($count > 1){
    $row = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($row as $val) {
              echo  "
                          <div class=\"mt-4 col-3 ml-1 shadow-lg\"> 
                              <img id=\"pic\" class=\"card-img-top\" src=\"".$val['groups_pic']."\">

                              <div class=\"card-body\">

                                <h4 class=\"card-title text-center mt-2\">".$val['group_name']."</h4>
                                <p class=\"m-3\"><".$val['group_desc']."</p>
                                <h6 class=\"card-subtitle mb-2 text-center\">Location<br>".$val['vacancy_desc']."</h6>
                                <div class=\"d-none d-lg-block d-md-block img\">
                                  <img src=\"\"> 
                                </div>

                                <div class=\"row\">
                                <a href='crud/event_details.php?id" .$val['id']."'><button class=\"col-12 btn btn-info mb-2 \" type='button'>See Event</button></a><div class=\"col-12\"></div>

                                <a href='crud/update_event.php?id=" .$val['id']."'><button class=\"col-12 btn btn-primary\" type='button'>Edit</button></a>
                                <a href='crud/delete_event.php?id=" .$val['id']."'><button class=\"col-12 offset-1 btn btn-danger ml-1\" type='button'>Delete</button></a></div>

                          </div>
                        </div>";
               }
} else {
    echo "<h4>No match found</h4>";
}

}
 
// close connection
mysqli_close($conn);
?>