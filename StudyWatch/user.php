<?php
function getUsername()
{
	if(!isset($_SESSION['username'])){return 0;}
	
	return $_SESSION['username'];
}

function getUserType()
{
	if(!isset($_SESSION['user_type'])){return 0;}
	
	return $_SESSION['user_type'];
}

?>