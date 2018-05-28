<?php include(APP_PATH."/styles.php"); ?>

<div class="vid-container">
	<img class="bgvid" <source src="../../background.png"> />

	<div class="inner-container">

		<img class="bgvid inner" src="../../background.png" />

		<form method="post">
			<div class="box">

			  <h1>Welkom</h1>

			  <input type="hidden" name="controller" value="user">
			  <input type="hidden" name="action" value="login">

			  <input type="text" placeholder="E-Mail" name="email"/>

			  <input type="password" placeholder="Wachtwoord" name="password"/>

			  <button type="submit">Login</button>

			  <p>Wachtwoord vergeten? <span><a href="?controller=user&action=forgotPassword">Klik hier!</a></span></p>

			</div>
		</form>
	</div>

</div>

<?php
include(APP_PATH."/views/footer.php");
?>
