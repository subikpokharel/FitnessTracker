<?php

	class CusdetailsController extends Controller{

		function __construct(){
			parent::__construct();
			@session_start();
			$this->userdetails = $this->loadModel('Cusdetails');
			$this->user = $this->loadModel('User');
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
					$this->redirect('dashboard/index');
				}else{
					if (isset($_POST['btnAdd'])) {
						//print_r($_POST);
						if ($_POST['unit_height'] == 0) {
							$h = $_POST['height'];
							$height = (float)$h;
							$height = $height * .025;
							$this->userdetails->height = (string)$height;

						}else{
							$this->userdetails->height = $_POST['height'];
						}
						if ($_POST['unit_weight'] == 0) {
							$w = $_POST['weight'];
							$weight = (float)$w;
							$weight = $weight * .45;
							$this->userdetails->weight = (string)$weight;
						}else{
							$this->userdetails->weight = $_POST['weight'];
						}
						$this->userdetails->age = date_diff(date_create($_POST['dob']), date_create('now'))->y;
						$this->userdetails->address = $_POST['address'];
						$this->userdetails->phone = $_POST['phone'];
						$this->userdetails->gender = $_POST['gender'];
							//echo $weight;
						$h2 = (float)$height*(float)$height;
						$this->userdetails->bmi = $weight/$h2;

						$inid = $this->userdetails->saveDetails($this->view->userdata->cus_id);
						if ($inid) {
							$_SESSION['success_message'] = "Information Successfully added";

							$this->redirect('dashboard/index');
							sleep(5);
						}else{
							$_SESSION['error_message'] = "Could not add information";
						}


					}
					$this->view->title = 'Customer Details';
					$this->view->loadView('cusdetails/index',false,false);
				}
			}
		}
	}

?>