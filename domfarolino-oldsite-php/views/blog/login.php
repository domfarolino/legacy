<?php
	require_once(VIEWS.'/header.php');
?>

<body class=''>

<?php
require_once(VIEWS.'/menu.php');
?>
	
<!-- Content panel -->
<div id="content" class="background-color">
	<div class="menu-trigger"><img src="<?php echo URL?>public/img/row.png" width="100%" height="100%" alt=""></div>
	<div class="middle full fade">
		<h1 class="middle text-color">Dom Farolino</h1>
		<div id="poster" class="middle"><img class="box-sizing"src="<?php echo URL?>public/img/poster1.jpg" alt=""></div>
		<h3 class="middle text-color">{ Web Developer }</h3>
		<hr style="width:200px; opacity:.38;">
		<h3 class="middle text-color"><i>UI/UX Developer + Backend Architect</i></h3>
	</div>
	
	<div id="blog-login" class="middle section box-sizing">
	<h2><?php echo $this->data['message'] ?></h1>
		<form action="" method="POST">
			<input type="password" name="pwd" placeholder="Key">
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
	
</div>
</body>




<?php
require_once(VIEWS.'/footer.php');
?>