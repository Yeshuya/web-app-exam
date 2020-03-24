<?php
	include 'dbconnect.php';
	
	$id = $_GET['id'];
	$fname = $_POST['txtFName'];
	$lname = $_POST['txtLName'];
	$age = $_POST['txtAge'];
	$number = $_POST['txtNumber'];
	$addr = $_POST['txtAddress'];

	$sql = "UPDATE tbl_customer
			SET cus_FName = '$fname',
				cus_LName = '$lname',
				cus_age = '$age',
				cus_contact = '$number',
				cus_address = '$addr'
			WHERE cus_ID = '$id'";

	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	header("location: index.php?page=Users");
?>