<?php

	class Controller{

		var $view;

		function __construct(){
			$this->view = new View();
		}

		function loadModel($name){
			$name = $name . 'Model';
			$mfname = "model/$name.php";
			if (file_exists($mfname)) {
				require_once "$mfname";
				return new $name();
			}else{
				die($name . "Model not found");
			}
			
		}


		function redirect($path){
			$path = base_url() . $path;
			header("location:$path");
		}

	}
?>