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
						@session_start();
						$_SESSION['cusername'] = $ud->username;
						$_SESSION['cemail'] = $ud->email;
						$_SESSION['cFname'] = $ud->Fname;
						$_SESSION['cLname'] = $ud->Lname;
						//print_r($_SESSION);
						$this->user->updateLastLogin();
						if (isset($_POST['chkRemember'])) {
							setcookie('cremember_key',true,(time()+3*24*60*60));
							setcookie('cusername',$ud->username,(time()+3*24*60*60));
						}
						$this->redirect('cusdetails/index');
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
				$this->user->profile_picture = 'user.png';

				if (isset($_FILES['profile_picture']['name']) && !empty($_FILES['profile_picture']['name'])) {
					/*print_r($_FILES);
					exit;*/
					if ($_FILES['profile_picture']['error'] == 0) {
						$fn = uniqid().'_'.$_FILES['profile_picture']['name'];
						move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'public/images/customer/'.$fn);
						$this->user->profile_picture = $fn;
					}else{
						 $this->user->profile_picture = 'user.png';
						//exit;
					}
					
				}
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

	function forgot(){
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
			if (count($err) == 0) {

				$this->user->username = $username;
				$this->user->email = $email;
				$ud = $this->user->checkLogin();
				//print_r($ud);
				if ($ud) {
					$nuser = $ud[0]->username;
					$newmail = $ud[0]->email;
					if (($nuser == $username) && ($newmail == $email)){
						@session_start();
						$_SESSION['cusername'] = $this->user->username;
						//print_r($_SESSION);
						$this->redirect('user/reset');
					}else{
						$_SESSION['error_message'] = "Invalid Email";
					}
				}else{
					$_SESSION['error_message'] = "Invalid Username";
				}
			}
		}
		$this->view->loadView('user/forgot',false,false);
	}


	function reset(){
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
				@session_start();
				$this->user->username = $_SESSION['cusername'];
				//print_r($_SESSION);
				if ($password == $cpassword) {
					//generating salt key
					$a = uniqid();
					$pass = sha1($a.$password);
					$u = $this->user->resetPassword($a, $pass, $this->user->username);
					if ($u) {
						$this->redirect('user/login');
						session_start();
						session_destroy();
						setcookie('cusername',''.(time()-1));
						setcookie('cremember_key',false.(time()-1));
						@session_start();
						$_SESSION['success_message'] = "Password Reset Successful";
					}
				}else{
					@session_start();
					$_SESSION['error_message'] = "Password did not match";
				}
			}


		}
		$this->view->loadView('user/reset',false,false);
	}
	function profile($id){
		//print_r($_POST);
		@session_start();
		$this->user->username = $_SESSION['cusername'];
		$ud = $this->user -> checkLogin();
		//print_r($ud);
		$this->view->userdata = $ud[0];
		if (isset($_POST['btnUpdate'])) {

			//$this->user->username = $username;
			//$this->user->salt = $a;
			//$this->user->password = $pass;
			$this->user->Fname = $_POST['Fname'];
			$this->user->Lname = $_POST['Lname'];
			$this->user->email = $_POST['email'];
			$this->user->cus_id = $id;
			if (isset($_FILES['profile_picture']['name']) && !empty($_FILES['profile_picture']['name'])) {
				/*print_r($_FILES);
				exit;*/
				if ($_FILES['profile_picture']['error'] == 0) {
					$fn = uniqid().'_'.$_FILES['profile_picture']['name'];
					move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'public/images/customer/'.$fn);
					$this->user->profile_picture = $fn;
				}else{
					$this->user->profile_picture = $this->view->userdata->profile_picture;
					/*@session_start();
					$_SESSION['error_message'] = "Could not update profile";*/
					//exit;
				}
			}
			else{
				$this->user->profile_picture = $this->view->userdata->profile_picture;
			}
			$u = $this->user->updateProfile();
			/*echo($u);
			exit;*/
			if ($u) {
				@session_start();
						$_SESSION['success_message'] = "Profile updated Successfully";
			}else{
				@session_start();
				$_SESSION['error_message'] = "Could not update profile";
			}

		}
		$this->view->title = 'User | Profile';
		$this->view->loadView('user/profile',false,false);
	}

	function logout(){
		session_start();
		session_destroy();
		setcookie('username',''.(time()-1));
		setcookie('remember_key',false.(time()-1));
		$this->redirect('user/login');
	}  
}

?>