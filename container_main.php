<div>
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
				include ('list_product.php');
				break;
		}
	?>
</div>	