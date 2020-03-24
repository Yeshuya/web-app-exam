<?php
	include 'dbconnect.php';

	$sql = "SELECT * FROM tbl_order WHERE Preference LIKE 'Delivery' AND Status LIKE 'Not' OR Status LIKE 'Cancel'";
	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	$sql_orderline = "SELECT * FROM tbl_orderline";
	$q_orderline = mysqli_query($conn, $sql_orderline) or die (mysqli_error($conn));
	$fetch_orderline = mysqli_fetch_assoc($q_orderline)
?>

<link rel="stylesheet" type="text/css" href="css/styles_product.css">

</br>
</br>

<div class="customer1">
<h1> For Delivery</h1>
<hr style="width: 75%;">
</br>

	<table>
		<tr>
			<td> Order # </td>
			<td> Customer </td>
			<td> Address </td>
		</tr>
<?php 
	while($row=mysqli_fetch_assoc($q))
	{
?>
		<tr>
			<td> <?php echo $row['order_id']; ?> </td>
			<td> 
				<?php
					$order_id = $row['order_id'];
					$sql_order = "SELECT * FROM tbl_order WHERE order_id like '$order_id'";
					$q_order = mysqli_query($conn, $sql_order) or die (mysqli_error($conn));
					$o_fetch = mysqli_fetch_assoc($q_order);

					$cus_id = $o_fetch['cus_id'];
					$sql_customer = "SELECT * FROM tbl_customer WHERE cus_id like '$cus_id'";
					$q_customer = mysqli_query($conn, $sql_customer) or die (mysqli_error($conn));
					$c_fetch = mysqli_fetch_assoc($q_customer);

					echo $c_fetch['cus_FName'].' '.$c_fetch['cus_LName'];
				?>
			</td>
			<td> 
				<?php echo $c_fetch['cus_address']; ?> 
			</td>
			<td> 
				<a href = "index.php?page=Order&action=view&order_id=<?php echo $row['order_id']?>"> View </a> 
			</td>
		</tr>
<?php
	}
?>
	</table>
	<br>
</div>
<div class="customer2">
	<?php
		switch ($action)
		{
			case 'view':
				include ('view_delivery.php');
				break;
			case 'confirm':
				include ('deliveryprocess.php');
				break;
			default:
				break;
		}
	?>
</div>



	