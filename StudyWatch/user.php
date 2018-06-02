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

function getCurrentCourse()
{
	return $_SESSION['currentC'];
}

function setCurrentCourse($currentCourseName)
{
	if(!is_null($currentCourseName))
	{
		$_SESSION['currentC'] = $currentCourseName;
	}
	else
	{
		echo'<script>Cant set course name: '+$currentCourseName;
	}
}
?>