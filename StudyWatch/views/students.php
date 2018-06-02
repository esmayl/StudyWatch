<?php require_once(APP_PATH.'/styles.php'); ?>
<?php require_once(APP_PATH.'/javascripts.php'); ?>

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

        <div class="info">
          <a name="home" href="#" class="d-block">Welkom 
			<b>
			<?php 
				echo getUsername(); 
			?>
			</b>
			</a>
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
				  <?php if(getUserType() == 3)
				  {
					  echo'<li class="nav-item">';
					  echo'<a name="showstudent" href="#" class="nav-link">';
					  echo'<i class="fa fa-book-open nav-icon"></i>';
					  echo'<p>Studiebegeleiding</p>';
					  echo'</a>';
					  echo'</li>';
				  }
				  ?>
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
            <h1>Studenten administratie - <?php echo getCurrentCourse(); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a name="home" href="#">Home</a></li>
              <li class="breadcrumb-item active">Studenten administratie - <?php echo getCurrentCourse(); ?></li>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
                  <th>Student nummer</th>
                  <th>Naam</th>
                  <th>Week 1</th>
				  <th>Week 2</th>
				  <th>Week 3</th>
				  <th>Week 4</th>
				  <th>Week 5</th>
				  <th>Week 6</th>
                </tr>
                </thead>
                <tbody>
				
				<!-- maak tr's aan per les voor het geselecteerde vak -->
                <tr>
                  <td>S1234567</td>
                  <td>Piet-jan Klaasen
                  </td>
                  <td>X</td>
				  <td>X</td>
				  <td>X</td>
				  <td>X</td>
				  <td>X</td>
				  <td>X</td>
                </tr>
				<tr>
                  <td>S1234568</td>
                  <td>Dirk-jan Klaasen
                  </td>
                  <td>X</td>
				  <td>X</td>
				  <td>X</td>
				  <td>X</td>
				  <td>X</td>
				  <td>X</td>
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
    $('#example1').DataTable({
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

</script>


</body>
