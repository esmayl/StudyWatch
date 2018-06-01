<?php

function getStudents()
{
	require_once(APP_PATH.'/views/students.php');
}

function getCourses()
{
	global $connection;

	$sql = "SELECT vak FROM vakken";

	$co = $connection->query($sql);

	$length = count($co);
	foreach($co as $course){
		echo '<li class="nav-item">';

				 if ($length[0] ){

				 }else{
				 echo '<a id="vak1" href="#" class="nav-link">';
				 }
				  
                echo  '<i class="fa fa-book-open nav-icon"></i>';
				  echo '<p>' . $course['vak'] . '</p>';
            echo'</a>
              </li> ';
	}
}

?>