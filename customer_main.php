<div>
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
			default:
				include ('list_customers.php');
				break;
		}
	?>
</div>	