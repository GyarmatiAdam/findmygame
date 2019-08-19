<?php
include_once 'a_get_grusers.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<title>Add Group Member</title>
</head>
<body>
	<?php include '../navbar.php'; ?>
	<main class="container mt-5">
		<div class="h3">Add user to group</div>
				
		<div class="row" id="result">
		
			<div class="col-md-12 mb-2 box">
				<div class="card-deck">
					<div class=" card mt-4 shadow-md">
					  	<div class="card-header h4"><?php echo $group['group_name']; ?></div>
					  	<div class="card-body">
					  		<form method="post" autocomplete="off">
								<div class="form-group">
									<label for="user_id">User ID</label>
									<input type="text" class="form-control keyup" name="userID" id="userID" placeholder="Insert ID">
								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input class="form-control checkName" type="text" name="username" >
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input class="form-control checkMail" type="text" name="email" disabled>
								</div>
								<div class="form-group">
									<label for="user_role">User Role</label>
									<select class="form-control" name="role" id="role" required>
										<option value="" selected></option>
										<option value="user">user</option>
										<option value="admin">admin</option>

									</select>
								</div>
								<div class="form-group">
									<label for="user_status">User Status</label>
									<select class="form-control" name="status" id="status" required>
										<option value="" selected=""></option>										
										<option value="applied">applied</option>										
										<option value="verified">verified</option>										
										<option value="removed">removed</option>
									</select>
								</div>
								<div class="form-group">
									<button type= 'button' class='btn btn-outline-warning add' id="">Add User</button>
								</div>
							</form>
					 	</div>
					</div>								
				</div>
			</div>
		   
		</div>
		
	</main>
<!-- include footer here -->
<script type="text/javascript" src="grusers.js"></script>
</body>
</html>

<?php  ob_end_flush(); ?>





