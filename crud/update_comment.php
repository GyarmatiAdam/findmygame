<?php 

require_once '../db_connect.php';
include 'navbar.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM comments WHERE id = {$id}" ;
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();


}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/update.css">


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>

    	#e-form{
    		margin-left: 30px;
    		border-style: solid;
			border-width: 1px;
			border-color: #E5E5E5;
    	}
    	
    </style>

  

</head>
<body>

<header id="header" class="overlay">
	
</header><!-- /header -->



<div class="col-5 mt-5" id="e-form">

  	<form method="post" id="form">

	  <div class="form-group col-12">
	  	<label>Edit the Comment</label>
	  
	    <textarea type="text" name="message" class="form-control" rows="3" id="in-mess" placeholder="Subject"><?= $data['message']?></textarea>
	  </div>

	  <input type= "hidden" name= "id" value= "<?php echo $data['id']?>"/>

	  <button type="submit" class="mb-3 ml-3 btn btn-primary">Edit</button>

	</form>

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
       url: "actions/comment_update.php",
       type: "post",
       data: serializedData
   });


      request.done(function (response, textStatus, jqXHR){
          

                Swal.fire(
                  "Edited!",
                  "Your comment for the \"<?= $data['event_name']?>\" event is saved",
                  "success"
            );
            

      });





  });
</script>

</body>
</html>