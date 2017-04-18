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
				//$this->user = $this->loadModel('User');
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
							if (isset($_POST['chkRemember'])) {
								setcookie('remember_key',true,(time()+3*24*60*60));
								setcookie('username',$u->username,(time()+3*24*60*60));
							}
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
			setcookie('username',''.(time()-1));
			setcookie('remember_key',false.(time()-1));
			$this->redirect('user/login');
		}

		function profile(){
			$user = $this->loadModel('User');
			@session_start();
			$user->username = $_SESSION['username'];
			$u = $user -> checkLogin();
			print_r($u);
			$this->view->userdata = $u;

			if (isset($_POST['btnUpdate'])) {
				print_r($_POST);
				$user->id = $u->id;
				$user->email = $_POST['email'];
				$user->Fname = $_POST['Fname'];
				$user->Lname = $_POST['Lname'];
				//$user->profile_picture = $_POST['profile_picture'];

				if (isset($_FILES['profile_picture']['name']) && !empty($_FILES['profile_picture']['name'])) {
					$fn = uniqid().'_'.$_FILES['profile_picture']['name'];
					move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'public/images/admin/'.$fn);
					$user->profile_picture = $fn;
					//echo( $fn);
				}
				$st = $user -> updateProfile();
				$this->redirect('dashboard/index');
				
			}

			$this->view->loadView('user/profile',false,false);
		}

		

	}
?>