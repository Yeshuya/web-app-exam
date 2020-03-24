<?php
	$id = $_GET['id'];
	$id_order = $_GET['order_id'];
	$con_id = $_GET['con_id'];
	$quantity = $_POST['txtQuan'];
	$cash = $_POST['txtCash'];
	$cost = $_POST['txtCost'];
	$pref = $_POST['txtPref'];


	include 'dbconnect.php';

	if($cost < $cash) 
	{
		$sql_orderline = "INSERT INTO tbl_orderline (order_id, con_id, quantity, total_cost, preference)
						  VALUES ('$id_order', '$con_id', '$quantity', '$cost', '$pref')";
		$q_orderline = mysqli_query($conn, $sql_orderline) or die (mysqli_error($conn));
?>

		<link rel="stylesheet" type="text/css" href="css/styles_container.css">

		<br>
		<h1>Do you want to continue ordering?</h1>
		<br>
		<form action = "index.php?page=Users&action=buy_product&id=<?php echo $id;?>&order_id=<?php echo $id_order;?>" method = "POST">
			<input class="delete" type="Submit" name="Submit" value="Yes">
		</form>
		<form action="index.php?page=Products">
			<button class="delete" type="submit"> No </button>
		</form>		
<?php 
	} else {
?>
		<h1> Invalid Cash Input! </h1>
		<a href="index.php?page=Users&action=order_confirm&id=<?php echo $id;?>&order_id=<?php echo $id_order;?>"> <-Back </a>
<?php
	}
?>

