<?php require_once(APP_PATH.'/styles.php'); ?>
<?php require_once(APP_PATH.'/javascripts.php'); ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper" style="height:auto;min-height=100%;">

  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

    <ul class="navbar-nav">


	  
	  <!-- mischien dit gebruiken als contact met admin -->
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>
  
</nav>
  
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a name="home" href="#" class="brand-link">
      
		<span class="brand-text font-weight-light">
			<img src="img/windesheim.svg" alt="Logo"
           style="opacity: .8;width:100%;height:auto;">
		</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <li  class="d-none d-sm-inline-block">
			<b class='nav-link'>
			<?php 
				echo getUsername(); 
			?>
			</b>
        </li>
		
      </div>
	  	  <li class="d-none d-sm-inline-block">
        <a name="logout" href="#" class="nav-link"><b>Log uit</b></a>
      </li>
    </div>
  </aside>
  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Studenten aanwezigheid</h1>
          </div>
        </div>
      </div>
    </section>

          <div class="card">
            <div class="card-body">
              <table id="table" class="table table-bordered">
                <thead>
				<?php
					echo "<tr>
					<th>Naam</th>
					<th>Aanwezigheid</th>
					</tr>";
				?>	
                </thead>
                <tbody>
				<?php
				global $connection;
				
				$query = "SELECT students.name as studentName,subject.name as subjectName ,attendency.attendance FROM students inner join attendency ON (students.id=attendency.student_id) inner join subject on (attendency.subject_id=subject.id) inner join class on (attendency.class_id=class.id) WHERE students.id=attendency.student_id";

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
				
				$placedCourses = [];
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
				?>
                </tfoot>
              </table>
            </div>
			
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include(APP_PATH.'/views/footer.php'); ?>
</div>

<script>
//functie om de tabel weer te geven
  $(function () {
    $('#table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "info": true,
    });
  });

var test3 = document.getElementsByName('logout');

//Set function to logout and switch to login page		  
for(var i =0;i<test3.length;i++)
{
	test3[i].addEventListener('click',function()
	{
		document.body.innerHTML += '<form id="dyn1Form" method="post"><input type="hidden" name="controller" value="user"><input type="hidden" name="action" value="logout">';
		document.getElementById("dyn1Form").submit();
	}
	);
}

</script>


</body>
