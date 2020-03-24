<?php
	include 'dbconnect.php';

	$Con = $_POST['txtCon'];
	$Cost = $_POST['txtCost'];

	$sql = "INSERT INTO tbl_container (con_name, con_cost)
			VALUES ('$Con', '$Cost')";

	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	header("location: index.php?page=Products");

?>