<?php

function getStudents()
{
	require_once(APP_PATH.'/views/students.php');
}

function getCourses()
{
	global $connection;

	$sql = "SELECT name FROM subject";

	$co = $connection->query($sql);

	foreach($co as $course)
	{
		echo '<li class="nav-item">';
			echo'<a href="#" class="nav-link" name="clickable">';
			echo $course['name'];
			echo'</a>';
		echo'</li>';
	}
}


?>