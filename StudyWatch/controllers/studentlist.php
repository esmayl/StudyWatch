<?php

function showStudents()
{
	require_once(APP_PATH.'/views/studentlist.php');
}

//Returns all attendancy of all students 
function GetAtt($array,$student)
{
	global $connection;
	
	$length = sizeof($array);
	$att = array();

	$currentC = "";
	$counter=0;		
	
	foreach($array as $p)
	{
		$currentC = $p['subjectID'];
		
		if(!array_key_exists($currentC,$att))
		{
			$counter = 0;
		}
		else
		{
			$counter = $att[$currentC];
		}
		
		if($p['studentName'] == $student)
		{

			if($p['attendance'] == "Aanwezig")
			{
				$counter++;
				$att[$p['subjectID']] = $counter;
			}
		}
	}
	return $att;
}

function getStudents()
{
	global $connection;
				
		$query = "SELECT students.id, students.name as studentName,subject.id as subjectID,subject.name as subjectName ,attendency.attendance FROM students inner join attendency ON (students.id=attendency.student_id) inner join subject on (attendency.subject_id=subject.id) inner join class on (attendency.class_id=class.id) WHERE students.id=attendency.student_id";

		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		
		$data = [];
		
		//Convert mysql object into array
		foreach ($result as $key=>$val)
		{
			$data[$key]=$val;
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
				$attendancy = GetAtt($data,$d['studentName']);
				
				$avg =0;
				$total =0;
				
			
				foreach(array_keys($attendancy) as $t)
				{
					$avg += $attendancy[$t];
								
					$query = "SELECT * FROM class where subject_id=".$t;
					$result = mysqli_query($connection, $query);
				
					$totalClasses = mysqli_fetch_all($result,MYSQLI_ASSOC);
					foreach($totalClasses as $p)
					{
						$total += (int)$p['classesPast'];
					}						
				}

				if($avg>0)
				{
					$avg /=$total;
					$avg *=100;
					$avg = number_format($avg,2);
				}
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