<?php
	$id = $_GET['id'];
	$id_order = $_GET['order_id'];
	$pref = $_GET['pref'];
	$con_id = $_POST['txtContainer'];
	$quantity = $_POST['txtQuan'];

	include 'dbconnect.php';

	$sql_container = "SELECT * FROM tbl_container WHERE con_id = $con_id";
	$con_q = mysqli_query($conn, $sql_container) or die (mysqli_error($conn));
	$container_fetch = mysqli_fetch_assoc($con_q);

	$name = $container_fetch['con_name'];

	$total_cost = $quantity * $container_fetch['con_cost'];

	$Date = date("Y-m-d");
	$DevDate =  date('Y-m-d', strtotime($Date. ' + 3 days'));

	if($pref == "Delivery"){
		$sql_orderline = "INSERT INTO tbl_orderline (order_id, con_id, con_name, quantity, total_cost, preference, delivered)
					  VALUES ('$id_order', '$con_id', '$name', '$quantity', '$total_cost', '$pref', 'No')";
		$q_orderline = mysqli_query($conn, $sql_orderline) or die (mysqli_error($conn));

		$sql_getID = "SELECT LAST_INSERT_ID() as ID";
		$q_getID = mysqli_query($conn, $sql_getID) or die (mysqli_error($conn));
		$getID_fetch = mysqli_fetch_assoc($q_getID);
		$orderline_id = $getID_fetch['ID'];

		$sql_delivery = "INSERT INTO tbl_delivery (orderline_id, order_date, delivery_due)
					  VALUES ('$orderline_id', '$Date', '$DevDate')";
		$q_delivery = mysqli_query($conn, $sql_delivery) or die (mysqli_error($conn));

		$sql_order = "SELECT * FROM tbl_order WHERE order_id = $id_order";
		$ord_q = mysqli_query($conn, $sql_order) or die (mysqli_error($conn));
		$ord_fetch = mysqli_fetch_assoc($ord_q);

		if(is_null($ord_fetch['delivery'])){
			$sql_order = "UPDATE tbl_order
						SET Status = 'Not'
					  	WHERE order_id = $id_order";
			$q_order = mysqli_query($conn, $sql_order) or die (mysqli_error($conn));
		}else{}
	} else if ($pref == "Walk-in"){
		$sql_orderline = "INSERT INTO tbl_orderline (order_id, con_id, con_name, quantity, total_cost, preference, delivered)
					  VALUES ('$id_order', '$con_id', '$name', '$quantity', '$total_cost', '$pref', '')";
		$q_orderline = mysqli_query($conn, $sql_orderline) or die (mysqli_error($conn));

		$sql_order = "SELECT * FROM tbl_order WHERE order_id = $id_order";
		$ord_q = mysqli_query($conn, $sql_order) or die (mysqli_error($conn));
		$ord_fetch = mysqli_fetch_assoc($ord_q);
	}
	header("location: index.php?page=Users&action=buy_product&id=$id&order_id=$id_order&pref=$pref");
?>

