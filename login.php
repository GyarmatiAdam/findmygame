<?php
/************************************************************************
 * This is the login page		                                        *
 ************************************************************************/
session_start();

include_once 'include/class.user.php';
	$user = new User();

	if (isset($_POST['submit'])) {
		extract($_POST);
	    $login = $user->check_login($email, $password);
	    if ($login) {
	    // login successfully
			echo '<div class="alert alert-info" role="alert">You are now logged in.<a href="login.php">Click here</a> to login</div>';
			} else {
		// login has failed
			echo '<div class="alert alert-danger" role="alert">Login was unsuccessful, please try again!</div>';
			}
    }
?>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

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

body{
    display: flex;
    align-items: center;
    justify-content: center;
}

footer{
  margin-top: 70px;
  height: 100px;
  background: #343A40;
  background: -moz-radial-gradient(center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
  background: -webkit-radial-gradient(center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
  background: radial-gradient(ellipse at center, #343A40 0%, #6E6E6E 0%, #343A40 100%);
}

#buttons{
	display: flex;
	align-items: center;
	justify-content: space-between;
}

#login{
	margin-left: 16%;
}

#reg{
	margin-right: 16%;
}
		
	</style>
</head>
<body>


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
          <a class="nav-link nav-item disabled" href="#">Home</a>
        </li>
    </ul>
    </div>

</nav>




   
			<div id="cont" class="col-5">

				<h2>Login Here:</h2>

				<form action="" method="post" name="login">

					<div class="form-group">
						<input class="form-control mt-2" type="text" name="email" placeholder="Email" required="" />
						<input class="form-control mt-2" type="password" name="password" placeholder="Password" required="" />
						<div id="buttons">
						<input class="btn btn-primary btn-block mt-2 col-4" onclick="return(submitlogin());" type="submit" name="submit" value="Login" id="login" />
						<a class="btn btn-secondary btn-block col-4" id="reg" href="registration.php">Go to register</a>
					</div>
					</div>

				</form>

			</div>
			
	
<script src="web/js/security.js" type="text/javascript"></script>
</body>