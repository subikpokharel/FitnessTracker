<?php

	class FoodController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
			$this->usergoal = $this->loadModel('Goal');
			$this->food = $this->loadModel('Food',true);
			@session_start();
			if (!isset($_SESSION['cusername'])) {
				$this->redirect('user/login');
			}else{
				$this->user->username = $_SESSION['cusername'];
				$ud = $this->user->checkLogin();
				$this->view->userdata = $ud;
			}
		}
		function diary(){
				$this->view->title = 'Food Diary';
				$this->view->loadView('food/diary');
			
		}

		function database(){
			$this->view->foodlist = $this->food->selectAllfood();
			$this->view->title = 'Food Database';
			$this->view->loadView('food/database');
		}
	}

?>