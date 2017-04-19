<?php

	class CardioController extends Controller implements CRUDInterface{

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

				$this->cardio = $this->loadModel('Cardio');
			}
		}



		function index (){ 
			$this->view->cardiolist = $this->cardio->selectAllCardio();
			$this->view->title = 'Cardio Exercise Index';
			$this->view->loadView('cardio/index');
		}




		function create(){
			if (isset($_POST['btnSave'])) {
				$this->cardio->name = $_POST['name'];
				$this->cardio->met = $_POST['met'];
				$this->cardio->created_by = $_SESSION['username'];
				$this->cardio->created_date = date('Y-m-d H:i:s');
				/*print_r($this->cardio);
				exit;*/
				$st = $this->cardio->saveCardio();
				if ($st) {
					$_SESSION['success_message'] = "Exercise Created with id $st";
				}else{
					$_SESSION['error_message'] = "Exercise could not be Created";
				}
			}
			$this->view->title = 'Cardio Exercise Create';
			$this->view->loadView('cardio/create');
		}


		function edit($id){

			$this->cardio->id = $id;
			$cardiodata = $this->cardio->selectCardioById();
			$this->view->cardiodata = $cardiodata[0];
			if (isset($_POST['btnUpdate'])) {
				$this->cardio->id = $id;
				$this->cardio->name = $_POST['name'];
				$this->cardio->met = $_POST['met'];
				$this->cardio->modified_by = $_SESSION['username'];
				$this->cardio->modified_date = date('Y-m-d H:i:s');
				/*print_r($this->cardio);
				exit;*/
				$st = $this->cardio->updateCardio();
				if ($st) {
					$_SESSION['success_message'] = "Exercise Updated with id $id";
				}else{
					$_SESSION['error_message'] = "Exercise could not be Updated";
				}
			}
			$this->view->title = 'Cardio Exercise Edit';
			$this->view->loadView('cardio/edit');
		}


		function show(){
			echo "Show Cardio Exercise";
		}

		function delete($id){
			$this->cardio->id = $id;
			$st = $this->cardio->deleteCardioById();
			if ($st) {
				$_SESSION['success_message'] = "Exercise Created Deleted with id $id";
			}else{
				$_SESSION['error_message'] = "Exercise could not be Deleted";
			}
			$this->redirect('cardio/index');
		}

	}
?>