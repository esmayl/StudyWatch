<?php
function getUsername()
{
	if(!isset($_SESSION['username'])){return;}
	
	return $_SESSION['username'];
}

function getUserType()
{
	if(!isset($_SESSION['user_type'])){return;}
	
	return $_SESSION['user_type'];
}

?>