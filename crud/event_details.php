<?php

ob_start();
include 'navbar.php';


$_SESSION["id"]=$_GET['id'];

require_once '../db_connect.php';



if ($_GET['id']) {
   echo $id = $_GET['id'];

   $sql = "SELECT * FROM events WHERE id = {$id}";
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="../css/event_details_style.css">


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <style>

    #nav{
  background: #343A40;
  background: -moz-radial-gradient(center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
  background: -webkit-radial-gradient(center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
  background: radial-gradient(ellipse at center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
}

#nav-title{
  color: #FFFFFF;
  text-shadow: 0 -1px 4px #FFF, 0 -2px 10px #335913, 0 -10px 20px #335913, 0 -18px 40px #335913;
}

#title{
  border-right: 1px solid;
  border-color: #6C6C6C;
  width: 21%; 
}

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

        html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 11px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
        height: 25px;
        border-style: solid;
        border-width: 1px;
        border-color: skyblue;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #target {
        width: 345px;
      }

        #drop{
      background-color: #3A4045;
      margin-right: 200px;
    }

    #drop-item:hover{
      background-color: #6C6D6D;
      border-bottom: solid 1px;
      border-top: solid 1px;
      border-color: black;
    }




    

    </style>


</head>
<body>


<?php
           if($id != null){

				$sql2 = "SELECT * FROM events WHERE id = ".$id."";
				  $result = $conn->query($sql2);	

				if($result->num_rows > 0){
				
				while($row = $result->fetch_array()){ 
				echo "	
					<div id=\"header\" class=\"mt-2\" style=\"background-image: url('".$row['event_pic']."');\"><div id=\"title_ev\"><h2 class=\"text-white\" id=\"event_name\">".$row['event_name']."</h2></div>
					</div>

					<div class=\"text-center mt-5\"><h3>We invite you to the ".$row['event_name']." show!</h3></div>


					<div class=\"container\">

						<div class=\"row d-flex justify-content-around mt-5\">
							
							<div class=\"col-5 shadow-lg\" id=\"column\">
								<h4 class=\"text-center mt-3\">Description</h4>
								<p> - Type of the Event: ".$row['event_type']."</p>
								<p>".$row['event_desc']."</p>
							</div>

							<div class=\"col-5 shadow-lg\" id=\"column\">
								<h4 class=\"text-center mt-3\">Location</h4>
								<p>Address: ".$row['event_location']."</p>
                <input id=\"pac-input\" class=\"controls\" type=\"text\" placeholder=\"Search for the Event\">
								<div id=\"map\">
                
								</div>

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

	  <input type= "hidden" name= "id" value= "<?php echo $data['id']; ?>"/>

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
       url: "actions/a_comments.php",
       type: "post",
       data: serializedData
   });


      request.done(function (response, textStatus, jqXHR){
          

                Swal.fire(
                  "Added!",
                  "Submited successfully!",
                  "success"
            );
            
            read();

      });





  });



  read();

   
function read(){

       request = $.ajax({
       url: "actions/read2.php",
       type: "post",
   });


      request.done(function (response, textStatus, jqXHR){
        document.getElementById("result").innerHTML=response;

      });

}
	


//maps

	function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    function initMap() {
  var center = {lat: 34.052235, lng: -118.243683};
  var locations = [
    ['Philz Coffee<br>\
    801 S Hope St A, Los Angeles, CA 90017<br>\
   <a href="https://goo.gl/maps/L8ETMBt7cRA2">Get Directions</a>',   34.046438, -118.259653],
    ['Philz Coffee<br>\
    525 Santa Monica Blvd, Santa Monica, CA 90401<br>\
   <a href="https://goo.gl/maps/PY1abQhuW9C2">Get Directions</a>', 34.017951, -118.493567],
    ['Philz Coffee<br>\
    146 South Lake Avenue #106, At Shoppers Lane, Pasadena, CA 91101<br>\
    <a href="https://goo.gl/maps/eUmyNuMyYNN2">Get Directions</a>', 34.143073, -118.132040],
    ['Philz Coffee<br>\
    21016 Pacific Coast Hwy, Huntington Beach, CA 92648<br>\
    <a href="https://goo.gl/maps/Cp2TZoeGCXw">Get Directions</a>', 33.655199, -117.998640],
    ['Philz Coffee<br>\
    252 S Brand Blvd, Glendale, CA 91204<br>\
   <a href="https://goo.gl/maps/WDr2ef3ccVz">Get Directions</a>', 34.142823, -118.254569]
  ];
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 9,
    center: center
  });
var infowindow =  new google.maps.InfoWindow({});
var marker, count;
for (count = 0; count < locations.length; count++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[count][1], locations[count][2]),
      map: map,
      title: locations[count][0]
    });
google.maps.event.addListener(marker, 'click', (function (marker, count) {
      return function () {
        infowindow.setContent(locations[count][0]);
        infowindow.open(map, marker);
      }
    })(marker, count));
  }
}



</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap&libraries=places&callback=initAutocomplete"
         async defer></script>

</body>
</html>

<?php  ob_end_flush(); ?>