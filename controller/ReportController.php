<?php

	class ReportController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->goal = $this->loadModel('Goal');
			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$this->view->userdata = $ud;
				$this->goal->cus_id = $ud[0]->cus_id;
			}
		}

		function index(){
			//print_r($this->goal->cus_id);
			
			$curTime = time();
			 $pastdate = date("Y-m-d",($curTime-(60*60*24*7)));
			 $this->goal->date = $pastdate;
			 $this->view->pastdate = $pastdate;
			$this->view->rec = $this->goal->selectRecords();
			//print_r($rec);

			$this->view->title = 'User Report';
			$this->view->loadView('report/index');
		}
	}
?>