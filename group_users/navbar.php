<?php 
session_start();
if(isset($_GET["logout"])){
		include_once 'include/class.user.php';
    $user = new User();
    header("Location: main_HomePage.php");
    $user->user_logout();

}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
	<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand text-white">
          <h3>Final Project Team D</h3>
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-light" href="main_HomePage.php">Home</a>
        </li>
        <?php if(isset($_SESSION['user_id']) !== ""){ ?>
        <li class="nav-item">
        	<form method="post">
        		<input type="submit" name="logout" value="Logout" class="btn btn-muted text-white">
        	</form> 
        </li>
        <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">Register</a>
        </li>
  
      </ul>
    </div>
  </div>
</nav>
</body>
</html>



