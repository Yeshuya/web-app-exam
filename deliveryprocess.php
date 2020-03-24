<?php
	$id_order = $_GET['order_id'];

	include 'dbconnect.php';

	$sql = "SELECT * FROM tbl_orderline";
	$q = mysqli_query($conn, $sql_orderline) or die (mysqli_error($conn));
	$fetch = mysqli_fetch_assoc($q);

	while($row=mysqli_fetch_assoc($q)){
		$sql_orderline = "UPDATE tbl_orderline 
					  	  SET delivered = 'Yes'
					  	  WHERE order_id LIKE '$id_order' AND preference LIKE 'Delivery'";
		$ord_q = mysqli_query($conn, $sql_orderline) or die (mysqli_error($conn));

	}

	$sql_order = "UPDATE tbl_order
				  SET Status = 'Done'
				  WHERE order_id = '$id_order'";
	$order_q = mysqli_query($conn, $sql_order) or die (mysqli_error($conn));
?>

<html>
	<head> 
		<link rel="stylesheet" type="text/css" href="css/styles_supplier.css">
	</head>
	<body>
		<h1>Product Delivered!</h1>
		<br>
		<form action = "index.php?page=Order">
			<input class="delete" type="Submit" value="Confirm">
		</form>
	</body>
</html>

