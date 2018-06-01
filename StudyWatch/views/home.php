<?php include(APP_PATH.'/styles.php'); ?>
<?php include(APP_PATH.'/javascripts.php'); ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper" style="height:auto;min-height=100%;">

  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a name="home" href="#" class="nav-link">Home</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a name="logout" href="#" class="nav-link"><b>Log uit</b></a>
      </li>
	  <!-- mischien dit gebruiken als contact met admin -->
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>
  
</nav>
  
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      
		<span class="brand-text font-weight-light">
			<img src="img/temporaryLogo.png" alt="Logo" class="img-circle"
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
              <li class="nav-item">
                <a id="vak1" href="#" class="nav-link active">
                  <i class="fa fa-book-open nav-icon"></i>
                  <p>Projectmanagment</p>
                </a>
              </li>
			  
			  
              <li class="nav-item">
                <a id="vak2" href="#" class="nav-link">
                  <i class="fa fa-book-open nav-icon"></i>
                  <p>Studiebegeleiding</p>
                </a>
              </li>
			  
              <li class="nav-item">
                <a id="vak3" href="#" class="nav-link">
                  <i class="fa fa-book-open nav-icon"></i>
                  <p>Vak 3</p>
                </a>
              </li>
            </ul>
			
          </li>
		  
		</nav>
    </div>
  </aside>
  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $_SESSION['currentCourse'] ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a name="home" href="#">Home</a></li>
              <li class="breadcrumb-item active">Projectmanagement</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lessen</h3>
            </div>
            <div class="card-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
				<tr>
                  <th>Week</th>
                  <th>Cohort</th>
                  <th>Onderwerp</th>
				  <?php 
					if(getUserType() == 2)
					{
						echo "<th>Aangemeld</th>";
					}
					elseif(getUserType() == 3 || getUserType() == 1)
					{
						echo "<th>Aanwezigheid</th>";
					}
				  ?>
                </tr>
                </thead>
                <tbody>
				
				<!-- maak tr's aan per les voor het geselecteerde vak -->
                <?php 
				if(getUserType() == 3)
				{
					echo "<tr "."class='clickable'".">";
				}
				else
				{
					echo "<tr>";
				}
				?>
                  <td>1 - 23/05/2018</td>
                  <td>2017/2018
                  </td>
                  <td>Project plan - Inleiding</td>
					<?php
						if(getUserType() == 2)
						{
							echo"<td><form method='post'><input type='hidden' name='controller' value='user'/><input type='hidden' name='action' value='aanmelden'/><input type='submit' value='Nee'></input> </form></td>";
						}
						elseif(getUserType() == 3)
						{
							echo"<td>";
							echo"<form method='post'>";
							echo"<input type='hidden' name='controller' value='course'/>";
							echo"<input type='hidden' name='action' value='getStudents'/>";
							echo"<input type='hidden' name='courseName' value='Projectmanagement'/>";
							echo"<input type='hidden' name='weekNumber' value='1'/>";
							echo"<input type='submit' value='51%'>";
							echo"</input>";
							echo"</form>";
							echo"</td>";
						}
						elseif(getUserType() ==1)
						{
							echo"<td>";
							echo"<form method='post'>";
							echo"<input type='hidden' name='controller' value='course'/>";
							echo"<input type='hidden' name='action' value='getStudents'/>";
							echo"<input type='hidden' name='courseName' value='Projectmanagement'/>";
							echo"<input type='hidden' name='weekNumber' value='1'/>";
							echo"<input type='submit' value='51%'>";
							echo"</input>";
							echo"</form>";
							echo"</td>";
						}
					?>
                </tr>
				<?php 
				if(getUserType() == 3)
				{
					echo "<tr "."class='clickable'".">";
				}
				else
				{
					echo "<tr>";
				}
				?>
                  <td>2 - 30/05/2018</td>
                  <td>2017/2018
                  </td>
                  <td>Project plan - Risicomanagement</td>
					<?php
						if(getUserType() == 2)
						{
							echo"<td><form method='post'><input type='hidden' name='controller' value='user'/><input type='hidden' name='action' value='aanmelden'/><input type='submit' value='Ja'></input> </form></td>";
						}
						elseif(getUserType() == 3 )
						{
							echo"<td>";
							echo"<form method='post'>";
							echo"<input type='hidden' name='controller' value='course'/>";
							echo"<input type='hidden' name='action' value='getStudents'/>";
							echo"<input type='hidden' name='courseName' value='Projectmanagement'/>";
							echo"<input type='hidden' name='weekNumber' value='2'/>";
							echo"<input type='submit' value='90%'>";
							echo"</input>";
							echo"</form>";
							echo"</td>";
						}						
						elseif(getUserType() ==1)
						{
							echo"<td>";
							echo"<form method='post'>";
							echo"<input type='hidden' name='controller' value='course'/>";
							echo"<input type='hidden' name='action' value='getStudents'/>";
							echo"<input type='hidden' name='courseName' value='Projectmanagement'/>";
							echo"<input type='hidden' name='weekNumber' value='2'/>";
							echo"<input type='submit' value='90%'>";
							echo"</input>";
							echo"</form>";
							echo"</td>";
						}
					?>
                </tr>
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

// Vakken knop 
var btnContainer = document.getElementById("vakken");

// Alle vakken knoppen
var btns = btnContainer.getElementsByClassName("nav-link");

// Loop over alle vakken en zet de geselecteerde naar active
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = btnContainer.getElementsByClassName("nav-link active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

var test = document.getElementsByClassName('clickable');

//Set function to switch the page to the course page when clicked on 1 of the courses
for(var i =0;i<test.length;i++)
{
	test[i].addEventListener('click',function()
	{
		document.body.innerHTML += '<form id="dynForm" method="post"><input type="hidden" name="controller" value="course"><input type="hidden" name="action" value="getStudents"><input type="hidden" name="courseName" value="Projectmanagement"/><input type="hidden" name="weekNumber" value="1"/>';
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
		document.body.innerHTML += '<form id="dyn2Form" method="post"><input type="hidden" name="controller" value="home"><input type="hidden" name="action" value="home">';
		document.getElementById("dyn2Form").submit();
	}
	);
}

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

var test4 = document.getElementsByName('logout');

//Set function to logout and switch to login page		  
for(var i =0;i<test4.length;i++)
{
	test4[i].addEventListener('click',function()
	{
		document.body.innerHTML += '<form id="dyn1Form" method="post"><input type="hidden" name="controller" value="course"><input type="hidden" name="action" value="getCouses"><input type="hidden" name="selectedCourse" value="'+event.innerHTML+'">';
		document.getElementById("dyn1Form").submit();
	}
	);
}

</script>

</body>
