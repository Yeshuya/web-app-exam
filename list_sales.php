<?php
	include 'dbconnect.php';
	$search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : '';


	if(isset($search))
		$sql = "SELECT * FROM tbl_customer WHERE cus_LName like '%$search%' OR cus_FName like '%$search%'";
	else
		$sql = "SELECT * FROM tbl_customer";

	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>

<link rel="stylesheet" type="text/css" href="css/styles_product1.css">

</br>
</br>

<form method = "POST" action="index.php?page=Sales">
	<input class="search" type="text" name ="search">
	<input class="submit" type="submit" name="submit" value="search">
</form>

</br>
</br>

	<table class="table" style="width: 100%;">
		<tr>
			<td> Product Name </td>
			<td> Quantity </td>
			<td> Cost </td>
		</tr>
<?php 
	while($row=mysqli_fetch_assoc($q))
	{
?>
		<tr>
			<td> <?php echo $row['cus_LName']. ", " . $row['cus_FName']; ?> </td>
			<td> <?php echo $row['cus_age']; ?></td>
			<td> <?php echo $row['cus_contact']; ?> </td>
			<td> <?php echo $row['cus_address']; ?> </td>
			<td> 
				<a href = "index.php?page=Users&action=delete_customer&id=<?php echo $row['cus_id'];?>&lname=<?php echo $row['cus_LName'];?>"> Delete </a> 
			</td>
			<td> 
				<a href = "index.php?page=Users&action=update_customer&id=<?php echo $row['cus_id'];?>"> Edit </a> 
			</td>
			<td> 
				<a href = "processorder.php?id=<?php echo $row['cus_id'];?>"> Buy </a> 
			</td>
		</tr>
<?php
	}
?>
	</table>
	<br>
	<br>
<a href="index.php?page=Users&action=add_customer"> + Add another customer</a>
	