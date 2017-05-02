<?php

	class ReportController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->goal = $this->loadModel('Goal');
			$this->check = $this->loadModel('Checkin');
			$this->userdetails = $this->loadModel('Cusdetails');
			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$this->view->userdata = $ud;
				$this->goal->cus_id = $ud[0]->cus_id;
				$this->check->cus_id = $ud[0]->cus_id;
				$this->userdetails->cus_id = $ud[0]->cus_id;
			}
		}

		function index(){
			//print_r($this->goal->cus_id);
			
			$curTime = time();
			 $pastdate = date("Y-m-d",($curTime-(60*60*24*7)));
			 $this->goal->date = $pastdate;
			 //print_r( date('M-Y', $pastdate));
			 $yrdata= strtotime($pastdate);
			 $this->view->pastdate = date('F d,Y', $yrdata);;
			$this->view->rec = $this->goal->selectRecords();
			$checkdata = $this->check->selectById();
			$wt = $this->userdetails->selectWeight($this->userdetails->cus_id);

			$this->view->weight = (int)(($wt[0]->weight - $checkdata[0]->weight)/0.45);

			/*print_r($wt);
			print_r($checkdata);*/

			$this->view->title = 'User Report';
			$this->view->loadView('report/index');
		}
	}
?>