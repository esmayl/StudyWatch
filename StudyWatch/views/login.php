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

			  <input type="text" placeholder="E-Mail" name="email" required>

			  <input type="password" placeholder="Wachtwoord" name="password" required>

			  <button type="submit">Login</button>

			</div>
		</form>
	</div>

</div>

<?php
include(APP_PATH."/views/footer.php");
?>
