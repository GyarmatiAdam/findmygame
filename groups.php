<?php

ob_start();

require_once 'db_connect.php';
include 'navbar.php';



?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/events.css">


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>


<header id="header" class="overlay">
	
</header><!-- /header -->




<main class="container">
  
  <div class="mt-5 row">
    <input class="col-5 offset-7" id="search" type="text" autocomplete="off" placeholder="Search Group..." name="name"/>
  </div>

  <hr>

	<div class="row d-flex justify-content-around" id="result">
		
		<?php
           $sql = "SELECT * FROM groups";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "
                       		<div class=\"mt-4 col-3 ml-1 shadow-lg\"> 
              								<img id=\"pic\" class=\"card-img-top\" src=\"".$row['groups_pic']."\" height=\"175\">

              								<div class=\"card-body\">

              									<h4 class=\"card-title text-center mt-2\">".$row['group_name']."</h4>
              									<p class=\"m-3\"><".$row['group_desc']."</p>
              									<h6 class=\"card-subtitle mb-2 text-center\">Vacancy<br>".$row['vacancy_number']."</h6>
              									<div class=\"d-none d-lg-block d-md-block img\">
              									</div>

                                <div class=\"row\">
                                <a href='crud/group_details.php?id=" .$row['group_id']."'><button class=\"col-12 btn btn-info mb-2 \" type='button'>See Event</button></a><div class=\"col-12\"></div>

              									<a href='crud/update_group.php?id=" .$row['group_id']."'><button class=\"col-12 btn btn-primary\" type='button'>Edit</button></a>
                                <a href='crud/delete_group.php?id=" .$row['group_id']."'><button class=\"col-12 offset-1 btn btn-danger ml-1\" type='button'>Delete</button></a></div>

          								</div>
          							</div>";
               }
           } else  {
               echo  '<div class="bg-danger">No Data Avaliable</div>';
           }
            ?>
		
	</div>


	<hr id="events-hr">


	<fieldset class="col-6" id="legend">

   <legend id="title-legend">Add a Group</legend>


	


   <form class="row d-flex justify-content-center" id="form">
       
          <input class="col-11" id="input" type="text" name="name" placeholder="Group Name">

          <textarea class="col-11 mt-3" id="area" type="text" name= "desc" placeholder="Description"></textarea>

          <input class="col-11 mt-3" id="input" type="number" name="vacancy_number" placeholder="Vacancy Number">

          <textarea class="col-11 mt-3" id="area" type="text" name="vacancy_desc" placeholder="Vacancy description"></textarea>

          <input class="col-11 mt-3" type="text" name="pic" id="input" placeholder="Link of the image">
          
          <button class="col-3 mt-3 btn btn-primary" type ="submit">Insert Group</button>

   </form>


 

</fieldset>



</main>


	<footer>
		
	</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
       url: "crud/actions/group_create.php",
       type: "post",
       data: serializedData
   });


      request.done(function (response, textStatus, jqXHR){
          

                Swal.fire(
                  "Added!",
                  "You added the Event \"<?= $data['event_name']?>\" in Database",
                  "success"
            );
            

      });





  });


  //search input


  var request1;


  $("#search").keyup(function(event){

  
    event.preventDefault();

   
   if (request1) {
       request1.abort();
   }
  
   var $form = $(this);

   
   var $inputs = $form.find("input, select, button, textarea");

   
   var serializedData = $form.serialize();

   $inputs.prop("disabled", true);

   request1 = $.ajax({
       url: "crud/actions/groups_search.php",
       type: "post",
       data: serializedData
   });

   request1.done(function (response, textStatus, jqXHR){
     
    document.getElementById('result').innerHTML = response;

   });

   // Callback handler that will be called on failure
   request1.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
       console.error(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });

   // Callback handler that will be called regardless
   // if the request failed or succeeded
   request1.always(function () {
       // Reenable the inputs
       $inputs.prop("disabled", false);
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
