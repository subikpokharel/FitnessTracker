<?php


	class UserModel extends Model{

		public $id, $username, $password, $email, $Fname, $Lname, $last_login, $status, $salt, $profile_picture;

		function checkLogin(){
			$sql = "select * from tbl_admin where status=1 and username='$this->username'";
			/*echo($sql);
			exit;*/

			//connecting database
			/************************************************************
				Database Configuration
  			*************************************************************/
  $dbUser = "spokharel";
  $dbPassword = "w1147112";
  $database = "spokharel";
  $host     = "mysqldev.aero.und.edu";

  /*$dbUser = "root";
  $dbPassword= "";
  $database = "db_455_project";
  $host     = "localhost";*/

			$conn = new mysqli($host, $dbUser, $dbPassword,$database);
			//$conn = new mysqli('localhost','root','','db_455_project');
			if($conn->connect_errno != 0){
				die('Database Connection Error');
			}
			$r = $conn->query($sql);
			//echo $r;
			if ($r->num_rows == 1) {
				return $r->fetch_object();
			}else{
				return false;
			}



			/*$r = $this->select('tbl_admin',array('*'),array('username' => $this->username));
			return $r;*/
		}


		function updateLastLogin(){

			$d = date('Y-m-d H:i:s');
			//connecting database
			/************************************************************
				Database Configuration
  			*************************************************************/
  $dbUser = "spokharel";
  $dbPassword = "w1147112";
  $database = "spokharel";
  $host     = "mysqldev.aero.und.edu";
/*
  $dbUser = "root";
  $dbPassword= "";
  $database = "db_455_project";
  $host     = "localhost";*/
			$sql = "update tbl_admin set last_login='$d' where username='$this->username'";

			//connecting database
			$conn = new mysqli($host, $dbUser, $dbPassword,$database);
			if($conn->connect_errno != 0){
				die('Database Connection Error');
			}
			$conn->query($sql);
		}

		function resetPassword($salt,$password,$username){

			$dbUser = "spokharel";
  			$dbPassword = "w1147112";
 			$database = "spokharel";
  			$host     = "mysqldev.aero.und.edu";
			
			/*$dbUser = "root";
  			$dbPassword= "";
  			$database = "db_455_project";
  			$host     = "localhost";*/
			$sql = "update tbl_admin set salt='$salt', password='$password' where username='$this->username'";
			//echo($sql);

			//connecting database
			$conn = new mysqli($host, $dbUser, $dbPassword,$database);
			if($conn->connect_errno != 0){
				die('Database Connection Error');
			}
			$conn->query($sql);
		}

		function getTotal($table){
			$dbUser = "spokharel";
  			$dbPassword = "w1147112";
 			$database = "spokharel";
  			$host     = "mysqldev.aero.und.edu";
			
			/*$dbUser = "root";
  			$dbPassword= "";
  			$database = "db_455_project";
  			$host     = "localhost";*/
			$sql = "select count(*) as total FROM $table";
			//echo($sql);

			//connecting database
			$conn = new mysqli($host, $dbUser, $dbPassword,$database);
			if($conn->connect_errno != 0){
				die('Database Connection Error');
			}
			$r = $conn->query($sql);
			if ($r->num_rows == 1) {
				return $r->fetch_object();
			}else{
				return false;
			}
		}


		function updateProfile(){

			$dbUser = "spokharel";
  			$dbPassword = "w1147112";
 			$database = "spokharel";
  			$host     = "mysqldev.aero.und.edu";
			
			/*$dbUser = "root";
  			$dbPassword= "";
  			$database = "db_455_project";
  			$host     = "localhost";*/
			$sql = "update tbl_admin set email='$this->email',Fname='$this->Fname',Lname='$this->Lname', profile_picture='$this->profile_picture' where id='$this->id'";
			//echo($sql);

			//connecting database
			$conn = new mysqli($host, $dbUser, $dbPassword,$database);
			if($conn->connect_errno != 0){
				die('Database Connection Error');
			}
			$conn->query($sql);
		}


	}
?>
