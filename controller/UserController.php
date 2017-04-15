<?php

	class UserController extends Controller{
		function login(){
			//print_r($_POST);
			if (isset($_POST['btnLogin'])) {
				$err = array();
				if (isset($_POST['username']) && !empty($_POST['username'])) {
					$username = $_POST['username'];
				}else{
					$err['username'] = " Enter Username";
				}
				if (isset($_POST['password']) && !empty($_POST['password'])) {
					$password = $_POST['password'];
				}else{
					$err['password'] = " Enter Password";
				}
				//generating salt key
				/*echo $a = uniqid();
				echo "<br>";
				echo $pass = sha1($a.$password);*/
				if (count($err) == 0) {
					//call database or call model function
					//make model object
					$user = $this->loadModel('User');
					//require_once "model/UserModel.php";
					//$user = new UserModel();
					$user->username = $username;
					$user->password = $password;
					$u = $user -> checkLogin();
					//print_r($u);
					//$salt = $u->salt;
					if ($u) {
						$newp = sha1($u->salt.$user->password);
						/*echo $newp;
						echo "<br>";
						echo $u->password;*/
						if ($newp == $u->password) {
							//storing the data in session
							session_start();
							$_SESSION['username'] = $u->username;
							$_SESSION['email'] = $u->email;
							$_SESSION['Fname'] = $u->Fname;
							$_SESSION['Lname'] = $u->Lname;
							$user->updateLastLogin();
							$this->redirect('dashboard/index');
							//header('location:../dashboard/index');

						}else{
							$err['password'] = 'Invalid Password';
						}
					}else{
						$err['username'] = 'Invalid Username';
					}
					
				}
				
			}
			//calling view via controller in libs folder
			$this->view->loadView('user/login',false,false);
			//require_once "view/user/login.php";
		}


		function signup(){
			echo "User Signup function";
		}


		function logout(){
			session_start();
			session_destroy();
			$this->redirect('user/login');
		}

	}
?>