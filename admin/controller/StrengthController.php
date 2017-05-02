<?php

	class StrengthController extends Controller implements CRUDInterface{

		function __construct(){

			parent::__construct();
			//to get the users full name or user data to use in dashboard
			$user = $this->loadModel('User');
			@session_start();
			if (!isset($_SESSION['username'])) {
				$this->redirect('user/login');
			}else{
				$user->username = $_SESSION['username'];
				$ud = $user->checkLogin();
				$this->view->userdata = $ud;

				$this->strength = $this->loadModel('Strength');
			}
		}



		function index (){ 
			$this->view->strengthlist = $this->strength->selectAllStrength();
			$this->view->title = 'Strength Exercise Index';
			$this->view->loadView('strength/index');
		}




		function create(){
			if (isset($_POST['btnSave'])) {
				$this->strength->name = $_POST['name'];
				$this->strength->musclegroup = $_POST['musculargroup'];
				$this->strength->created_by = $_SESSION['username'];
				$this->strength->created_date = date('Y-m-d H:i:s');
				/*print_r($this->cardio);
				exit;*/
				$st = $this->strength->saveStrength();
				if ($st) {
					$_SESSION['success_message'] = "Exercise Created with id $st";
				}else{
					$_SESSION['error_message'] = "Exercise could not be Created";
				}
			}
			$this->view->title = 'Strength Exercise Create';
			$this->view->loadView('strength/create');
		}


		function edit($id){

			$this->strength->id = $id;
			$strengthdata = $this->strength->selectStrengthById();
			$this->view->strengthdata = $strengthdata[0];
			if (isset($_POST['btnUpdate'])) {
				$this->strength->id = $id;
				$this->strength->name = $_POST['name'];
				$this->strength->musclegroup = $_POST['musclegroup'];
				$this->strength->modified_by = $_SESSION['username'];
				$this->strength->modified_date = date('Y-m-d H:i:s');
				/*print_r($this->cardio);
				exit;*/
				$st = $this->strength->updateStrength();
				if ($st) {
					$_SESSION['success_message'] = "Exercise Updated with id $id";
				}else{
					$_SESSION['error_message'] = "Exercise could not be Updated";
				}
			}
			$this->view->title = 'Strength Exercise Edit';
			$this->view->loadView('strength/edit');
		}


		function show(){
			echo "Show Strength Exercise";
		}

		function delete($id){
			$this->strength->id = $id;
			$st = $this->strength->deleteStrengthById();
			if ($st) {
				$_SESSION['success_message'] = "Exercise Created Deleted with id $id";
			}else{
				$_SESSION['error_message'] = "Exercise could not be Deleted";
			}
			$this->redirect('strength/index');
		}

	}
?>