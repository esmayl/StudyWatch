<?php include(APP_PATH."/styles.php"); ?>

<div class="vid-container">
	<img class="bgvid" <source src="https://images.unsplash.com/photo-1425321395722-b1dd54a97cf3?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop="> />
	
	<div class="inner-container">
	
		<img class="bgvid inner" src="https://images.unsplash.com/photo-1425321395722-b1dd54a97cf3?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=" />
	
		<form method="post">
			<div class="box">
			
			  <h1>Welkom</h1>
			  
			  <input type="hidden" name="controller" value="user">
			  <input type="hidden" name="action" value="login">
			  
			  <input type="text" placeholder="Gebruiker" name="username"/>
			  
			  <input type="text" placeholder="Wachtwoord" name="password"/>
			  
			  <button>Login</button>
			  
			  <p>Wachtwoord vergeten? <span><a href="?controller=user&action=forgotPassword">Klik hier!</a></span></p>
			  
			</div>
		</form>
	</div>
	
</div>

<?php include(APP_PATH."/views/footer.php"); ?>