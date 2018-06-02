<?php

function login()
{
	global $connection;

	if (!is_null($_POST['email']) and !is_null($_POST['password']))
	{

		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$query = "SELECT * FROM `students` WHERE email='$email' and password='$password'";
		
		$result = mysqli_query($connection, $query);
		
		$count = mysqli_num_rows($result);
		
		if($count<=0)
		{
			$query = "SELECT * FROM `teachers` WHERE email='$email' and password='$password'";
			
			$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
			
			$count = mysqli_num_rows($result);
			if ($count == 1)
			{
				$foundResult = mysqli_fetch_assoc($result);
				
				$_SESSION['email'] = $email;
				
				$_SESSION['username'] = $foundResult['name'];
				$_SESSION['is_sb'] = $foundResult['is_sb'];
				
				$_SESSION['isTeacher'] = True;
			}
		}
		

		if ($count == 1)
		{			
			$_SESSION['email'] = $email;
			
			$_SESSION['username'] = $foundResult['name'];

			require_once(APP_PATH.'/views/home.php');
			
		}
		else
		{

			
			echo "<script> alert('Gebruikers gegevens niet correct');</script>";
			
			require_once(APP_PATH.'/views/login.php');
		}
	}
	else
	{
		if(getUserType() >0)
		{
			require_once(APP_PATH.'/views/home.php');
		}
		else
		{
			echo "<script> alert('Vul uw gebruikers gegevens in.');</script>";
			
			require_once(APP_PATH.'/views/login.php');
		}
	}
}

function logout()
{
	if(!isset($_SESSION['username']))
	{
		require_once(APP_PATH.'/views/login.php');
		session_destroy();
	}
	else
	{
		session_destroy();
		
		unset($_COOKIE['PHPSESSID']);

		require_once(APP_PATH.'/views/login.php');
		
		echo"<script> alert('U bent nu uitgelogged.')</script>";
	}
}

function forgotPassword()
{
	require_once(APP_PATH.'/views/forgotPassword.php');
}

?>
