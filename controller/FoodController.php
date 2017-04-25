<?php

	class FoodController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->food = $this->loadModel('Food',true);
			$this->cusfood = $this->loadModel('Cusfood');
			$this->usergoal = $this->loadModel('Goal');
			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$this->view->userdata = $ud;
				$this->cusfood->cus_id = $ud[0]->cus_id;
				$this->usergoal->cus_id = $ud[0]->cus_id;
			}
		}
		function diary(){
				$this->view->foodlist = $this->cusfood->selectfood();
				$this->view->title = 'Food Diary';
				$this->view->loadView('food/diary');
			
		}

		function database(){
			$this->view->foodlist = $this->food->selectAllfood();
			$this->view->title = 'Food Database';
			$this->view->loadView('food/database');
		}

		function add($id){
			$this->food->id = $id;
			$fooddata = $this->food->selectfoodById();
			$this->view->fooddata = $fooddata[0];
			//print_r($fooddata);
			if (isset($_POST['btnAddFood'])) {
				$this->cusfood->name = $fooddata[0]->name;
				$this->cusfood->time = $_POST['time'];
				$servings = $_POST['serving'];
				if ($servings == 1) {
					$this->cusfood->calories = $fooddata[0]->calories;
					$this->cusfood->fat = $fooddata[0]->fat;
					$this->cusfood->carbs = $fooddata[0]->carbs;
					$this->cusfood->protein = $fooddata[0]->protein;
				}else{
					$this->cusfood->calories = (int)($fooddata[0]->calories/$servings);
					$this->cusfood->fat = (int)($fooddata[0]->fat/$servings);
					$this->cusfood->carbs = (int)($fooddata[0]->carbs/$servings);
					$this->cusfood->protein = (int)($fooddata[0]->protein/$servings);
				}
				$refid = $this->cusfood->savecusFood();
				$cal = $this->cusfood->calories;
				if ($refid) {
					$record_data = $this->usergoal->selectDetails();
					//print_r($record_data);
					$this->usergoal->consumed = $record_data[0]->consumed + (int)$cal;
					$this->usergoal->total = $this->usergoal->consumed - $record_data[0]->burnt;
					$this->usergoal->updateconsumed($record_data[0]->id);
					//echo($cal);
					//$cal = (($met*$weight)*$time);
					$_SESSION['success_message'] = "Food Successfully Added";
				}else{
					$_SESSION['error_message'] = "Could not add Food";
				}
				
			}
			$this->view->title = 'Food Add';
			$this->view->loadView('food/add');
		}
	}

?>