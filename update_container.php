<?php
	$id = $_GET['id'];

	include 'dbconnect.php';

	$sql = "SELECT * FROM tbl_container
			WHERE con_id = $id";

	$q = mysqli_query ($conn, $sql) or die(mysqli_error($conn));

	$row = mysqli_fetch_assoc($q)
?>

<link rel="stylesheet" type="text/css" href="css/styles_supplier.css">

<form method="POST" action="updatecon_confirm.php?id=<?php echo $id;?>">
	<h1> Update Details </h1>
	<br>
	<label for="txtName"><b id="labeladd">Container: </b></label> 
	<div id="textbox">
		<input id="input" type="text" value="<?php echo $row['con_name']?>" name="txtName">
	</div>
	<br>
	<br>
	<label for="txtCost"><b id="labeladd">Cost: </b></label> 
	<div id="textbox">
		<input id="input" type="text" value="<?php echo $row['con_cost']?>" name="txtCost">
	</div>
	<br>
	<button class="confirm2" type="submit" value="submit" name="Submit"> Submit </button>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
