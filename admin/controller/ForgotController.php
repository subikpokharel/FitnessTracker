<?php

	class ForgotController extends Controller{

		function index(){
			$this->view->loadView('forgot/index',false,false);
		}

		function submit(){
			//print_r($_POST);
			if (isset($_POST['btnSubmit'])) {
				$err = array();
				if (isset($_POST['username']) && !empty($_POST['username'])) {
					 $username = $_POST['username'];
				}else{
					$err['username'] = " Enter Username";
				}
				if (isset($_POST['email']) && !empty($_POST['email'])) {
					 $email = $_POST['email'];
				}else{
					$err['email'] = " Enter Email";
				}

				//print_r($err);

				if (count($err) == 0) {
					//call database or call model function
					//make model object
					$user = $this->loadModel('User');
					//require_once "model/UserModel.php";
					//$user = new UserModel();
					$user->username = $username;
					$user->email = $email;
					$u = $user -> checkLogin();
					//print_r($u);
					if ($u->username == $user->username && $u->email == $user->email) {
						session_start();
						$_SESSION['username'] = $u->username;
						$this->redirect('forgot/reset');
					}
					else{
						@session_start();
						$_SESSION['error_message'] = "Username or Email did not match";
						$this->redirect('forgot/index');
					}
				}
			}
			
		}


		function reset(){
			//print_r($_POST);
			if (isset($_POST['btnReset'])) {
				$err = array();
				if (isset($_POST['password']) && !empty($_POST['password'])) {
					 $password = $_POST['password'];
				}else{
					$err['password'] = " Enter Password";
				}
				if (isset($_POST['cpassword']) && !empty($_POST['cpassword'])) {
					 $cpassword = $_POST['cpassword'];
				}else{
					$err['cpassword'] = " Please Confirm Password";
				}

				if (count($err) == 0) {
					$user = $this->loadModel('User');
					session_start();
					$user->username = $_SESSION['username'];
					//session_destroy();
					if ($password == $cpassword) {
						//generating salt key
						$a = uniqid();
						$pass = sha1($a.$password);
						$u = $user->resetPassword($a, $pass, $user->username);
						$this->redirect('user/login');
						session_start();
						session_destroy();
						setcookie('username',''.(time()-1));
						setcookie('remember_key',false.(time()-1));
						@session_start();
						$_SESSION['success_message'] = "Password Reset Successful";
						
					}else{
						@session_start();
						$_SESSION['error_message'] = "Password did not match";
					}
				}
			}

			$this->view->loadView('forgot/reset',false,false);

		}
	}
?>