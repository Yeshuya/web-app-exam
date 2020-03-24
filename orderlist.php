<?php
	include 'dbconnect.php';
	$search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : '';


	if(isset($search))
		$sql = "SELECT * FROM tbl_orderline WHERE preference like '%$search%'";
	else
		$sql = "SELECT * FROM tbl_orderline";

	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>

<link rel="stylesheet" type="text/css" href="css/styles_product.css">

</br>
</br>

<form method = "POST" action="index.php?page=Order">
	<input class="search" type="text" name ="search">
	<input class="submit" type="submit" name="submit" value="search">
</form>

</br>
</br>

	<table>
		<tr>
			<td> Orderline ID </td>
			<td> Order ID </td>
			<td> Conntainer ID </td>
			<td> Quantity </td>
			<td> Total Cost </td>
			<td> Preference </td>
		</tr>
<?php 
	while($row=mysqli_fetch_assoc($q))
	{
?>
		<tr>
			<td> <?php echo $row['orderline_id']; ?> </td>
			<td> <?php echo $row['order_id']; ?></td>
			<td> <?php echo $row['con_id']; ?> </td>
			<td> <?php echo $row['quantity']; ?> </td>
			<td> <?php echo $row['total_cost']; ?> </td>
			<td> <?php echo $row['preference']; ?> </td>
		</tr>
<?php
	}
?>
	</table>
	