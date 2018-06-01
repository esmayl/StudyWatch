<?php include(APP_PATH."/styles.php"); ?>

<div class="vid-container">
	<img class="bgvid" <source src="img/background.png"/> 

	<div class="inner-container">

		<img class="bgvid inner" src="img/background.png" />

		<form method="post">
			<div class="box">

			  <h1>Welkom</h1>

			  <input type="hidden" name="controller" value="user">
			  <input type="hidden" name="action" value="login">

			  <input type="text" placeholder="E-Mail" name="email">

			  <input type="password" placeholder="Wachtwoord" name="password">

			  <button type="submit">Login</button>

			  <p>Wachtwoord vergeten? <span><a href="#" name="forgotPassword">Klik hier!</a></span></p>

			</div>
		</form>
	</div>

</div>

<script>

var test = document.getElementsByName('forgotPassword');

for(var i =0;i<test.length;i++)
{
	test[i].addEventListener('click',function()
	{
		document.body.innerHTML += '<form id="dynForm" method="post"><input type="hidden" name="controller" value="user"><input type="hidden" name="action" value="forgotPassword">';
		document.getElementById("dynForm").submit();
	}
	);
}
</script>

<?php
include(APP_PATH."/views/footer.php");
?>
