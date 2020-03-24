<?php
	$id = $_GET['id'];
	$pref = $_GET['pref'];

	include 'dbconnect.php';

	$sql_order = "INSERT INTO tbl_order (cus_id, order_date, Preference)
				  VALUES ('$id', NOW(), '$pref')";

	$q_order= mysqli_query($conn, $sql_order) or die (mysqli_error($conn));

	$sql_getID = "SELECT LAST_INSERT_ID() as ID";
	$q_getID = mysqli_query($conn, $sql_getID) or die (mysqli_error($conn));
	$getID_fetch = mysqli_fetch_assoc($q_getID);
	$id_order = $getID_fetch['ID'];

	header("location: index.php?page=Users&action=buy_product&id=$id&order_id=$id_order&pref=$pref");

?>