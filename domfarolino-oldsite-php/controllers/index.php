<?php
	/**
	* 
	*/
	class Index extends Controller{
		
		public function __construct(){
			parent::__construct();
			session_start();
			$this->loadModel('index', 'models');
			//$this->view->data['title'] = 'Home';
			//$this->view->render('index/index');
		}

		public function index(){
			$this->view->data['title'] = 'Dom Farolino | Home';
			$this->view->data['css'][] = 'animations';
			$this->view->data['js'][] = 'carousel';
			$this->view->data['js'][] = 'work';
			$this->view->render('index/index');
		}

		public function other(){
			$this->view->data['title'] = 'Other Page';
			$this->view->render('index/index');
		}

	}
?>