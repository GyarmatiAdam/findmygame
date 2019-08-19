<?php 
session_start();
include_once '../../include/class.user.php';
if(isset($_POST["logout"])){
    $user = new User();
    header("Location: login.php");
    $user->user_logout3();
}
          
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <link rel="stylesheet" type="text/css" href="../adam.css">

  <style>

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

     #img{
      border-radius: 50%;
    }
    
  </style>
</head>
<body>
	<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="nav">
  
    <a class="navbar-brand text-white ml-4" id="title">
          <h4 id="nav-title">Final Project Team D</h4>
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-1">
        <li class="nav-item">
          <a class="nav-link text-light" href="../../main_HomePage.php">Home</a>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['admin'])){ ?>

        <li class="nav-item">
          <a class="nav-link nav-item text-white" href="../../admin.php">Admin</a>
        </li>
      <?php } ?>
        <?php if(isset($_SESSION['user']) || isset($_SESSION['group_user']) || isset($_SESSION['admin'])){ 

           if(isset($_SESSION["admin"])){
        $id = $_SESSION["admin"];
      }elseif(isset($_SESSION["user"])){
        $id =$_SESSION["user"];
      }

            $sql = "SELECT * FROM users WHERE user_id = ".$id."";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();

          ?>

        <li class="nav-item">
          <form method="post">
            <img src="../<?= $row['image_path']; $row['username']?>" alt="Profile Photo" height="35" id="img">
            <input type="submit" name="logout" value="Logout" class="btn btn-muted text-white">
          </form> 
        </li>

       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Account
        </a>
        <div class="dropdown-menu" id="drop" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item text-light" id="drop-item" href="../crud/edit_profile.php">Edit Profile</a>
        </div>
      </li>

    <?php } else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">Register</a>
        </li>
  <?php } ?>
      </ul>
    </div>

  </nav>
</body>
</html>



