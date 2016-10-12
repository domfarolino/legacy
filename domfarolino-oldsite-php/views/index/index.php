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
		<div class="warning" style="width:60%; margin:0 auto;">New Site Under Construction - Coming Soons</div>
		<h3 class="middle text-color"><i>UI/UX Developer + Backend Architect</i></h3>
		<h1 class="middle box-sizing text-color">I design
  			<span class="txt-rotate text-color" data-period="2000" data-rotate='["modern websites.", "flat websites.", "functional websites."]'></span>
		</h1>
        <!-- Place this tag where you want the button to render. -->
<a class="github-button" href="https://github.com/domfarolino" data-style="mega" data-count-href="/domfarolino/followers" data-count-api="/users/domfarolino#followers" data-count-aria-label="# followers on GitHub" aria-label="Follow @domfarolino on GitHub">Follow @domfarolino</a>
	</div>
	
	<div id="what-i-do-section" class="section box-sizing" style="margin-top:250px;">
		<h1 class="middle">What I Do</h1>
		<div class="fluid-row">
			<div class="fluid-container box-sizing">
				<div class="fluid-box animate box-sizing">
					<div class="fluid-content box-sizing">
						<img src="<?php echo URL?>public/img/design.png" alt="">
						<h2 class="middle">Design</h2>
					</div>
				</div>
				<div class="fluid-box animate box-sizing">
					<div class="fluid-content box-sizing">
						<img src="<?php echo URL?>public/img/plan.png" alt="">
						<h2 class="middle">Plan</h2>
					</div>
				</div>
				<div class="fluid-box animate box-sizing">
					<div class="fluid-content box-sizing">
						<img src="<?php echo URL?>public/img/code.png" alt="">
						<h2 class="middle">Code</h2>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
	</div>
	
	<a name="mywork"></a>
	<div id="my-work-section" class="section box-sizing">
		<h1 class="middle box-sizing">My Work</h1>
		<div class="fluid-row" ng-controller="ProjectController">
			<div class="fluid-container box-sizing">
				<div ng-repeat="project in projects" class="fluid-box box-sizing" id="work">
					<div class="fluid-content box-sizing" id="work">
						<div class="trans-all project-card" ng-click="reroute(project.id)">
							<h2 class="middle" style="margin-bottom:10px">{{project.title}}</h2>
							<img ng-src="{{project.poster}}" alt="{{project.title}}" style="border-radius:0;">
							<h4><i>{{project.description}}</i></h4>
							<h3><b>Type:</b> {{project.type}}</h3>
							<h3><b>Date:</b> {{project.date}}</h3>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>

		<div style="clear:both;"></div>
	</div>

	<div id="my-process-section" class="section box-sizing" ng-view>
	</div>

	<div id="my-process-section" class="section box-sizing">
		<h1 class="middle box-sizing">Contact Me</h1>
	</div>
	
</div>
<!-- Place this tag right after the last button or just before your close body tag. -->
<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
</body>




<?php
require_once(VIEWS.'/footer.php');
?>

<script>
/*
  Scroll Triggerss
*/
	$('#content').scroll(function() {
		$('.animate').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $('#content').scrollTop();
			if (imagePos < topOfWindow+500) {
				$(this).addClass("slideUp");
			}
		});
	});
</script>