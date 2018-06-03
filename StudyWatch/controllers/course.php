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
		if($course['name'] == getCurrentCourse())
		{
			echo '<li class="nav-item">';
				echo'<a href="#" class="nav-link active" name="clickable">';
				echo $course['name'];
				echo'</a>';
			echo'</li>';
		}
		else
		{
			echo '<li class="nav-item">';
				echo'<a href="#" class="nav-link" name="clickable">';
				echo $course['name'];
				echo'</a>';
			echo'</li>';
		}
	}
}

function getClass()
{
	global $connection;

	$student = $_SESSION['studentID'];
	
	$query = "SELECT class.id as class_id, students.name as studentName,subject.name as subjectName ,subject.id as subjectID ,attendency.attendance FROM students inner join attendency ON (students.id=attendency.student_id) inner join subject on (attendency.subject_id=subject.id) inner join class on (attendency.class_id=class.id) WHERE attendency.student_id=".$_SESSION['studentID'];

	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

	foreach($result as $p)
	{
		if($p['subjectName'] == getCurrentCourse())
		{
			echo"<tr>";
			echo"<td>".$p['class_id']."</td>";
			echo"<td>2017/2018</td>";
			
			if($p['attendance'] == "Afwezig")
			{
				echo"<td><form method='post'><input type='hidden' name='vak' value='".$p['subjectID']."'/>
				<input type='hidden' name='les' value='".$p['class_id']."'/>
				<input type='hidden' name='controller' value='user'/>
				<input type='hidden' name='action' value='aanmelden'/>
				<input class='alert alert-danger' type='submit' value='X'></input> 
				</form></td>";
			}
			else
			{
				echo"<td><form>
				<input class='alert alert-success' type='submit' value='V'></input> 
				</form></td>";
			}
			echo"</tr>";
		}
	}
}

?>