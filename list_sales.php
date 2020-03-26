<?php
	include 'dbconnect.php';
	$search1 = (isset($_POST['search1']) && $_POST['search1'] != '') ? $_POST['search1'] : '';
	$search2 = (isset($_POST['search2']) && $_POST['search2'] != '') ? $_POST['search2'] : '';

	$total_payment = 0;


	if(isset($search1))
		{
			if(isset($search2))
				$sql = "SELECT * FROM tbl_orderline WHERE order_id IN (SELECT order_id FROM tbl_order WHERE order_date BETWEEN '$search1' AND '$search2')";
		}
	else{
		$sql = "SELECT * FROM tbl_orderline ORDER BY orderline_id ASC";
	}


	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>

<link rel="stylesheet" type="text/css" href="css/styles_product1.css">

</br>
</br>

<form method = "POST" action="index.php?page=Sales">
	<input class="search1" type="date" name ="search1"> 
	<input class="search2" type="date" name ="search2">
	<input class="submit" type="submit" name="submit" value="search">
</form>

</br>
</br>

	<table class="table">
		<tr>
			<th> CUSTOMER </th>
			<th> PRODUCT NAME </th>
			<th> QUANTITY </th>
			<th> COST </th>
		</tr>
<?php 
	while($row=mysqli_fetch_assoc($q))
	{
		$total_payment = $row['total_cost'] + $total_payment;
?>
		<tr>
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
			<td> <?php echo $row['con_name']; ?></td>
			<td> <?php echo $row['quantity']; ?> </td>
			<td> <?php echo $row['total_cost']; ?> </td>
		</tr>
<?php
	}
?>
		<tr>
			<td></td>
			<td></td>
			<td><label for="payment"><b id="labeladd">Total Sales: </b></label></td>
			<td><em id="text1">Php <?php echo $total_payment;?>.00</em></td>
		</tr>
	</table>
	<br>
	<br>
	<br>
	<br>
	
