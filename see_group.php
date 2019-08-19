<?php 
	$db = mysqli_connect('localhost', 'root', '', 'findmygame');
	$sql = "SELECT * from groups JOIN categories ON categories.cat_id = groups.fk_cat_id";
	$result = mysqli_query($db, $sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include 'navbar.php'; ?>

<main class="container">
	<div class="row" id="g_list">
		<?php foreach($rows as $row) {?>
		<!------------ Start -  Container for single Group ------------>
			<div class="col-lg-3 col-md-4 col-sm-12 p-6 mt-4 box">
				<div class=" card mt-4 shadow-md">
					<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
				  	<div class="card-header"><?php echo $row['group_name']?></div>
				  	<div class="card-body">
				    	<h5 class="card-title"><?php echo $row['cat_type']?></h5>
				    	<hr>
				    	<p class="card-text"><?php echo $row['group_desc']?></p>
				    	<hr>
				    	<p class="card-text"><?php echo $row['vacancy_desc']?></p>
				    	<p class="card-text"><?php echo $row['vacancy_number']?></p>
				    	<a href="#!" class="card-link">Apply</a>
				    	<a href="include/class_grouplist.php?del=<?php echo $row['group_id']; ?>" class="card-link">Delete</a>
				    	<a href="create/create_group.php?update=<?php echo $row['group_id']; ?>" class="card-link">Edit</a>
				 	</div>
				</div>
			</div>		
		<?php } ?>
		<!------------ End - Container for single Event ------------>
	</div>
</main>
<!-- include footer here -->
</body>
</html>