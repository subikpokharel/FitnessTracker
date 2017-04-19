<?php 
class UserController extends Controller{

	function __construct(){
			parent::__construct();
			@session_start();
			$this->user = $this->loadModel('User');
		}

	function login(){

		if (isset($_POST)) {
			//print_r($_POST);
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
			if (count($err) == 0) {
				/*echo $a = uniqid();
				echo "<br>";
				echo $pass = sha1($a.$password);*/
				$this->user->username = $username;
				$this->user->password = $password;
				$this->view->userdata = $this->user->checkLogin();
				//print_r($this->view->userdata);
				if ($this->view->userdata) {
					$ud = $this->view->userdata[0];
					//print_r($ud);
					$newp = sha1($ud->salt.$password);
					//echo $newp;
					if (($newp == $ud->password) && ($ud->status == 1)) {
						session_start();
						$_SESSION['cusername'] = $ud->username;
						$_SESSION['cemail'] = $ud->email;
						$_SESSION['cFname'] = $ud->Fname;
						$_SESSION['cLname'] = $ud->Lname;
						$this->user->updateLastLogin();
						if (isset($_POST['chkRemember'])) {
							setcookie('cremember_key',true,(time()+3*24*60*60));
							setcookie('cusername',$ud->username,(time()+3*24*60*60));
						}
						$this->redirect('dashboard/index');
					}else{
						$_SESSION['error_message'] = "Invalid password";
					}
				}else{
					$_SESSION['error_message'] = "Invalid Username or Password";
				}
			}

			
		}

		$this->view->title = 'FitnessTracker | Log in';
		$this->view->loadView('user/login',false,false);
	}

	function signup(){
		//print_r($_POST);
		if (isset($_POST['btnSignup'])) {
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
			if (isset($_POST['Fname']) && !empty($_POST['Fname'])) {
				$Fname = $_POST['Fname'];
			}else{
				$err['Fname'] = " Enter First Name";
			}
			if (isset($_POST['Lname']) && !empty($_POST['Lname'])) {
				$Lname = $_POST['Lname'];
			}else{
				$err['Lname'] = " Enter Last Name";
			}
			if (isset($_POST['email']) && !empty($_POST['email'])) {
				$email = $_POST['email'];
			}else{
				$err['email'] = " Enter Email";
			}


			if (count($err) == 0) {
				//generating salt key
				$a = uniqid();
				$pass = sha1($a.$password);
				$this->user->username = $username;
				$this->user->salt = $a;
				$this->user->password = $pass;
				$this->user->Fname = $Fname;
				$this->user->Lname = $Lname;
				$this->user->email = $email;

				/*if (isset($_FILES['profile_picture']['name']) && !empty($_FILES['profile_picture']['name'])) {
					$fn = uniqid().'_'.$_FILES['profile_picture']['name'];
					move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'public/images/customer/'.$fn);
					$this->user->profile_picture = $fn;
					//echo( $fn);
				}*/
				 $createid = $this->user->createUser();
				 //echo $createid;
				 if ($createid) {
				 	$this->redirect('user/login');
				 	$_SESSION['success_message'] = "Sign Up Success. Welcome to the family!!";
				 }else{
				 	$_SESSION['error_message'] = "Sign Up Not Successful";
				 }
			}
		}

		$this->view->title = 'FitnessTracker | Sign Up';
		$this->view->loadView('user/signup',false,false);
	}
  
}

?>