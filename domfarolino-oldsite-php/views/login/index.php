<?php
	require_once('/../header.php');
?>

<body class=''>


	
	<div class="login" id="content">
		

		<div class="box-sizing center card login-card fade">
			<h3 class="" id="login-top">Login - Creative Network</h3>
			<form id="login-form" autocomplete="off">
				<div class="login-text-container box-sizing">
					<input required class="login-text box-sizing" id="username" placeholder="Username" type="text">
				</div>
				

				<div class="login-text-container box-sizing">
					<input required class="login-text box-sizing" id="password" placeholder="Password" type="password">
				</div>
				

				<div class='box-sizing login-check-container'>
					<input id="login-check" class="box-sizing login-check" type="checkbox">
					<label for="login-check" style="" value="Remember me"><span></span>Remember me</label>
				</div>
				

				<div id="create-account-link" class='middle box-sizing login-button-container'>
					<a href="../user" style="color: #3498db;" class="box-sizing">Create Account</a>
				</div>


				<div class='middle box-sizing login-button-container'>
					<input class="box-sizing button login-button" id="login" type="submit" value="Login">
				</div>
			</form>
		</div>


	</div>
</body>
<?php
	require_once('/../footer.php');
?>