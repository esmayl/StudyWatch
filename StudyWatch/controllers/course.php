<?php

function getStudents()
{
	require_once(APP_PATH.'/views/students.php');
}

function getCourses()
{
	foreach($co as $course){
		echo '<li class="nav-item">
                <a id="vak1" href="#" class="nav-link active">
                  <i class="fa fa-book-open nav-icon"></i>';
				  echo '<p>' . $course . '</p>';
            echo'</a>
              </li> ';
	}
}

?>