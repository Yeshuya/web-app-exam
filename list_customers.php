<?php
	include 'dbconnect.php';
	$search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : '';


	if(isset($search))
		$sql = "SELECT * FROM tbl_customer WHERE cus_LName like '%$search%' OR cus_FName like '%$search%'";

	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>

<link rel="stylesheet" type="text/css" href="css/styles_product.css">

</br>
</br>

<div class="customer1">
<h1> Customer List</h1>
<form method = "POST" action="index.php?page=Users">
	<input class="search" type="text" name ="search">
	<input class="submit" type="submit" name="submit" value="search">
</form>

</br>
</br>

	<table>
		<tr>
			<td> Name </td>
		</tr>
<?php 
	while($row=mysqli_fetch_assoc($q))
	{
?>
		<tr>
			<td> <?php echo $row['cus_LName']. ", " . $row['cus_FName']; ?> </td>
			<td> 
				<a href = "index.php?page=Users&action=delete_customer&id=<?php echo $row['cus_id'];?>&lname=<?php echo $row['cus_LName'];?>"> Delete </a> 
			</td>
			<td> 
				<a href = "index.php?page=Users&action=update_customer&id=<?php echo $row['cus_id'];?>"> Edit </a> 
			</td>
			<td> 
				<a href = "index.php?page=Users&action=buy&id=<?php echo $row['cus_id'];?>&pref=Walk-in"> <img class="img" src="images/walk.png">  </a> 
			</td>
			<td> 
				<a href = "index.php?page=Users&action=buy&id=<?php echo $row['cus_id'];?>&pref=Delivery"> <img class="img" src="images/del.png"> </a> 
			</td>
		</tr>
<?php
	}
?>
	</table>
	<br>
	<br>
<a href="index.php?page=Users&action=add_customer"> + Add another customer</a>
</div>
<div class="customer2">
	<?php
		switch ($action)
		{
			case 'add_customer':
				include ('add_customer.php');
				break;
			case 'delete_customer':
				include ('delete_customer.php');
				break;
			case 'update_customer':
				include ('update_customer.php');
				break;
			case 'buy_product':
				include ('buycontainer.php');
				break;
			case 'order_confirm':
				include ('orderconfirm.php');
				break;
			case 'buy':
				include ('processorder.php');
				break;
			default:
				include ('add_customer.php');
				break;
		}
	?>
</div>


	