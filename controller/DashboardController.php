<?php

	class DashboardController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
		}
		function index(){

			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				//print_r($ud);
				$this->view->userdata = $ud;
				//print_r($this->view->userdata);
				//print_r($_SESSION['cusername']);
				$this->view->title = 'My Home';
				$this->view->loadView('dashboard/index');
			}
		}
	}

?>