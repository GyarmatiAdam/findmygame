<?php 
error_reporting(0);
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'findmygame');

	// initialize variables
	$group_id = 0;
	$group_name = "";
	$group_desc = "";
	$update = false;

	if (isset($_POST['save'])) {
		$group_name = $_POST['group_name'];
		$group_desc = $_POST['group_desc'];
		mysqli_query($db, "INSERT INTO groups (group_name, group_desc)VALUES ('$group_name', '$group_desc')"); 
		$_SESSION['msg'] = "Group saved"; 
		header('location: groups.php');
	}
?>

	<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>

<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>

	<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Number</th>
			<th>Type</th>
			<th>Description</th>
			<th>Adress</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['restName']; ?></td>
			<td><?php echo $row['restNumber']; ?></td>
			<td><?php echo $row['restType']; ?></td>
			<td><?php echo $row['restDesc']; ?></td>
			<td><?php echo $row['restAdress']; ?></td>


			<td>
				<a href="restaurant.php?edit=<?php echo $row['restID']; ?>" class="edit_btn">Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['restID']; ?>" class="del_btn">Delete</a>
			</td>


		</tr>
	<?php } ?>
</table>

	<form method="post" action="server.php" >
		<input type="hidden" name="restID" value="<?php echo $restID; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="restName" value="<?php echo $restName; ?>">
		</div>
		<div class="input-group">
			<label>Number</label>
			<input type="text" name="restNumber" value="<?php echo $restNumber; ?>">
		</div>
		<div class="input-group">
			<label>Type</label>
			<input type="text" name="restType" value="<?php echo $restType; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="restDesc" value="<?php echo $restDesc; ?>">
		</div>
		<div class="input-group">
			<label>Adress</label>
			<input type="text" name="restAdress" value="<?php echo $restAdress; ?>">
		</div>
		
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save">Save</button>
<?php endif ?>
			<a class="btn" href="home.php">Go Back</a>
		</div>
	</form>
</body>
</html>

