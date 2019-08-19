<?php

ob_start();

session_start();

require_once '../db_connect.php';
include 'navbar.php';



if ($_GET['id']) {
  $id = $_GET['id'];

   $sql = "SELECT * FROM users WHERE user_id = {$id}";
   $result = $conn->query($sql) or die ($conn->error);

   $data = $result->fetch_assoc();

   $imageURL = 'uploads/'.$data['image_path'];
}
else{
	$id = null;
}



$message = "";
    // check to see of ok button was pressed
    if(isset($_POST["ok"])){
        $safeDir = __DIR__.DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR;
        $filename = basename($_FILES['file_to_upload']['name']);
        $ext = substr($filename, strrpos($filename, '.') + 1);
        //check to see if upload parameter specified
        if(($_FILES["file_to_upload"]["error"]==UPLOAD_ERR_OK) && ($ext == "jpg") && ($_FILES["file_to_upload"]["type"] == "image/jpeg") && ($_FILES["file_to_upload"]["size"] < 70000000)){
            //check to make sure file uploaded by upload process
            if(is_uploaded_file($_FILES["file_to_upload"]["tmp_name"])){
                // capture filename and strip out any directory path info
                $fn = basename($_FILES["file_to_upload"]["name"]);
                //Build now filename with safty measures in place
                $copyfile = $safeDir."safe_prefix_secure_info".strip_tags($fn);
                //copy file to safe directory
                if(move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $copyfile)){
                    $message .= "<br>Successfully uploaded file $copyfile\n";
                    $img = "uploads/safe_prefix_secure_info".strip_tags($fn);
                } else {
                    // trap upload file handle errors
                    $message.="Unable to upload file ".$_FILES["file_to_upload"]["name"];
                }
            } else {
                $message .= "<br>File not uploaded";
            }
        }

        if ($_POST) {
   $firstName = $_POST['firstName'];
   $lastName = $_POST[ 'lastName'];
   $username = $_POST[ 'username'];
   $email = $_POST[ 'email'];
   $dob = $_POST['dob'];
  

   $id = $_POST['id'];

   $sql = "UPDATE users SET first_name = '$firstName', last_name = '$lastName', username = '$username', email = '$email', dob = '$dob', image_path = '$img' WHERE user_id = {$id}";
   if($conn->query($sql) === TRUE) {
       echo  "<a href='../books_admin.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}


    }
    $list = glob($safeDir . "*");



?>




<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>


	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="../css/event_details_style.css">


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.js"></script>

    <style>

       footer{
        margin-top: 70px;
        height: 100px;
        background: #343A40;
        background: -moz-radial-gradient(center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
        background: -webkit-radial-gradient(center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
        background: radial-gradient(ellipse at center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
      }

      #div-form{
        border-style: solid;
        border-width: 1px;
        border-color: #E5E5E5;
      }

      #legend-title{
        width: auto;
      }

      #input{
        margin-top: -10px;
      }

      .container{
        margin-top: 100px;
      }

    #pic{
        height: 500px;
        width: 600px;
        background-position: center;
        background-repeat: no-repeat;
    }
      
    </style>

    
</head>
<body>

 
    



<div class="container d-flex justify-content-between align-items-center">


  <fieldset class="col-6" id="div-form">
    <legend id="legend-title">Edit Profile</legend>

  <form name="edit" method="post" enctype="multipart/form-data" id="form">
   
  <div>
    <label>First Name:</label>
    <input class="col-11" id="input" type="text" name="firstName" placeholder="First Name" value="<?= $data['first_name']; ?>">
  </div>

  <div>
    <label class="mt-2">Last Name:</label>
    <input class="col-11" id="input" type="text" name="lastName" placeholder="Last Name" value="<?= $data['last_name']; ?>">
  </div>

  <div>
    <label class="mt-2">Username:</label>
    <input class="col-11" id="input" type="text" name="username" placeholder="Username" value="<?= $data['username']; ?>">
  </div>

  <div>
    <label class="mt-2">Email:</label>
    <input class="col-11" id="input" type="text" name="email" placeholder="Email" value="<?= $data['email']; ?>">
  </div>

  <div>
    <label class="mt-2">Date of birth:</label>
    <input class="col-11 mt-2" id="input" type="text" name="dob" placeholder="Date of Birth" value="<?= $data['dob']; ?>">
  </div>

  <div>
    <label class="mt-2">Photo:</label>
    <input class="col-11 mt-2" id="input" type="file" size="50" maxlength="255" name="file_to_upload" value=""/>
    <?php 
    
    echo "<img src=\"".$data['image_path']."\" height=\"30\" width=\"30\">"; 
    ?>
  </div>

  <button type="submit" name="ok" id="input" value="ok" class="btn btn-primary mt-4 mb-2">Change</button>

  <input type= "hidden" name= "id" value= "<?php echo $data['user_id']?>"/>


 </form>

 </fieldset> 

  <?php echo "<div class=\"shadow-lg img-fluid\" id=\"pic\" style=\"background-image: url('".$data['image_path']."');\">"?>

</div>


<footer>
  
</footer>


</body>
</html>