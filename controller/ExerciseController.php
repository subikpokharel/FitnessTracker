<?php

	class ExerciseController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->exercise = $this->loadModel('Exercise');
			$this->cardio = $this->loadModel('Cardio',true);
			$this->strength = $this->loadModel('Strength',true);
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

		function sdatabase(){
			$this->view->strengthlist = $this->strength->selectAllStrength();
			$this->view->title = 'Exercise Database';
			$this->view->loadView('exercise/sdatabase');
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



		function sadd($id){
			$this->strength->id = $id;
			$strengthdata = $this->strength->selectStrengthById();
			$this->view->strengthdata = $strengthdata[0];
			//print_r($cardiodata);
			if (isset($_POST['btnAddStrength'])) {
							
				$this->exercise->name = $this->view->strengthdata->name;
				$this->exercise->exercise_type = 'strength';
				$this->exercise->number_per_set = $_POST['number_per_set'];
				$this->exercise->sets = $_POST['sets'];
				$this->exercise->weight = $_POST['weight'];
				$refid = $this->exercise->saveExercise();
				if ($refid) {
					$_SESSION['success_message'] = "Exercise Successfully Added";
				}else{
					$_SESSION['error_message'] = "Could not add Exercise";
				}

			}
			$this->view->title = 'Strength Exercise Add';
			$this->view->loadView('exercise/strengthadd');
		}


		function delete($id){
			$this->exercise->id = $id;
			$record_data = $this->usergoal->selectDetails();
			//print_r($record_data);
			$st = $this->exercise->selectCExerciseById();
			//print_r($st);

			$this->usergoal->burnt = (int)$record_data[0]->burnt - (int)$st[0]->calories;
			$this->usergoal->total = (int)$record_data[0]->total + (int)$st[0]->calories;
			$st = $this->usergoal->updateburnt($record_data[0]->id);
			//$st = $this->cusfood->deletefoodById();
			if ($st) {
				$delid = $this->exercise->deleteCExerciseById();
					
					$_SESSION['success_message'] = "Exercise Deleted with id $id";
				
			}else{
				$_SESSION['error_message'] = "Exercise could not be Deleted";
			}
					$this->view->cardioexerciselist = $this->exercise->selectCexercise();
					$this->view->strengthexerciselist = $this->exercise->selectSexercise();
					$this->view->title = 'Exercise Diary';
					$this->view->loadView('exercise/diary');
				
			
		}



		function sdelete($id){
			$this->exercise->id = $id;
			$st = $this->exercise->deleteStrengthById();
			$this->redirect('exercise/diary');
		}
	}

?>