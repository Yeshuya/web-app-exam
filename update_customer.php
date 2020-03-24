<?php
	$id = $_GET['id'];

	include 'dbconnect.php';

	$sql = "SELECT * FROM tbl_customer
			WHERE cus_id = $id";

	$q = mysqli_query ($conn, $sql) or die(mysqli_error($conn));

	$row = mysqli_fetch_assoc($q)
?>

<link rel="stylesheet" type="text/css" href="css/styles_supplier.css">

<form method="POST" action="updatecus_confirm.php?id=<?php echo $id;?>">
	<h1> Update Details </h1>
	<label for="txtFName"><b id="labeladd">First Name: </b></label> 
	<div id="textbox">
	<input id="input" type="text" value="<?php echo $row['cus_FName']?>" name="txtFName">
	</div>
	<br>
	<label for="txtLName"><b id="labeladd">Last Name: </b></label> 
	<div id="textbox">
	<input id="input" type="text" value="<?php echo $row['cus_LName']?>" name="txtLName">
	</div>
	<br>
	<label for="txtAge"><b id="labeladd">Age: </b></label> 
	<div id="textbox">
	<input id="input" type="text" value="<?php echo $row['cus_age']?>" name="txtAge">
	</div>
	<br>
	<label for="txtNumber"><b id="labeladd">Contact Number: </b></label>
	<div id="textbox">
	<input id="input" type="text" value="<?php echo $row['cus_contact']?>" name="txtNumber">
	</div>
	<br>
	<label for="txtAddress"><b id="labeladd">Address: </b></label>
	<div id="textbox">
	<input id="input" type="text" value="<?php echo $row['cus_address']?>" name="txtAddress">
	</div>
	<br>
	<button class="confirm" type="submit" value="submit" name="Submit"> Submit </button>
</form>
