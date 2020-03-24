<?php
session_start();
$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

if(isset($_SESSION['User']))
{
?>


<!DOCTYPE html>
<html>
	<head>
		<title> Whyte Waters </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<a href="index.php?page=Home"> <img src="images/Header.jpg"> </a>
		</div>
		<div class="topnav_container">
			<div class="topnav">
				<a href="index.php?page=Users"> Customers </a>
				<a href="index.php?page=Products"> Products </a>
				<a href="index.php?page=Order"> For Delivery </a>
				<a href="index.php?page=Sales"> Sales Report </a>
				<a href="logout.php?logout"> Log-out </a>			
			</div>
		</div>
		<div class="content">
			<?php
				switch ($page)
				{
					case 'Users':
						include ('list_customers.php');
						break;
					case 'Products':
						include ('list_product.php');
						break;
					case 'Order':
						include ('list_delivery.php');
						break;
					case 'Sales':
						include ('list_sales.php');
						break;
					default:
						include ('list_customers.php');
						break;
				}
			?>	
		</div>	
		<div class="footer">
            <p><center style="font-size: 20 px; margin-top: 5px; color: white">Members: </center></p>
            <center style="color: white">| Panganiban | Tan | Vaflor | BSIT2-A | </center></p>
			<p><center style="font-size: 20 px; margin-top: 5px; color: white"> Copyright @ 2019. Whyte Waters </center></p>
        </div>	
	</body>
</html>	

<?php
}
else 
{
	header("location: login.php");
}
?>				