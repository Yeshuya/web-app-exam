<?php
	include 'dbconnect.php';
	
	$id = $_GET['id'];
	$Name = $_POST['txtName'];
	$Cost = $_POST['txtCost'];

	$sql = "UPDATE tbl_container
			SET con_name = '$Name',
				con_cost = '$Cost'
			WHERE con_id = '$id'";

	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	header("location: index.php?page=Products");
?>