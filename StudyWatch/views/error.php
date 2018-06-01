<?php include(APP_PATH."/styles.php"); ?>

<div class="vid-container">
	<img class="bgvid" <source src="img/background.png"/> 

	<div class="inner-container">

		<img class="bgvid inner" src="img/background.png" />

		<form method="post">
			<div class="box">

			  <h1>Error! U heeft geen toegang</h1>
			  <h1><a name="home" href="#">Klik hier om terug te gaan</a></h1>
			</div>
		</form>
	</div>

</div>

<script>

var test = document.getElementsByName('home');

for(var i =0;i<test.length;i++)
{
	test[i].addEventListener('click',function()
	{
		document.body.innerHTML += '<form id="dynForm" method="post"><input type="hidden" name="controller" value="home"><input type="hidden" name="action" value="login">';
		document.getElementById("dynForm").submit();
	}
	);
}
</script>

<?php
include(APP_PATH."/views/footer.php");
?>
