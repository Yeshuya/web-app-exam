<?php
	include 'dbconnect.php';

	$FName = $_POST['txtFName'];
	$LName = $_POST['txtLName'];
	$Age = $_POST['txtAge'];
	$Num = $_POST['txtNumber'];
	$Addr = $_POST['txtAddress'];

	$sql = "INSERT INTO tbl_customer (cus_FName, cus_LName, cus_age, cus_contact, cus_address)
			VALUES ('$FName', '$LName', '$Age', '$Num', '$Addr')";

	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	header("location: index.php?page=Users");

?>