<?php

	class UserModel extends Model{
		public $cus_id, $username, $password, $salt, $email, $Fname, $Lname, $status, $last_login;

		function checklogin(){
			//$this->select('tbl_customer_login', array('*'),array('username' => $this->username, 'status' => 1));
			return ($this->select('tbl_customer_login', array('*'),array('username' => $this->username)));
		}

		function updateLastLogin(){
			$d = date('Y-m-d H:i:s');
			$sql = "update tbl_customer_login set last_login='$d' where username='$this->username'";
			$this->select_query($sql);
		}

		function createUser(){
			$this->last_login = date('Y-m-d H:i:s');
			$this->status = 1;
			$data = get_object_vars($this);
			//print_r($data);
			return $this->insert('tbl_customer_login',array_keys($data),array_values($data));
		}
	}
?>