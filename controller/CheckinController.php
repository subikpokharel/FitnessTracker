<?php

	class CheckinController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->userdetails = $this->loadModel('Cusdetails');
			$this->user = $this->loadModel('User');
			$this->check = $this->loadModel('Checkin');
			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$this->view->userdata = $ud;
			}
		}

		function index(){
			$this->check->cus_id = $this->view->userdata[0]->cus_id;
			$cdata = $this->check->selectById();
			$this->view->checkindata = $cdata[0];
			//print_r($cdata);

			if (isset($_POST['btnCheckin'])) {
				//print_r($_POST);
				//print_r($this->view->userdata[0]->cus_id);
				
				$weight = (float)$_POST['weight'];
				$weight = $weight * .45;
				$this->check->weight = (int)$weight;
				//print_r($this->check->weight);
				$this->check->date = date("Y-m-d");
				//print_r($cdata);
				if ($cdata) {
					$this->check->id = $cdata[0]->id;
					$cd = $this->check->updateById();
				}else{
					$cd = $this->check->insertWeight();
				}
				if ($cd) {
					
					$_SESSION['success_message'] = "Information Successfully updated";
				}else{
					$_SESSION['error_message'] = "Could not update information";
				}
			}
			$this->view->title = 'Check In';
			$this->view->loadView('checkin/index');
		}
	}
?>