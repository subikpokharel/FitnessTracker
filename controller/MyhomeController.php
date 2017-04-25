<?php

	class MyhomeController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->usergoal = $this->loadModel('Goal');
			$this->goalref = $this->loadModel('Cusgoal');
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
				$this->usergoal->cus_id = $ud[0]->cus_id;
				//print_r($this->usergoal->cus_id);
				$record_data = $this->usergoal->selectDetails();
				$this->view->record_data = $record_data[0];
				//print_r($record_data);


				$this->goalref->cus_id = $ud[0]->cus_id;
				$calgoal = $this->goalref->selectCal();
				$this->view->calgoal = $calgoal[0];
				//print_r($calgoal);

				$this->view->title = 'My Home';
				$this->view->loadView('myhome/index');
			}
		}
	}

?>