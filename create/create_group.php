<?php 
include_once '../include/class_grouplist.php'; 
$sql = "SELECT * from categories";
$result = mysqli_query($db, $sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

if(isset($_GET["update"])){
	$id = $_GET["update"];
	$sql = "SELECT * from groups WHERE group_id = {$id}";
	$result = mysqli_query($db, $sql);
	$data= $result->fetch_assoc();
}
?>
<style>
	form, .content {
  width: 40%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Group Creation</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css"> 
</head>
<body class="bg-dark">
	<div class="headergroup">
		<h2>Group Creation</h2>
	</div>
<div class="bdy">
	<?php if($_GET["update"]) {?>
		<form method="post">
		<input type="hidden" name="group_id" value="<?php echo $data['group_id']; ?>">
		<div class="input-group">
			<label>Group Name</label>
			<input type="text" name="group_name" value="<?php echo $data['group_name']; ?>">
		</div>
		<div class="input-group">
			<label>Group Description</label>
			<input type="text" name="group_desc" value="<?php echo $data['group_desc']; ?>">
		</div>
		<div class="input-group">
			<label>Category Type</label>
			<select name="cat_type">
				<?php foreach ($rows as $row) {
					if($row["cat_id"] == $data["fk_cat_id"]){
						echo "<option value='".$row['cat_id']."' selected>".$row['cat_type']."</option>";
					}else {
						echo "<option value='".$row['cat_id']."'>".$row['cat_type']."</option>";
					}
					
				} ?>
			</select>
		</div>
		<div class="input-group">
			<label>Vacancy Description</label>
			<input type="text" name="vacancy_desc" value="<?php echo $data['vacancy_desc']; ?>">
		</div>
		<div class="input-group">
			<label>Vacancy Number</label>
			<input type="text" name="vacancy_number" value="<?php echo $data['vacancy_number']; ?>">
		</div>		
		<div class="input-group">
			
			<input type="submit" name="update">
			<a class="btn" href="../main_HomePage.php">Go Back</a>
		</div>
	</form>

<?php } else {?>
	<form method="post">
		<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
		<div class="input-group">
			<label>Group Name</label>
			<input type="text" name="group_name" value="<?php echo $group_name; ?>">
		</div>
		<div class="input-group">
			<label>Group Description</label>
			<input type="text" name="group_desc" value="<?php echo $group_desc; ?>">
		</div>
		<div class="input-group">
			<label>Category Type</label>
			<select name="cat_type" id="user_type">
				<?php foreach ($rows as $row) {
					echo "<option value='".$row['cat_id']."'>".$row['cat_type']."</option>";
				} ?>
			</select>
		</div>
		<div class="input-group">
			<label>Vacancy Description</label>
			<input type="text" name="vacancy_desc" value="<?php echo $vacancy_desc; ?>">
		</div>
		<div class="input-group">
			<label>Vacancy Number</label>
			<input type="text" name="vacancy_number" value="<?php echo $vacancy_number; ?>">
		</div>		
		<div class="input-group">
			
	<button class="btn" type="submit" name="save">Save</button>

			<a class="btn" href="../main_HomePage.php">Go Back</a>
		</div>
		<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>
	</form>

<?php } ?>
</div>
</body>
</html>