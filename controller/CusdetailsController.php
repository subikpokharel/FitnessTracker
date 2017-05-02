<?php

	class CusdetailsController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->userdetails = $this->loadModel('Cusdetails');
			$this->usergoal = $this->loadModel('Cusgoal');
			$this->user = $this->loadModel('User');
			$this->askgoal = $this->loadModel('Askgoal');
			$this->bmi = $this->loadModel('Bmi',true);
			$this->check = $this->loadModel('Checkin');
			$this->requiredcalories = $this->loadModel('Requiredcalories',true);
		}
		function index(){

			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				@session_start();
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user -> checkLogin();
				//print_r($ud);
				$this->view->userdata = $ud[0];

				$udetails = $this->userdetails->selectDetails($this->view->userdata->cus_id);
				//print_r($udetails);
				if ($udetails) {
					$this->redirect('cusdetails/goal');
				}else{
					if (isset($_POST['btnAdd'])) {
						//print_r($_POST);
						if ($_POST['unit_height'] == 0) {
							$h = $_POST['height'];
							$height = (float)$h;
							$height = $height * .025;
							$this->userdetails->height = (string)$height;

						}else{
							$height = $_POST['height'];
							$this->userdetails->height = $height;
						}
						if ($_POST['unit_weight'] == 0) {
							$w = $_POST['weight'];
							$weight = (float)$w;
							$weight = $weight * .45;
							$this->userdetails->weight = (string)$weight;
						}else{
							$weight =  $_POST['weight'];
							$this->userdetails->weight = $weight;
						}
						$this->userdetails->age = date_diff(date_create($_POST['dob']), date_create('now'))->y;

						if ($_POST['gender'] == 'male') {
							$hcm = $height * 100;
							$this->userdetails->bmr = 66.47 + (13.75 * $weight) + (5 * $hcm) - (6.75 * $this->userdetails->age);
						}else{
							$hcm = $height * 100;
							$this->userdetails->bmr = 665.09 + (9.56 * $weight) + (1.84 * $hcm) - (4.67 * $this->userdetails->age);
						}
						$this->userdetails->address = $_POST['address'];
						$this->userdetails->phone = $_POST['phone'];
						$this->userdetails->gender = $_POST['gender'];
							//echo $weight;
						$h2 = (float)$height*(float)$height;
						$this->userdetails->bmi = $weight/$h2;

						$inid = $this->userdetails->saveDetails($this->view->userdata->cus_id);
						if ($inid) {
							$this->check->cus_id = $this->view->userdata->cus_id;
							$this->check->weight = $this->userdetails->weight;
							$this->check->date = date("Y-m-d");
							$this->check->insertWeight();
							$_SESSION['success_message'] = "Information Successfully added";

							$this->redirect('cusdetails/goal');
						}else{
							$_SESSION['error_message'] = "Could not add information";
						}


					}
					$this->view->title = 'Customer Details';
					$this->view->loadView('cusdetails/index',false,false);
				}
			}
		}

		function goal(){
			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{

				@session_start();
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user -> checkLogin();
				//print_r($ud);
				$this->view->userdata = $ud[0];

				$this->usergoal->cus_id = $this->view->userdata->cus_id;

				$ugoal = $this->usergoal->selectDetails();
				if ($ugoal) {
					$this->redirect('cusrecords/set');
				}else{
					//print_r($this->view->userdata);
					$userBmi = $this->userdetails->selectBmi($this->view->userdata->cus_id);
					$ubmi = $userBmi[0];
					$userBmr = $this->userdetails->selectBmr($this->view->userdata->cus_id);
					$ubmr = $userBmr[0];
					//print_r($ubmr);
					$this->bmilist = $this->bmi->selectAllBmi();
					//print_r($bl);
					foreach ($this->bmilist as $bl) {
						//echo $bl->bmi_low;
						//print_r($ubmi);
						if (($ubmi->bmi>$bl->bmi_low) && ($ubmi->bmi<$bl->bmi_high)) {
							$this->view->remarks = $bl->remarks;
							$this->view->ubmi = $ubmi;
						}
					}
					$this->view->rc = $this->requiredcalories->selectAllCalories();
					
					if (isset($_POST['btnAddGoal'])) {
						//print_r($_POST);
						$this->usergoal->cus_id = $this->view->userdata->cus_id;
						$this->askgoal->id = $_POST['weight_per_week'];
						$wt = $this->askgoal->selectById();
						$dwt = $wt[0];

						$this->usergoal->goal = $dwt->goal . ' '. 'Weight';
						$this->usergoal->weight_per_week = $dwt->weight.' '.'Pounds';
						$this->requiredcalories->id = $_POST['exercise_level'];
						$mul = $this->requiredcalories->selectCaloriesById();
						$rmul = $mul[0];
						$m = ($rmul->multiplier);


						$userGender = $this->userdetails->selectGender($this->view->userdata->cus_id);
						$ugender = $userGender[0];


						$m = (float)$m;
						$ubmr = (float)$ubmr->bmr;
						$reqcal = ((float)$m * (float)$ubmr);
						if ($dwt->goal == 'Lose') {
							$pounds = $dwt->weight;
							$lcal = 500*$pounds;
							$this->usergoal->calories = (int)($reqcal - $lcal);
						}
						elseif ($dwt->goal == 'Gain'){
							$pounds = $dwt->weight;
							$lcal = 500*$pounds;
							$this->usergoal->calories = (int)($reqcal + $lcal);
						}
						else{
							if ($ugender->gender == 'male') {
								$this->usergoal->calories = 2500;
							}else{
								$this->usergoal->calories = 2000;
							}
							
						}	
						

						if (($ugender->gender == 'male') && ($this->usergoal->calories < 1500)) {
							$this->usergoal->calories = 1500;
						}
						if (($ugender->gender == 'female') && ($this->usergoal->calories < 1200)) {
							$this->usergoal->calories = 1200;
						}

						$this->usergoal->macronutrients = (int)((float)($this->usergoal->calories)*.21);


						$inst = $this->usergoal->saveGoals();

						if ($inst) {
							$_SESSION['success_message'] = "Information Successfully added";
							$this->redirect('cusrecords/set');
						}else{
								$_SESSION['error_message'] = "Could not add information";
							}
					

					
					}

					$this->view->title = 'Customer Goal';
					$this->view->loadView('cusdetails/goal',false,false);
				}		
			}
		}
	}

?>