<?php
include_once 'a_get_grusers.php';

// get info user_id from session - Adam

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
		<div class="h3">Apply to group</div>
				
		<div class="row" id="result">
		
			<div class="col-md-12 mb-2 box">
				<div class="card-deck">
					<div class=" card mt-4 shadow-md">
					  	<div class="card-header h4"><?php echo $group['group_name']; ?></div>
					  	<div class="card-body">					  		
							<form id="contact" action="https://formspree.io/ --- load admin mail address --- " method="post" autocomplete="off">
								<span class="d-none" name="userID"><!-- User ID from session --></span>
								<div class="alert alert-success d-none" role="alert">
    								<strong id="success"></strong>
								</div>
                              	<fieldset class="form-group">
									<label for="user_role">Name</label>
                               		<input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required="">
                              	</fieldset>
                              	<fieldset class="form-group">
									<label for="user_role">Email</label>
                                	<input name="_replyto" type="email" class="form-control" id="email" placeholder="Email" required="">
                              	</fieldset>
                              	<fieldset class="form-group">
									<label for="user_role">Message</label>
                                	<textarea name="message" rows="6" class="form-control" id="message" placeholder="Message" required=""></textarea>
                              	</fieldset>
                              	<fieldset class="form-group">
									<label for="user_role"></label>
                                	<button type="submit" id="form-submit" valu="Send" class="btn btn-outline-warning apply">Send Message</button>
                              	</fieldset>
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





