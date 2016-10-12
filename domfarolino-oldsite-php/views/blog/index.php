<?php
	require_once(VIEWS.'/header.php');
?>

<body class='' ng-app="work">

<?php
require_once(VIEWS.'/menu.php');
?>
	
<!-- Content panel -->
<div id="content" class="background-color">
	<div class="menu-trigger"><img src="<?php echo URL?>public/img/row.png" width="100%" height="100%" alt=""></div>
	<div class="middle full fade">
		<h1 class="middle text-color">Dom Farolino</h1>
		<div id="poster" class="middle"><img class="box-sizing"src="<?php echo URL?>public/img/imgpost.jpg" alt=""></div>
		<h3 class="middle text-color">{ Web Developer }</h3>
		<hr style="width:200px; opacity:.38;">
		<h3 class="middle text-color"><i>UI/UX Developer + Backend Architect</i></h3>
        <!-- Place this tag where you want the button to render. -->
<a class="github-button" href="https://github.com/domfarolino" data-style="mega" data-count-href="/domfarolino/followers" data-count-api="/users/domfarolino#followers" data-count-aria-label="# followers on GitHub" aria-label="Follow @domfarolino on GitHub">Follow @domfarolino</a>
	</div>
	
	<div class="blog-content" ng-controller="BlogController">
		<h2 class="middle"><b>Recent Posts:</b></h2>
		<div ng-repeat="post in posts">
			<h2 class="middle text-click blog-title-card" style="margin-top:10px;" ng-click="showPost(post.id)"><b>{{post.title}}</b></h2>
		</div>
		<div ng-view>
		
		</div>
	</div>
	
</div>
<!-- Place this tag right after the last button or just before your close body tag. -->
<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
</body>




<?php
require_once(VIEWS.'/footer.php');
?>