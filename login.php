
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles_login.css">'
	</head>
	<div class="wrapper">	
	</div>	
	<div class="login">
		<form method="POST" action="processlogin.php">
			<h1> LOG-IN </h1>
			<label for="email_login"><b>Username: </b></label>
			</br>
			<input class="email_login" type="text" name ="adminemail" placeholder="    Enter Username"/>
			</br>
			</br>
			<label for="password_login"><b>Password: </b></label>
			</br>
			<input class="password_login" type="password" name ="password" placeholder="    Enter Password"/>
			<?php
				if(@$_GET['Empty']==true)
				{
					echo $_GET['Empty'];
				}

				else if(@$_GET['Invalid']==true)
				{
					echo $_GET['Invalid'];
				}
			?>
			</br>
			</br>
			<div>
			<input class="button" type="submit" name="submit" value="Submit"/>
			</div>
		</form>	
	</div>
</html>
