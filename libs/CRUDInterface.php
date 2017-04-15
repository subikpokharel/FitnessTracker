<?php

	interface CRUDInterface{

		function index ();
		function create();
		function edit($id);
		function show();
		function delete($id);
	}

?>