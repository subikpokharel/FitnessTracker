<?php

	class UserModel extends Model{
		public $cus_id, $username, $password, $salt, $email, $Fname, $Lname, $status, $last_login, $profile_picture ;

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

		function resetPassword($salt,$password,$username){
			$this->last_login = date('Y-m-d H:i:s');
			$this->status = 1;
			$this->username = $username;
			$this->salt = $salt;
			$this->password = $password;
			$data = get_object_vars($this);
			//print_r($data);
			unset($data['email']);
			unset($data['Fname']);
			unset($data['Lname']);
			unset($data['cus_id']);
			//print_r($data);
			return $this->update('tbl_customer_login',$data,array('username' => $this->username));
		}

		function updateProfile(){
			/*$sql = "update tbl_admin set email='$this->email',Fname='$this->Fname',Lname='$this->Lname', profile_picture='$this->profile_picture' where cus_id='$this->cus_id'";
			$this->select_query($sql);*/
			//unset($data['cus_id']);
			$this->last_login = date('Y-m-d H:i:s');
			$data = get_object_vars($this);
			unset($data['username']);
			unset($data['password']);
			unset($data['salt']);
			unset($data['status']);
			unset($data['cus_id']);
			return $this->update('tbl_customer_login',$data,array('cus_id' => $this->cus_id));
			
		}
	}
?>