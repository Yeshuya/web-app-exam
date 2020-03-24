<?php
	include 'dbconnect.php';
	$search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : '';

	if(isset($search))
		$sql = "SELECT * FROM tbl_container WHERE con_name like '%$search%'";
	else
		$sql = "SELECT * FROM tbl_container";

	$q = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>

<link rel="stylesheet" type="text/css" href="css/styles_product.css">

</br>
</br>

<div class="customer1">
<h1> Product List</h1>
<form method = "POST" action="index.php?page=Products">
	<input class="search" type="text" name ="search">
	<input class="submit" type="submit" name="submit" value="search">
</form>

</br>
</br>

<table>
		<tr>
			<td> <b>Container Name</b> </td>
			<td> <b>Container Cost</b> </td>
		</tr>
<?php 
	while($row=mysqli_fetch_assoc($q))
	{
?>
		<tr>
			<td> <?php echo $row['con_name']; ?> </td>
			<td> Php <?php echo $row['con_cost']; ?> </td>
			<td> 
				<a href = "index.php?page=Products&action=delete_container&id=<?php echo $row['con_id'];?>&name=<?php echo $row['con_name'];?>"> Delete </a> 
			</td>
			<td> 
				<a href = "index.php?page=Products&action=update_container&id=<?php echo $row['con_id'];?>"> Edit </a> 
			</td>
		</tr>
<?php
	}
?>
</table>
	<br>
	<br>
<a href="index.php?page=Products&action=add_container"> + Add another container</a>
</div>
<div class="customer2">
	<?php
		switch ($action)
		{
			case 'add_container':
				include ('add_container.php');
				break;
			case 'delete_container':
				include ('delete_container.php');
				break;
			case 'update_container':
				include ('update_container.php');
				break;
			default:
				include ('add_container.php');
				break;
		}
	?>
</div>