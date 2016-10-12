<?php
	/**
	* 
	*/
	class Error extends Controller{
		
		public function __construct(){
			parent::__construct();
			session_start();
		}

		public function index(){
			$this->view->data['message'] = ':( Sorry, the page you have requested does not exist';
			$this->view->data['title'] = $this->view->data['message'];
			
			$this->view->render('error/index');
		}
	}
?>