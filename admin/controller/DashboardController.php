
<?php

	class DashboardController extends Controller{
		function index(){

			//to get the users full name or user data to use in dashboard
			$user = $this->loadModel('User');
			session_start();
			if (!isset($_SESSION['username'])) {
				$this->redirect('user/login');
			}else{
				$user->username = $_SESSION['username'];
				$ud = $user->checkLogin();
				$this->view->userdata = $ud;

				$this->view->countC = $user->getTotal('tbl_exercise_cardio');
				$this->view->countS = $user->getTotal('tbl_exercise_strength');
				$this->view->countF = $user->getTotal('tbl_food_reference');
				$this->view->countM = $user->getTotal('tbl_customer_login');
				
				$this->view->title = 'Dashboard Index';
				$this->view->loadView('dashboard/index');
			}
		}
	}
?>
