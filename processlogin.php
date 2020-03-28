<?php
session_start();
include 'dbconnect.php';

	if(isset($_POST['submit']))
	{
		if(empty($_POST['adminemail']) || empty($_POST['password']))
		{
			header("location:login.php?Empty= Please Fill in the Blanks");
		}
		else
		{
			$password = md5($_POST['password']);
			$query = "SELECT * FROM tbl_admin WHERE adm_password = '$password' AND adm_email='".$_POST['adminemail']."'";
			$result = mysqli_query($conn, $query);

			if(mysqli_fetch_assoc($result))
			{
				$_SESSION['User'] = $_POST['adminemail'];
				header("location: index.php");
			}
			else
			{
				header("location: login.php?Invalid= Username or Password entered does not matched the records");
			}
		}
	} 
	else {
		echo 'Not working';
	}

?>
