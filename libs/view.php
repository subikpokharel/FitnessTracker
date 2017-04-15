<?php

	class View{

		function loadView($name, $header = true, $footer = true){
			if ($header) {
				require_once "view/layout/header.php";
			}
			require_once "view/$name.php";
			if ($footer) {
				require_once "view/layout/footer.php";
			}
				
		}
	}
?>