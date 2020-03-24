<?php
	include 'dbconnect.php';
	$order_id = $_GET['order_id'];
	$total_payment = 0.00;

	$sql_ord = "SELECT * FROM tbl_orderline WHERE preference like 'Delivery' AND delivered like 'No' AND order_id like '$order_id'";
	$q_ord = mysqli_query($conn, $sql_ord) or die (mysqli_error($conn));
	$fetch = mysqli_fetch_assoc($q_ord);

	$sql = "SELECT * FROM tbl_orderline WHERE preference like 'Delivery' AND delivered like 'No' AND order_id like '$order_id'";
	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	$order_id = $fetch['order_id'];

	$orderline_id = $fetch['orderline_id'];

	$sql_order = "SELECT * FROM tbl_order WHERE order_id like '$order_id'";
	$q_order = mysqli_query($conn, $sql_order) or die (mysqli_error($conn));
	$o_fetch = mysqli_fetch_assoc($q_order);

	$cus_id = $o_fetch['cus_id'];
	$sql_customer = "SELECT * FROM tbl_customer WHERE cus_id like '$cus_id'";
	$q_customer = mysqli_query($conn, $sql_customer) or die (mysqli_error($conn));
	$c_fetch = mysqli_fetch_assoc($q_customer);

	$sql_delivery = "SELECT * FROM tbl_delivery WHERE orderline_id like '$orderline_id'";
	$q_del = mysqli_query($conn, $sql_delivery) or die (mysqli_error($conn));
	$d_fetch = mysqli_fetch_assoc($q_del);
?>

<link rel="stylesheet" type="text/css" href="css/styles_container.css">

	<form method="POST" action="index.php?page=Order&action=confirm&&order_id=<?php echo $order_id;?>">
		<h1> Order Container </h1>
		<hr style="width: 45%;">
		<h2 style="margin-left:-573px;"> Customer Details: </h2>
		<label><b id="labeladd">Customer Name: </b></label><em id="text"><?php echo $c_fetch['cus_FName'].' '.$c_fetch['cus_LName'];?></em>
		<br>
		<label><b id="labeladd">Address: </b></label><em id="text"><?php echo $c_fetch['cus_address'];?></em>
		<br>
		<label><b id="labeladd">Delivery Due: </b></label><em id="text"><?php echo $d_fetch['delivery_due'];?></em>
		<br>
		<label><b id="labeladd">Status: </b></label><em id="text">
			<?php 
				if($o_fetch['Status'] == "Not")
				{
					echo "Not Delivered";
				} 
				else if($o_fetch['Status'] == "Cancel")
				{
					echo "Order Cancelled";
				}
			?></em>
		<br>
		<h2 style="margin-left:-600px;"> Order #: <?php echo $order_id?></h2>
		<table style="border: none; margin-left: 58px;">
			<tr>
				<td> <b>Container Name</b> </td>
				<td> <b>Quantity</b> </td>
				<td> <b>Cost</b> </td>
			</tr>
			<?php 
				while($orderline_fetch=mysqli_fetch_assoc($q))
				{
					$total_payment = $orderline_fetch['total_cost'] + $total_payment;
			?>
					<tr>
						<td> <?php echo $orderline_fetch['con_name']; ?> </td>
						<td> <?php echo $orderline_fetch['quantity']; ?> </td>
						<td><em> Php <?php echo $orderline_fetch['total_cost']; ?> </em></td>
					</tr>
			<?php
				}
			?>
			<tr>
				<td></td>
				<td><label for="payment"><b id="labeladd" style="margin-left:-40px;">Total Payment: </b></label></td>
				<td><em id="text1">Php <?php echo $total_payment;?>.00</em></td>
			</tr>
	</table>
	<br>
	<label for="txtCash"><b id="labeladd">Cash: </b></label> 
	<div id="textbox">
		<input id ="inputcash" type="number" name="txtCash" min="<?php echo $total_payment;?>">
	</div>
		<button class="buy3" type="submit" value="submit" name="Submit"> Submit </button>
	</form>



