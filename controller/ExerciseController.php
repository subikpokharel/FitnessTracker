<?php

	class ExerciseController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->exercise = $this->loadModel('Exercise');
			$this->cardio = $this->loadModel('Cardio',true);
			$this->userdetails = $this->loadModel('Cusdetails');
			$this->usergoal = $this->loadModel('Goal');
			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$this->view->userdata = $ud;
				$this->exercise->cus_id = $ud[0]->cus_id;
				$this->usergoal->cus_id = $ud[0]->cus_id;
			}
		}
		function diary(){
			$this->view->cardioexerciselist = $this->exercise->selectCexercise();
			$this->view->strengthexerciselist = $this->exercise->selectSexercise();
			$this->view->title = 'Exercise Diary';
			$this->view->loadView('exercise/diary');
			
		}

		function database(){
			$this->view->cardiolist = $this->cardio->selectAllCardio();
			$this->view->title = 'Exercise Database';
			$this->view->loadView('exercise/database');
		}


		function cadd($id){
			$this->cardio->id = $id;
			$cardiodata = $this->cardio->selectCardioById();
			$this->view->cardiodata = $cardiodata[0];
			//print_r($cardiodata);
			if (isset($_POST['btnAddCardio'])) {
								
				$this->exercise->name = $this->view->cardiodata->name;
				$this->exercise->time = $_POST['time'];
				$this->exercise->exercise_type = 'cardio';
				$weight = $this->userdetails->selectWeight($this->exercise->cus_id);
				/*print_r($_POST);
				echo($id);
				print_r($this->view->cardiodata);
				echo($this->exercise->cus_id);
				print_r($weight);*/
				$time = ($this->exercise->time)/60;
				$met = $this->view->cardiodata->MET;
				$val1 = (float)($met) * (float)($weight[0]->weight);
				$cal = (float)($time) * $val1;
				$this->exercise->calories = (int)$cal;
				$refid = $this->exercise->saveExercise();
				if ($refid) {
					$record_data = $this->usergoal->selectDetails();
					//print_r($record_data);
					$this->usergoal->burnt = $record_data[0]->burnt + (int)$cal;
					$this->usergoal->total = $record_data[0]->consumed - $this->usergoal->burnt;
					$this->usergoal->updateburnt($record_data[0]->id);
					//echo($cal);
					//$cal = (($met*$weight)*$time);
					$_SESSION['success_message'] = "Exercise Successfully Added";
				}else{
					$_SESSION['error_message'] = "Could not add Exercise";
				}
				


			}
			$this->view->title = 'Cardio Exercise Add';
			$this->view->loadView('exercise/cardioadd');
		}
	}

?>