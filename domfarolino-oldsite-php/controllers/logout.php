<?php
	/**
	* 
	*/
	class Logout extends Controller{
		
		public function __construct(){
			parent::__construct();
			session_start();
			$this->loadModel('logout', 'models');
			Auth::logout($this->model->db);
			header("Location: index");
		}

		public function index(){

		}

	}
?>