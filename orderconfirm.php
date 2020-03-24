<?php
	$id = $_GET['id'];
	$id_order = $_GET['order_id'];
	$pref = $_GET['pref'];
	if ($pref == "Walk-in"){
		$cash = $_POST['txtCash'];
	}
	$total_payment = 0.00;

	include 'dbconnect.php';

	$sql_customer = "SELECT * from tbl_customer WHERE cus_id = $id";
	$q_customer= mysqli_query($conn, $sql_customer) or die (mysqli_error($conn));
	$value = mysqli_fetch_assoc($q_customer);

	$sql_orderline = "SELECT * FROM tbl_orderline WHERE order_id = $id_order";
	$orderline_q = mysqli_query($conn, $sql_orderline) or die (mysqli_error($conn));

?>

<link rel="stylesheet" type="text/css" href="css/styles_container.css">

<form method="POST" action="index.php?page=Users">
<h1> Order Details </h1>
<hr style="width: 50%;">
<br>
<label><b id="labeladd">Customer Name: </b></label><em id="text"><?php echo $value['cus_FName'].' '.$value['cus_LName'];?></em>
<br>
<br>
<label><b id="labeladd">Address: </b></label><em id="text"><?php echo $value['cus_address'];?></em>
<br>
<br>
<label><b id="labeladd">Age: </b></label><em id="text"><?php echo $value['cus_age'];?> years old</em>
<br>
<br>
<label><b id="labeladd">Orders: </b></label>
<br>
<table style="border: none; margin-left: 58px;">
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
<?php 
if ($pref == "Walk-in"){
?>
<label><b id="labeladd">Cash: </b></label><em id="text">Php <?php echo $cash;?>.00</em>
<?php } else {}?>
<br>
<button class="buy3" type="submit" value="submit" name="Submit"> Submit </button>
</form>

