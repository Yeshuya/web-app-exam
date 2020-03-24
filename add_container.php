<?php
	include 'dbconnect.php';
?>

<link rel="stylesheet" type="text/css" href="css/styles_supplier.css">

<form method="POST" action="addcontainer_confirm.php">
	<h1> Add Container </h1>
	<br>
	<label for="txtCon"><b id="labeladd">Container: </b></label> 
	<div id="textbox">
		<input id="input" type="text" name="txtCon">
	</div>
	<br>
	<br>
	<label for="txtCost"><b id="labeladd">Cost: </b></label> 
	<div id="textbox">
		<input id="input" type="text" name="txtCost">
	</div>
	<br>
	<br>
	<button class="confirm2" type="submit" value="submit" name="Submit"> Submit </button>
</form>