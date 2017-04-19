<?php

	class FoodController extends Controller implements CRUDInterface{

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

				$this->food = $this->loadModel('Food');
				$this->cardio = $this->loadModel('Cardio');
			}
		}



		function index (){ 
			$this->view->foodlist = $this->food->selectAllfood();
			$this->view->title = 'Food Index';
			$this->view->loadView('food/index');
		}




		function create(){
			if (isset($_POST['btnSave'])) {
				/*print_r($_POST);
				exit;*/
				$this->food->name = $_POST['name'];
				$this->food->mid = $_POST['measurement_unit'];
				$this->food->calories = $_POST['calories'];
				$this->food->fat = $_POST['fat'];
				$this->food->carbs = $_POST['carbs'];
				$this->food->protein = $_POST['protein'];
				$this->food->created_by = $_SESSION['username'];
				$this->food->created_date = date('Y-m-d H:i:s');
				
				$st = $this->food->saveFood();
				if ($st) {
					$_SESSION['success_message'] = "Food Reference Created with id $st";
				}else{
					$_SESSION['error_message'] = "Food Reference could not be Created";
				}
			}
			$this->view->mUnit = $this->food->selectMeasurement();
			$this->view->title = 'Food Reference Create';
			$this->view->loadView('food/create');
		}


		function edit($id){

			$this->food->id = $id;
			$fooddata = $this->food->selectfoodById();
			$this->view->fooddata = $fooddata[0];
			/*print_r($this->food);
				exit;*/
			if (isset($_POST['btnUpdate'])) {
				$this->food->id = $id;
				$this->food->name = $_POST['name'];
				$this->food->mid = $_POST['measurement_unit'];
				$this->food->calories = $_POST['calories'];
				$this->food->fat = $_POST['fat'];
				$this->food->carbs = $_POST['carbs'];
				$this->food->protein = $_POST['protein'];
				$this->food->modified_by = $_SESSION['username'];
				$this->food->modified_date = date('Y-m-d H:i:s');
				/*print_r($this->food);
				exit;*/
				$st = $this->food->updatefood();
				if ($st) {
					$_SESSION['success_message'] = "Exercise Updated with id $id";
				}else{
					$_SESSION['error_message'] = "Exercise could not be Updated";
				}
			}
			$this->view->mUnit = $this->food->selectMeasurement();
			$this->view->title = 'Food Reference Edit';
			$this->view->loadView('food/edit');
		}


		function show(){
			echo "Show food Exercise";
		}

		function delete($id){
			$this->food->id = $id;
			$st = $this->food->deletefoodById();
			if ($st) {
				$_SESSION['success_message'] = "Exercise Created Deleted with id $id";
			}else{
				$_SESSION['error_message'] = "Exercise could not be Deleted";
			}
			$this->redirect('food/index');
		}

	}
?>