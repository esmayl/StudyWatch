<?php

function login()
{
//Start the Session
session_start();
require('db_conection.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$email = $_POST['email'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `user` WHERE email='$email' and password='$password'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['email'] = $email;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['email'])){
require_once(APP_PATH.'/views/home.php');
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
	require_once(APP_PATH.'/views/login.php');
}
}

function forgotPassword()
{
	require_once(APP_PATH.'/views/forgotPassword.php');
}

?>
