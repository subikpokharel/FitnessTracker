<?php

	class MeasurementController extends Controller implements CRUDInterface{

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

				$this->requiredcalories = $this->loadModel('requiredcalories');
				$this->bmi = $this->loadModel('BMI');
				$this->food = $this->loadModel('Food');
				$this->cardio = $this->loadModel('Cardio');
				$this->measurement = $this->loadModel('Measurement');
			}
		}



		function index (){ 
			$this->view->measurementlist = $this->measurement->selectAllMeasurement();
			$this->view->title = 'Food Measurement Unit Index';
			$this->view->loadView('measurement/index');
		}




		function create(){
			if (isset($_POST['btnSave'])) {

				$this->measurement->measurement_unit = $_POST['measurement_unit'];
				$this->measurement->created_by = $_SESSION['username'];
				$this->measurement->created_date = date('Y-m-d H:i:s');
				/*print_r($_POST);
				exit;*/
				$st = $this->measurement->saveMeasurement();
				if ($st) {
					$_SESSION['success_message'] = "Food Measurement Unit Reference Created with id $st";
				}else{
					$_SESSION['error_message'] = "Food Measurement Unit Reference could not be Created";
				}
			}
			$this->view->title = 'Food Measurement Unit Create';
			$this->view->loadView('measurement/create');
		}


		function edit($id){

			$this->measurement->id = $id;
			$measurementdata = $this->measurement->selectMeasurementById();
			$this->view->measurementdata = $measurementdata[0];
			if (isset($_POST['btnUpdate'])) {
				$this->measurement->id = $id;
				$this->measurement->measurement_unit = $_POST['measurement_unit'];
				$this->measurement->modified_by = $_SESSION['username'];
				$this->measurement->modified_date = date('Y-m-d H:i:s');
				/*print_r($this->measurement);
				exit;*/
				$st = $this->measurement->updateMeasurement();
				if ($st) {
					$_SESSION['success_message'] = "Data Updated with id $id";
				}else{
					$_SESSION['error_message'] = "Data could not be Updated";
				}
			}
			$this->view->title = 'Food Measurement Unit Edit';
			$this->view->loadView('measurement/edit');
		}


		function show(){
			echo "Show required calories Exercise";
		}

		function delete($id){
			$this->measurement->id = $id;
			$st = $this->measurement->deleteMeasurementById();
			if ($st) {
				$_SESSION['success_message'] = "Data Deleted with id $id";
			}else{
				$_SESSION['error_message'] = "Data could not be Deleted";
			}
			$this->redirect('measurement/index');
		}

	}
?>