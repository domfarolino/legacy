<?php
class Bootstrap{
	
	protected $controller = 'index';
	protected $method = 'index';
	protected $params = array();

	public function __construct(){
		$this->url = $this->parseUrl();
		
		$this->setController();
		require_once(CONTROLLERS.DIRECTORY_SEPARATOR.$this->controller.'.php');
		$this->controller = new $this->controller();
		$this->loadModel();
		$this->setMethod();
		$this->controller->{$this->method}($this->params);
		


	}//__construct()


	public function setController(){
		if(isset($this->url[0])){
			$this->controllerName = $this->url[0];
			if(file_exists(CONTROLLERS.DIRECTORY_SEPARATOR.$this->url[0].'.php')){
				$this->controller = $this->url[0];
				unset($this->url[0]);
			} else {
				$this->controller = 'error';
			}
		
		} else {
			$this->controllerName = $this->controller;
		}
	}

	public function loadModel(){
		$this->controller->loadModel($this->controllerName, MODELS);
	}

	public function setMethod(){
		if(isset($this->url[1])){
			if(method_exists($this->controller, $this->url[1])){
				$this->method = $this->url[1];
				unset($this->url[1]);

				$this->params = $this->url ? array_values($this->url) : array();
			} else {
				//$this->controller->method = error?
				$this->pushError();
			}

		} else {

		}
	}

	public function pushError(){
		$this->controller = 'error';
		$this->method = 'index';
		require_once(CONTROLLERS.DIRECTORY_SEPARATOR.'error.php');
		$this->controller = new $this->controller();
	}

	public function parseUrl(){	
		if(isset($_GET['url'])){
			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}
?>