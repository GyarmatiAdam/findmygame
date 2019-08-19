<?php
/************************************************************************
 * This is the registratin page.                                        *                              *
 ************************************************************************/

include_once 'include/class.user.php';

// Checking for user logged in or not
$user = new User(); 

//on submit user will be registered and can go to the login page
if (isset($_POST['submit'])){
    extract($_POST);
    $register = $user->reg_user(
        $first_name, 
        $last_name, 
        $username, 
        $dob, 
        $pass, 
        $email);
    if ($register) {
// Registration was success
    echo '<div class="alert alert-info" role="alert">Registration was successful, please <a href="login.php">Click here</a> to login</div>';
    } else {
// Registration has failed
    echo '<div class="alert alert-danger" role="alert">Registration failed. Email or Username already exits please try again</div>';
    }
}
?>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

        
        <!-- registration form starts from here -->
            <h2>Register</h2>

            <form action="" method="post" name="reg" enctype="multipart/form-data">

                <div class="form-group">
                    <input class="form-control mt-2" placeholder="First Name" type="text" name="first_name" required="" />
                    <input class="form-control mt-2" placeholder="Last Name" type="text" name="last_name" required="" />
                    <input class="form-control mt-2" placeholder="Username" type="text" name="username" required="" />
                    <input class="form-control mt-2" placeholder="Date of borth" type="date" name="dob" required="" />
                    <input class="form-control mt-2" placeholder="Email" type="text" name="email" required="" />
                    <input class="form-control mt-2" placeholder="Password" type="password" name="pass" required="" />
                    <input onclick="return(submitreg());" class="btn btn-primary btn-block mt-2" type="submit" name="submit" value="Register" value="ok" />
                    <a class="btn btn-secondary btn-block" href="login.php">Go to Login</a>
                </div>

            </form>
            
       

        

    </div>

   
<script src="web/js/security.js" type="text/javascript"></script>
</body>