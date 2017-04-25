<?php

	class CusrecordsController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->usergoal = $this->loadModel('Goal');
		}
		function set(){

			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$ud = $ud[0];
				//print_r($ud->cus_id);
				$this->usergoal->cus_id = $ud->cus_id;
				$record_data = $this->usergoal->selectDetails();
				//print_r($record_data);
				//$record_data = $record_data[0];
				if ($record_data) {
					$this->redirect('Myhome/index');
				}else{
					$this->usergoal->cus_id = $ud->cus_id;
					$this->usergoal->date = date("Y-m-d");
					$this->usergoal->burnt = 0;
					$this->usergoal->consumed = 0;
					$this->usergoal->total = 0;
					$refid = $this->usergoal->saveCusRecords();
					if ($refid) {
						$this->redirect('Myhome/index');
					}else{
						$this->redirect('user/login');
					}
				}
			}
		}
	}

?>