<?php 

ob_start();

require_once '../db_connect.php';
include 'navbar.php';


if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM groups WHERE group_id = {$id}";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style.css">


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>



<header id="header" class="overlay">
	
</header><!-- /header -->

<div class="container">

<fieldset class="col-4" id="legend">
   <legend>Delete Group</legend>

   <hr>

<form id="form">

   <input type="hidden" name= "id" value="<?php echo $data['group_id'] ?>" />
   <button class="col-3 btn btn-danger">Delete</button>

</form>
</fieldset>

</div>

<footer>
	
</footer>

<script>


	var request;
  
  $('#form').submit(function(event){


     event.preventDefault();


      if (request) {
       request.abort();
   }


     var $form = $(this);

   
     var $inputs = $form.find("input, select, button, textarea");

   
     var serializedData = $form.serialize();


       request = $.ajax({
       url: "actions/group_delete.php",
       type: "post",
       data: serializedData
   });


      request.done(function (response, textStatus, jqXHR){
          

                Swal.fire(
                  "Deleted!",
                  "Deleted successfully",
                  "success"
            );
            

      });





  });


//the header with images


	var counter = 0;
function changepic () {
	var slides = ["https://cdn.pixabay.com/photo/2017/08/07/20/49/events-2607706_1280.jpg","https://cdn.pixabay.com/photo/2015/09/18/11/34/fireworks-945386_1280.jpg","https://cdn.pixabay.com/photo/2018/05/31/11/54/celebration-3443779_1280.jpg","https://cdn.pixabay.com/photo/2015/03/17/15/21/cafe-677895_1280.jpg"];
	//var random = Math.floor(Math.random()*3);
	if (counter < 3){
		counter = counter+1;
	} else {counter=0};
	
	console.log(slides);
	console.log(counter);
	//console.log(random);
    document.getElementById("header").style.backgroundImage = "url("+slides[counter]+")";
}
setInterval(function(){changepic()}, 4000);

</script>

</body>
</html>


<?php  ob_end_flush(); ?>








