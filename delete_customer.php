<?php
	$id = $_GET['id'];
	$lname = $_GET['lname'];
?>
<html>
	<head> 
		<title> Delete Confirm </title>
		<link rel="stylesheet" type="text/css" href="css/styles_supplier.css">
	</head>
	<body>
		<h1>Are you sure to delete <?php echo "$lname"?>?</h1>
		<br>
		<form action = "deletescus_confirm.php?id=<?php echo $id?>" method = "POST">
			<input class="delete" type="Submit" name="Submit" value="Yes">
		</form>
		<form action="index.php?page=Users">
			<button class="delete" type="submit"> No </button>
		</form>
	</body>
</html>