
<?php

	class DashboardController extends Controller{
		function index(){

			//to get the users full name or user data to use in dashboard
			$user = $this->loadModel('User');
			session_start();
			$user->username = $_SESSION['username'];
			$ud = $user->checkLogin();
			$this->view->userdata = $ud;

			
			$this->view->title = 'Dashboard Index';
			$this->view->loadView('dashboard/index');
		}
	}
?>
