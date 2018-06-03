<?php

function showStudents()
{
	require_once(APP_PATH.'/views/studentlist.php');
}

function getStudents()
{
	global $connection;
				
		$query = "SELECT students.id, students.name as studentName,subject.name as subjectName ,attendency.attendance FROM students inner join attendency ON (students.id=attendency.student_id) inner join subject on (attendency.subject_id=subject.id) inner join class on (attendency.class_id=class.id) WHERE students.id=attendency.student_id";

		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		
		$data = [];
		
		//Convert mysql object into array
		foreach ($result as $key=>$val)
		{
			$data[$key]=$val;
		}

		//Returns all attendancy of all students 
		function GetAtt($array,$course,$student)
		{
			$length = sizeof($array);
			$att = array();
		
			foreach($array as $p)
			{
				if($p['subjectName'] == $course && $p['studentName'] == $student)
				{
					$att[] = $p['attendance'];
				}
			}
			return $att;
		}

		$placedStudents = [];
		
		//Create elements within a table
		foreach($data as $d)
		{

			if(!in_array($d['studentName'],$placedStudents))
			{
				echo "<tr>";
				echo "<td>" . $d['studentName'] . "</td>";
					
				//Get all attendancies
				$attendancy = GetAtt($data,$d['subjectName'],$d['studentName']);
				
				//Place attendancies next to each other
				$columnCounter = 0;
				foreach($attendancy as $t)
				{
					$columnCounter++;
				}
				
				$avg = number_format($columnCounter/(6/100),2);
				if($avg <33)
				{
					echo "<td class='alert alert-error'>".$avg."%</td>";
				}
				else if($avg < 50)
				{
					echo "<td class='alert alert-warning'>".$avg."%</td>";
				}
				else 
				{
					echo "<td class='alert alert-success'>".$avg."%</td>";
				}
					
				echo "</tr>";
				
				$placedStudents[] = $d['studentName'];
			}					
		}
}

?>