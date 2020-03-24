<?php
	$id = $_GET['id'];
	$name = $_GET['name'];
?>
<html>
	<head> 
		<title> Delete Confirm </title>
		<link rel="stylesheet" type="text/css" href="css/styles_supplier.css">
	</head>
	<body>
		<h1>Are you sure to delete <?php echo "$name"?>?</h1>
		<br>
		<form action = "deletescon_confirm.php?id=<?php echo $id?>" method = "POST">
			<input class="delete" type="Submit" name="Submit" value="Yes">
		</form>
		<form action="index.php?page=Products">
			<button class="delete" type="submit"> No </button>
		</form>
	</body>
</html>