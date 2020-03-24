<?php
	$id_orderline = $_GET['id']; 
	$id_cus = $_GET['id_cus'];
	$id_order = $_GET['order_id'];
	$pref = $_GET['pref'];
	
	include 'dbconnect.php';

	$sql_one = "DELETE FROM tbl_orderline
			WHERE orderline_id = $id_orderline";
	$q_one = mysqli_query ($conn, $sql_one) or die(mysqli_error($conn));

	header("location: index.php?page=Users&action=buy_product&id=$id_cus&order_id=$id_order&pref=$pref");
?>