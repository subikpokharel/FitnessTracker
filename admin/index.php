<?php
 

 //bringing the config.php file
	require_once "config/config.php";
//error message class
	require_once "libs/SessionHelper.php";
//bringing the CRUD interface
	require_once "libs/CRUDInterface.php";
	require_once "libs/model.php";
//bringing the view.php file
	require_once "libs/view.php";
//bringing the controller.php file
	require_once "libs/controller.php";



 //retrive query string paramter retrived from htaccess
	$url = $_GET['url'];
//converting $url to array
	$urla = explode('/', $url);
//preparing controller name
	$cname = ucfirst($urla[0]).'Controller' ;
	$cfname = 'controller/'. $cname.'.php';

//Check if we have Controller name in the controller folder
	if (file_exists($cfname)) {
		require_once $cfname;
		$obj = new $cname();
		//check if there is function name entered by the user
		if (isset($urla[1]) && !empty($urla[1])) {
			//check if there is the function in the Controller
			if (method_exists($obj, $urla[1])) {
				
				if (isset($urla[2]) && !empty($urla[2])) {
					$obj -> $urla[1]($urla[2]);
				}else{
					$obj -> $urla[1](); //call the function
				}
			}else{
				echo "$urla[1] not found in $cname";
			}
		}
	}else{
		echo "$cname not found";
	}

?>