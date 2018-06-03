<?php require_once(APP_PATH.'/styles.php'); ?>
<?php require_once(APP_PATH.'/javascripts.php'); ?>
<?php require_once(APP_PATH.'/controllers/course.php');?>

<body class="hold-transition sidebar-mini">
<header class="main-header">
<nav class="navbar navbar-static-top bg-white navbar-light border-bottom" >
	<a class="nav-link" data-widget="pushmenu" href="#">
		<i class="fa fa-bars"></i>
	</a>
	<div>
		<li class="nav-item d-none d-sm-inline-block">
		<a name="home" href="#" class="nav-link">Welkom bij StudyWatch!</a>
		</li>

		<!-- mischien dit gebruiken als contact met admin -->
		<!--<li class="nav-item d-none d-sm-inline-block">
		<a href="#" class="nav-link">Contact</a>
		</li>-->
	</div>
	<li class="nav-item d-none d-sm-inline-block">
	<a name="logout" href="#" class="nav-link bg-info logout" ><b>Log uit</b></a>
	</li>
</nav>

</header>
  
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      
		<span class="brand-text font-weight-light">
			<img src="img/windesheim.svg" alt="Logo"
           style="opacity: .8;width:100%;height:auto;">
		</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a name="home" href="#" class="d-block">Welkom <b><?php echo getUsername(); ?></b></a>
        </div>
      </div>
	  
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Vakken
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
			
            <!-- verander de vakken met PHP per docent/docent/studiebegeleider -->
			<ul id="vakken" class="nav nav-treeview">

			  <!-- geeft alleen de studiebegeleider toegang tot studiebegeleiding --> 
				<?php 
				getCourses();
			  ?>
            </ul>
          </li>
		  
		</nav>
    </div>
  </aside>
  
  <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo "<b>".getCurrentCourse()."</b>";?></h3>
            </div>
            <div class="card-body">
			
              <table id="table" class="table table-bordered table-striped">
                <thead>
				<tr>
                  <th>Week</th>
                  <th>Cohort</th>
				  <?php 
					if(getUserType() == 2)
					{
						echo "<th>Aanmelden</th>";
					}
				  ?>
                </tr>
                </thead>
                <tbody>
				
				<!-- maak tr's aan per les voor het geselecteerde vak -->
                <?php 
				

					if(getUserType() == 2)
					{
						getClass();
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
      "ordering": true,
      "info": true,
    });
  });


var test = document.getElementsByName('clickable');

//Set function to switch the page to the course page when clicked on 1 of the courses
for(var i =0;i<test.length;i++)
{
	test[i].addEventListener('click',function(event)
	{
		document.body.innerHTML += '<form id="dynForm" method="post"><input type="hidden" name="controller" value="user"><input type="hidden" name="action" value="setCurrentCourse"><input type="hidden" name="course" value="'+event.currentTarget.innerHTML+'">';
		document.getElementById("dynForm").submit();
	}
	);
}

var test2 = document.getElementsByName('home');

//Set function to switch back to the home page
for(var i =0;i<test2.length;i++)
{
	test2[i].addEventListener('click',function()
	{
		document.body.innerHTML += '<form id="dynForm" method="post"><input type="hidden" name="controller" value="home"><input type="hidden" name="action" value="home">';
		document.getElementById("dynForm").submit();
	}
	);
}

var test3 = document.getElementsByName('logout');

//Set function to logout and switch to login page		  
for(var i =0;i<test3.length;i++)
{
	test3[i].addEventListener('click',function()
	{
		document.body.innerHTML += '<form id="dynForm" method="post"><input type="hidden" name="controller" value="user"><input type="hidden" name="action" value="logout">';
		document.getElementById("dynForm").submit();
	}
	);
}

</script>

</body>
