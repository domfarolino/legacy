<?php
	/**
	* View.php
	*/
	class View{
		
		public $data;
		function __construct(){
			
		}

		public function render($name){
			require(VIEWS.DIRECTORY_SEPARATOR.$name.'.php');
			//require('views/'.$name.'.php');
		}
	}
?>