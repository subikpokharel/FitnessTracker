<?php

	class UsergoalController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->goaldetails = $this->loadModel('Cusgoal');
		}
		function index(){

			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$this->view->userdata = $ud;
				//print_r($ud);
				$this->goaldetails->cus_id = $ud[0]->cus_id;
				//print_r($this->goaldetails->cus_id);
				$gdata = $this->goaldetails->selectDetails();
				//print_r($gdata);
				$this->view->gd = $gdata[0];
				$this->view->title = 'Your Fitness Goals';
				$this->view->loadView('usergoal/index');
			}
		}
	}

?>