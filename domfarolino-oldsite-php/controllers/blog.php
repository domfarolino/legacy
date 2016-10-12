<?php
	/**
	* Blog Controller for Dom HFD - Current Local
	*/
	class Blog extends Controller{
		
		public function __construct(){
			parent::__construct();
			session_start();
			$this->loadModel('blog', 'models');
		}

		public function index(){
			$this->view->data['title'] = 'Dom Farolino | Blog';
			$this->view->data['css'][] = 'animations';
			$this->view->data['css'][] = 'www-blog';
			$this->view->data['css'][] = 'prism';
			$this->view->data['js'][] = 'carousel';
			$this->view->data['js'][] = 'work';
			$this->view->data['js'][] = 'prism';
			$this->view->render('blog/index');
		}

		public function create(){

			if(isset($_POST['pwd'])){
				if($_POST['pwd'] == 'domfarolino.com'){
					$this->view->data['title'] = 'Create New Blog Post*';
					$this->view->data['message'] = "Create Blog Post Here";
					$this->view->render('blog/new');
				} else {
					$this->view->data['title'] = 'Blog | Login Content Editor';
					$this->view->data['message'] = "Wrong Key";
					$this->view->render('blog/login');
				}
			} else {
				$this->view->data['title'] = 'Blog | Login Content Editor';
				$this->view->data['message'] = "Login To Create A New Blog Post";
				$this->view->render('blog/login');
			}
		}

	}
?>