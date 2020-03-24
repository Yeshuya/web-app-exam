<?php
	$id = $_GET['id'];
	
	include 'dbconnect.php';
	$sql = "DELETE FROM tbl_container
			WHERE con_id = $id";
	$q = mysqli_query ($conn, $sql) or die(mysqli_error($conn));
	
	header("location: index.php?page=Products");
?>