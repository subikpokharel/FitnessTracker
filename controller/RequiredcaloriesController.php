<?php

	class RequiredcaloriesController extends Controller implements CRUDInterface{

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

				$this->requiredcalories = $this->loadModel('Requiredcalories');
				$this->bmi = $this->loadModel('BMI');
				$this->food = $this->loadModel('Food');
				$this->cardio = $this->loadModel('Cardio');
			}
		}



		function index (){ 
			$this->view->requiredcalorieslist = $this->requiredcalories->selectAllCalories();
			$this->view->title = 'Required Calories Index';
			$this->view->loadView('requiredcalories/index');
		}




		function create(){
			if (isset($_POST['btnSave'])) {

				$this->requiredcalories->exercise_level = $_POST['exercise_level'];
				$this->requiredcalories->multiplier = $_POST['multiplier'];
				$this->requiredcalories->created_by = $_SESSION['username'];
				$this->requiredcalories->created_date = date('Y-m-d H:i:s');
				/*print_r($_POST);
				exit;*/
				$st = $this->requiredcalories->saveCalories();
				if ($st) {
					$_SESSION['success_message'] = "Required Calories Reference Created with id $st";
				}else{
					$_SESSION['error_message'] = "Required Calories Reference could not be Created";
				}
			}
			$this->view->title = 'requiredcalories Create';
			$this->view->loadView('requiredcalories/create');
		}


		function edit($id){

			$this->requiredcalories->id = $id;
			$requiredcaloriesdata = $this->requiredcalories->selectCaloriesById();
			$this->view->requiredcaloriesdata = $requiredcaloriesdata[0];
			if (isset($_POST['btnUpdate'])) {
				$this->requiredcalories->id = $id;
				$this->requiredcalories->exercise_level = $_POST['exercise_level'];
				$this->requiredcalories->multiplier = $_POST['multiplier'];
				$this->requiredcalories->modified_by = $_SESSION['username'];
				$this->requiredcalories->modified_date = date('Y-m-d H:i:s');
				/*print_r($this->requiredcalories);
				exit;*/
				$st = $this->requiredcalories->updateCalories();
				if ($st) {
					$_SESSION['success_message'] = "Data Updated with id $id";
				}else{
					$_SESSION['error_message'] = "Data could not be Updated";
				}
			}
			$this->view->title = 'Required Calories Edit';
			$this->view->loadView('requiredcalories/edit');
		}


		function show(){
			echo "Show required calories Exercise";
		}

		function delete($id){
			$this->requiredcalories->id = $id;
			$st = $this->requiredcalories->deleteCaloriesById();
			if ($st) {
				$_SESSION['success_message'] = "Data Deleted with id $id";
			}else{
				$_SESSION['error_message'] = "Data could not be Deleted";
			}
			$this->redirect('requiredcalories/index');
		}

	}
?>