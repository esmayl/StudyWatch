<?php
function getUsername()
{
	if(!isset($_SESSION['username'])){return 0;}
	
	return $_SESSION['username'];
}

function getUserType()
{
	if(isset($_SESSION['username']))
	{
		if(isset($_SESSION['is_sb']) && $_SESSION['is_sb'] == 1 && $_SESSION['isTeacher'] == True)
		{
			return 3;
		}
		else if(isset($_SESSION['isTeacher']) && $_SESSION['isTeacher'] == True)
		{
			return 1;
		}
	
		return 2;
	}
	else
	{
		return 0;
	}
}

function getTeacherID()
{
	if(isset($_SESSION['teacherID']))
	{
		return $_SESSION['teacherID'];
	}
	
	return -1;
}

function setCurrentCourse()
{
	if(isset($_POST['course']))
	{
		$_SESSION['currentC'] = $_POST['course'];
		require_once(APP_PATH.'/views/home.php');
	}
	else
	{
		echo'<script>Cant set course name';
	}
}

function getCurrentCourse()
{
	if(isset($_SESSION['currentC']))
	{
		return $_SESSION['currentC'];
	}
}



?>