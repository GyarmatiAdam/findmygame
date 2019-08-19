<?php
include_once '../db_connect.php';

session_start();


//if(isset($_SESSION["admin"]) && isset($_SESSION["group_user"])){
//put the buuton to be hiiden
//}

$_SESSION["group_id"]= $_GET["id"];

if ($_GET['id']) {
  $id = $_GET['id'];

   $sql = "SELECT * FROM groups WHERE group_id = {$id}" ;
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();
}
else{
  $id = null;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  
</head>
<body class="bg-dark">




<div class="container mt-5 bg-dark">
  <h1 class="text-center text-light">Text Chat</h1>
    <div class=" rounded bg-light">
      <h5><div class="text-dark text-center" id="result"></div></h5>
  </div>
    <form id="sendMessage">
        <input class="form-control" type="text" name="chat_text" placeholder="Your message...">
        <br>
        <button type="submit" name="send" class="btn btn-dark">Send</button>
        <a href="group_details.php" class="btn btn-dark">Go Back to Group</a>
    </form>

<script>
       

var request;
read();
function read(){
    var request;

    request = $.ajax({
        url: "actions/read_chat.php",
        type: "post" 
    });
 
    request.done(function (response, textStatus, jqXHR,){
        document.getElementById("result").innerHTML=response;
    });
 
 
    request.fail(function (jqXHR, textStatus, errorThrown){
 
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
 
    request.always(function () {
 
        $inputs.prop("disabled", false);
    });
}
$("#sendMessage").submit(function(event){
   event.preventDefault();

   if (request) {
       request.abort();
   }

   var $form = $(this);

   var $inputs = $form.find("button, textarea");

   var serializedData = $form.serialize();
   $inputs.prop("disabled", true);

   request = $.ajax({
       url: "actions/send.php",
       type: "post",
       data: serializedData

   });

   request.done(function (response, textStatus, jqXHR){
       read();
   });


   request.fail(function (jqXHR, textStatus, errorThrown){

       console.error(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });

   request.always(function () {

       $inputs.prop("disabled", false);
   });

//reset the input field

   $("#sendMessage")[0].reset();
   
});
</script>
</body>
</html>


