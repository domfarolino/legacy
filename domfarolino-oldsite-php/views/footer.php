<script>
/*
  Slidemenu
*/
(function() {
	var $body = document.body
	, $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

	if ( typeof $menu_trigger !== 'undefined' ) {
		$menu_trigger.addEventListener('click', function() {
			$body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
		});
	}

}).call(this);
</script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular.js"></script>
<script src="https://code.angularjs.org/1.2.28/angular-route.js"></script>
<script src="https://code.angularjs.org/1.2.28/angular-animate.js"></script>

<?php if(isset($this->data['js'])){
			foreach($this->data['js'] as $key=>$value){
				echo '<script type="text/javascript" src="'.URL.'public/js/'.$value.'.js"></script>';
			}
		}
?>

<script>
				$("#homli").click(function(){
					link = $(this).data('link-to');
					$('#content').animate({scrollTop: $(link).offset().top},1000);
				});
				$("#whatli").click(function(){
					link = $(this).data('link-to');
					$('#content').animate({scrollTop: $(link).offset().top},1000);
				});
				$("#myworkli").click(function(){
					link = $(this).data('link-to');
					$('#content').animate({scrollTop: $(link).offset().top},1000);
				});
				</script>
</html>