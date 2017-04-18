<?php

	class BmiController extends Controller implements CRUDInterface{

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

				$this->bmi = $this->loadModel('Bmi');
				$this->food = $this->loadModel('Food');
				$this->cardio = $this->loadModel('Cardio');
			}
		}



		function index (){ 
			$this->view->bmilist = $this->bmi->selectAllbmi();
			$this->view->title = 'BMI Index';
			$this->view->loadView('bmi/index');
		}




		function create(){
			if (isset($_POST['btnSave'])) {

				$this->bmi->bmi_low = $_POST['bmi_low'];
				$this->bmi->bmi_high = $_POST['bmi_high'];
				$this->bmi->remarks = $_POST['remarks'];
				$this->bmi->created_by = $_SESSION['username'];
				$this->bmi->created_date = date('Y-m-d H:i:s');
				/*print_r($_POST);
				exit;*/
				$st = $this->bmi->saveBmi();
				if ($st) {
					$_SESSION['success_message'] = "BMI Reference Created with id $st";
				}else{
					$_SESSION['error_message'] = "BMI Reference could not be Created";
				}
			}
			$this->view->title = 'BMI Create';
			$this->view->loadView('bmi/create');
		}


		function edit($id){

			$this->bmi->id = $id;
			$bmidata = $this->bmi->selectbmiById();
			$this->view->bmidata = $bmidata[0];
			if (isset($_POST['btnUpdate'])) {
				$this->bmi->id = $id;
				$this->bmi->bmi_low = $_POST['bmi_low'];
				$this->bmi->bmi_high = $_POST['bmi_high'];
				$this->bmi->remarks = $_POST['remarks'];
				$this->bmi->modified_by = $_SESSION['username'];
				$this->bmi->modified_date = date('Y-m-d H:i:s');
				/*print_r($this->bmi);
				exit;*/
				$st = $this->bmi->updateBmi();
				if ($st) {
					$_SESSION['success_message'] = "Exercise Updated with id $id";
				}else{
					$_SESSION['error_message'] = "Exercise could not be Updated";
				}
			}
			$this->view->title = 'BMI Edit';
			$this->view->loadView('bmi/edit');
		}


		function show(){
			echo "Show bmi Exercise";
		}

		function delete($id){
			$this->bmi->id = $id;
			$st = $this->bmi->deletebmiById();
			if ($st) {
				$_SESSION['success_message'] = "Exercise Created Deleted with id $id";
			}else{
				$_SESSION['error_message'] = "Exercise could not be Deleted";
			}
			$this->redirect('bmi/index');
		}

	}
?>