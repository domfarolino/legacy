<?php
	/**
	* 
	*/
	class Controller{
		
		public function __construct(){
			$this->view = new View();
		}

		public function loadModel($modelName, $modelPath){
			$file = $modelPath.DIRECTORY_SEPARATOR.$modelName.'_model.php';
			if(file_exists($file)){
				require_once($file);

			$model = $modelName.'_model';
				$this->model = new $model;
			} else {
				
			}
		}
	}
?>