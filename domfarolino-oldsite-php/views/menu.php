<nav id="slide-menu" ng-controller="MenuController">	
	<header>
	</header>
	<ul>
		<li id="homeli" class="middle box-sizing m backdrop-color clickanimate" ng-click="reroute(home)">
			<div class="valign">
				<img class="" src="<?php echo URL?>public/img/home-icon.png" width="25px" height="auto">
				<div class="middle">Home</div>
			</a>
			</div>
		</li>
		<li id="whatli" class="middle box-sizing m backdrop-color clickanimate" data-link-to="#what-i-do-section">
			<div class="valign">
			<a href="#whatido">
				<img class="" src="<?php echo URL?>public/img/layout-icon.png" width="25px" height="auto">
				<div class="middle">What I Do</div>
			</a>
			</div>
		</li>
		<li id="myworkli" class="middle box-sizing m backdrop-color clickanimate" data-link-to="#my-work-section">
			<div class="valign">
				<a href="#mywork">
				<img class="" src="<?php echo URL?>public/img/carousel-icon.png" width="25px" height="auto">
				<div class="middle">My Work</div>
			</a>
			</div>
		</li>
		<li class="middle box-sizing m backdrop-color" ng-click="reroute(blogSite)">
			<div class="valign">
				<img class="" src="<?php echo URL?>public/img/blog-icon.png" width="25px" height="auto">
				<div class="middle">My Blog</div>
			</div>
		</li>
		<li class="middle box-sizing m backdrop-color">
			<div class="valign">
				<img class="" src="<?php echo URL?>public/img/contact-icon.png" width="25px" height="auto">
				<div class="middle">Contact Me</div>
			</div>
		</li>
	</ul>
</nav>