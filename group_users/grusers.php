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
	<title>Group Members</title>
</head>
<body>
	<main class="container mt-5">
		<div class="h3"><?php echo $group['group_name']?> - Members</div>
		<div class="text-right"><a href="grusers_add.php?id=<?php echo $group['group_id']?>"><button type= 'button' class='btn btn-outline-warning edit'>Add User</button></a></div>
		
		<div class="row" id="result">
		<?php foreach($members as $member): ?>
			<div class="col-md-3 mb-2 box">
				<div class="card-deck">
					<div class=" card mt-4 shadow-md">
					  	<div class="card-header"></div>
					  	<div class="card-body">
					    	<!-- <h4 class="card-title"><?php echo $member['username']?></h4>
					    	<h6 class="card-subtitle mb-2 text-muted">Vacancies <?php echo $member['vacancy_number']?></h6>-->
					    	<p class="card-text"> 
								<?php echo $member['username']?>
					    	</p>
					    	<a href="grusers_add.php?id=<?php echo $member['fk_user_id']?>"><button type= 'button' class='btn btn-outline-warning edit'>Edit</button></a>
					    	<button type= 'button' class='btn btn-outline-warning delete' id="<?php echo $member['fk_group_id']?>_<?php echo $member['fk_user_id']?>">Delete</button>
					 	</div>
					</div>								
				</div>
			</div>
		<?php endforeach; ?>   
		</div>
		
	</main>
<!-- include footer here -->
<script type="text/javascript" src="grusers.js"></script>
</body>
</html>

<?php  ob_end_flush(); ?>





