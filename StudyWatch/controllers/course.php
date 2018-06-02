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

	$i = 0;
	foreach($co as $course){
		echo '<li class="nav-item">';

				 if ($i == 0 ){
					echo '<a id="vak1" href="#" class="nav-link active">';
				 }else{
				 echo '<a id="vak1" href="#" class="nav-link">';
				 }
				  
                echo  '<i class="fa fa-book-open nav-icon"></i>';
				  echo '<p>' . $course['name'] . '</p>';
            echo'</a>
			  </li> ';
	
	$i++;
	}
}


?>