<?php
	require_once(VIEWS.'/header.php');
?>

<body class=''>

<?php
require_once(VIEWS.'/menu.php');
?>
	
	<div id="content">
	<div class="menu-trigger"><img src="<?php echo URL?>public/img/row.png" width="100%" height="100%" alt=""></div>
		<h1 class="middle box-sizing"><?php echo $this->data['message'] ?></h1>
	</div>
</body>





<?php
require_once(VIEWS.'/footer.php');
?>