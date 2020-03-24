<?php
	$id = $_GET['id'];
	$id_order = $_GET['order_id'];
	$pref = $_GET['pref'];
	$total_payment = 0.00;

	include 'dbconnect.php';

	$sql_customer = "SELECT * from tbl_customer WHERE cus_id = $id";
	$q_customer= mysqli_query($conn, $sql_customer) or die (mysqli_error($conn));
	$value = mysqli_fetch_assoc($q_customer);

	$sql_container = "SELECT * from tbl_container";
	$q_container= mysqli_query($conn, $sql_container) or die (mysqli_error($conn));

	$sql_orderline = "SELECT * FROM tbl_orderline WHERE order_id = $id_order";
	$orderline_q = mysqli_query($conn, $sql_orderline) or die (mysqli_error($conn));
?>

<link rel="stylesheet" type="text/css" href="css/styles_container.css">

<div class="buy1">
	<form method="POST" action="order_process.php?id=<?php echo $id;?>&order_id=<?php echo $id_order;?>&pref=<?php echo $pref;?>">
		<h1> Order Container </h1>
		<hr style="width: 75%;">
		<h2> Customer Details </h2>
		<label><b id="labeladd">Customer Name: </b></label><em id="text"><?php echo $value['cus_FName'].' '.$value['cus_LName'];?></em>
		<br>
		<label><b id="labeladd">Age: </b></label><em id="text"><?php echo $value['cus_age'];?></em>
		<br>
		<label><b id="labeladd">Address: </b></label><em id="text"><?php echo $value['cus_address'];?></em>
		<br>
		<br>
		<hr style="width: 75%;">
		<h2> Order </h2>
		<label for="txtContainer"><b id="labeladd">Container: </b></label>
		<div id="textbox">
			<select id="select" type="text" name="txtContainer">
				<option value="" selected> ---Containers--- </option>
				<?php
					while($row=mysqli_fetch_assoc($q_container)){
				?>
				<option value="<?php echo $row['con_id']; ?>"> <?php echo $row['con_name'];?> </option>
				<?php
					}
				?>
			</select>
		</div>
		<label for="txtQuan"><b id="labeladd">Quantity: </b></label> 
		<div id="textbox">
		<input id ="input" type="text" name="txtQuan">
		</div>
		<button class="buy" type="submit" value="submit" name="Submit"> Submit </button>
	</form>
</div>

<div class="buy2">
	<form method ="POST" action="index.php?page=Users&action=order_confirm&id=<?php echo $id;?>&order_id=<?php echo $id_order;?>&pref=<?php echo $pref;?>">
	<h1> Order List </h1>
	<hr style="width: 75%;">
	<h2> Products </h2>
	<table style="border: none;">
			<tr>
				<td> <b>Container Name</b> </td>
				<td> <b>Quantity</b> </td>
				<td> <b>Cost</b> </td>
			</tr>
			<?php 
				while($orderline_fetch=mysqli_fetch_assoc($orderline_q))
				{
					$total_payment = $orderline_fetch['total_cost'] + $total_payment;
			?>
					<tr>
						<td> <?php echo $orderline_fetch['con_name']; ?> </td>
						<td> <?php echo $orderline_fetch['quantity']; ?> </td>
						<td> Php <?php echo $orderline_fetch['total_cost']; ?> </td>
						<td> 
							<a href = "deleteorder.php?id=<?php echo $orderline_fetch['orderline_id'];?>&order_id=<?php echo $id_order;?>&id_cus=<?php echo $id;?>&pref=<?php echo $pref;?>"> Delete </a>
						</td>
					</tr>
			<?php
				}
			?>
	</table>
	<br>
	<br>
	<label for="payment"><b id="labeladd">Total Payment: </b></label>Php <em id="text"><?php echo $total_payment;?>.00</em>
	<br>
	<br>
	<?php 
		if ($pref == "Walk-in"){
	?>
	<label for="txtCash"><b id="labeladd">Cash: </b></label> 
	<div id="textbox">
		<input id ="inputcash" type="number" name="txtCash" min="<?php echo $total_payment;?>">
	</div>
	<?php } else {}?>
	<button class="buy" type="submit" value="submit" name="Submit"> Submit </button>
	</form>
</div>

