<?php
	include 'dbconnect.php';
?>

<link rel="stylesheet" type="text/css" href="css/styles_supplier.css">

<form method="POST" action="addcustomer_confirm.php">
	<h1> Add Customer </h1>
	<label for="txtFName"><b id="labeladd">First Name: </b></label> 
	<div id="textbox">
			<input id="input" type="text" name="txtFName">	
	</div>
	<br>
	<label for="txtLName"><b id="labeladd">Last Name: </b></label> 
	<div id="textbox">
			<input id="input" type="text" name="txtLName">
	</div>
	<br>
	<label for="txtAge"><b id="labeladd">Age: </b></label> 
	<div id="textbox">
			<input id="input" type="text" name="txtAge">
	</div>
	<br>
	<label for="txtNumber"><b id="labeladd">Contact Number: </b></label> 
	<div id="textbox">
			<input id="input" type="text" name="txtNumber">
	</div>
	<br>
	<label for="txtAddress"><b id="labeladd">Address: </b></label> 
	<div id="textbox">
			<input id="input" type="text" name="txtAddress">
	</div>	
	<br>
	<button class="confirm" type="submit" value="submit" name="Submit"> Submit </button>
</form>