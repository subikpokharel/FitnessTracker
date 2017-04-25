<?php

	class ExerciseController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->exercise = $this->loadModel('Exercise');
			$this->cardio = $this->loadModel('Cardio',true);
			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$this->view->userdata = $ud;
				$this->exercise->cus_id = $ud[0]->cus_id;
			}
		}
		function diary(){
			//$this->view->cardiolist = $this->cardio->selectAllCardio();
			//echo($this->exercise->cus_id);
			$this->view->cardioexerciselist = $this->exercise->selectCexercise();
			$this->view->strengthexerciselist = $this->exercise->selectSexercise();
			//$this->view->cardioexerciselist = $cardioexerciselist[0];
			/*print_r($this->view->strengthexerciselist);
			exit;*/
			$this->view->title = 'Exercise Diary';
			$this->view->loadView('exercise/diary');
			
		}

		function database(){
			$this->view->cardiolist = $this->cardio->selectAllCardio();
			$this->view->title = 'Exercise Database';
			$this->view->loadView('exercise/database');
		}
	}

?>