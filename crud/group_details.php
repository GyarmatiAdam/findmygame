<?php

ob_start();
include 'navbar.php';


$_SESSION["id"]=$_GET['id'];

require_once '../db_connect.php';


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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="../css/event_details_style.css">


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>


    	#header{
			
			background-repeat: no-repeat;
			background-position: center top;
			background-size: 100% 550px;
			height: 550px;
			margin-top: -20px;
			display: flex;
			align-content: center;
			justify-content: center;
		}

		#title_ev{
			display: flex;
			align-items: flex-end;
			margin-bottom: 45px;
		}

		#event_name{
			color: #FFFFFF;
  			text-shadow: 0 -1px 4px #FFF, 0 -2px 10px #335913, 0 -10px 20px #335913, 0 -18px 40px #335913;
		}

		#column{
			height: 300px;
			width: 100%;
			margin: auto;
		}

		#map{
        	height: 60%;
        	width: 80%;
	        margin-left: auto;
	        margin-right: auto;
	        border-color: skyblue;
	        border-style: solid;
	        border-width: 1px;

      	}

      	#in{
      		height: 25px;
      		font-size: 13px;
      	}

      	#in-mess{
      		font-size: 13px;
      	}

      	.btn{
      		margin-left: 15px;
      	}

      	#from{
      		padding-top: 20px;
      		color: #585858;
      	}

      	#hr-com{
      		margin-bottom: 30px;
      	}

      	#show-com{
      		font-style: oblique;
      		color: 	#989898;
      		font-size: 14px;
      	}

      	#time{
      		font-style: oblique;
      		color: 	#989898;
      		font-size: 11px;
      	}

      	#button{
			width: 10%;
			font-size: 10px;
			margin-left: 2px;
      	}

      	#pic{
      		border-radius: 50%;
      	}




    

    </style>


</head>
<body>


<?php
           if($id != null){
          

				$sql2 = "SELECT * FROM groups WHERE group_id = ".$id."";
				  $result = $conn->query($sql2);	

				if($result->num_rows > 0){
				
				while($row = $result->fetch_array()){ 
				echo "	
					<div id=\"header\" class=\"mt-2\" style=\"background-image: url('".$row['groups_pic']."');\"><div id=\"title_ev\"><h2 class=\"text-white\" id=\"event_name\">".$row['group_name']."</h2></div>
					</div>

					<div class=\"text-center mt-5\"><h3>We invite you to the ".$row['group_name']." group!</h3></div>


					<div class=\"container\">

						<div class=\"row d-flex justify-content-around mt-5\">
							
							<div class=\"col-5 shadow-lg\" id=\"column\">
								<h4 class=\"text-center mt-3\">Description</h4>
								<p> - A short description: ".$row['group_desc']."</p>
							</div>

							<div class=\"col-5 shadow-lg\" id=\"column\">
								<h4 class=\"text-center mt-3\">".$row['group_name']."</h4>
								<p> - Vacancy: ".$row['vacancy_desc']."</p>
                <p> - Vacancy number: ".$row['vacancy_number']."</p>
                <p> - Created: ".$row['created']."</p>
								
							</div>

							


						</div>

					</div>"

					; 

				} 
			}else{
				echo 'Could not run query: ' . mysqli_error();
    			exit;
			}
}
?>


<div class="container">
	
<?php echo '<a href="chat.php?id= '.$id.' ><button value="" type="submit">Go chat</button></a>';?>

<h4 class="mt-5">Comments</h4>

<hr>


<div class="row ml-2">

	<div class="col-7 mt-2" id="result">

		
		
	</div>

  <div class="col-5">

  	<form method="post" id="form">

	  <div class="form-group col-12">
	  	<label>Leave here a comment</label>
	    <textarea type="text" name="message" class="form-control" rows="3" id="in-mess" placeholder="Subject"></textarea>
	  </div>

	  <input type= "hidden" name= "id" value= "<?php echo $data['group_id']?>"/>

	  <button type="submit" class="btn btn-primary">Post</button>

	</form>

  </div>

</div>

</div>

<footer>
	
</footer>

 

<script>

//create comment


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
       url: "actions/groups_comments.php",
       type: "post",
       data: serializedData
   });


      request.done(function (response, textStatus, jqXHR){
          

                Swal.fire(
                  "Added!",
                  "Submited successfully!",
                  "success"
            );

                read1();
            

      });





  });



read1();

   
function read1(){

       request = $.ajax({
       url: "actions/read.php",
       type: "post",
   });


      request.done(function (response, textStatus, jqXHR){
        document.getElementById("result").innerHTML=response;  

      });

}

</script>



</body>
</html>

<?php  ob_end_flush(); ?>