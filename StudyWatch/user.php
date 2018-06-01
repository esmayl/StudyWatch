<?php
function getUsername()
{
	if(!isset($_SESSION['username'])){return 0;}
	
	return $_SESSION['username'];
}

function getUserType()
{
	if(!isset($_SESSION['is_sb'])&&!isset($_SESSION['isTeacher'])){return 0;}
	
	if(isset($_SESSION['is_sb']) && $_SESSION['isTeacher'] == 1)
	{
		return 3;
	}
	else if(isset($_SESSION['isTeacher']) && $_SESSION['isTeacher'] == 1)
	{
		return 1;
	}
	else
	{
		return 2;
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