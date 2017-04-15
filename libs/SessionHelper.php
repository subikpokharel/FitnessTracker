<?php

	class SessionHelper{

		static function flashMessage(){

			@session_start();
			$h = '';

			if (isset($_SESSION['success_message'])) {
				$msg = $_SESSION['success_message'];
				$h.= "<div class='alert alert-success alert-dismisssable'>
						<button type='button' class='close' data-dismiss='alert'
							aria-hidden='true'>x</button>
						<h4> <i class='icon fa fa-checked'></i> Success!</h4>
$msg
						</div> ";
				unset($_SESSION['success_message']);
			}
			elseif (isset($_SESSION['error_message'])) {
				$msg = $_SESSION['error_message'];
				$h.= "<div class='alert alert-danger alert-dismisssable'>
						<button type='button' class='close' data-dismiss='alert'
							aria-hidden='true'>x</button>
						<h4> <i class='icon fa fa-times'></i> Failed!</h4>
$msg
						</div> ";
				unset($_SESSION['error_message']);
			}
			return $h;
		}
	}
?>