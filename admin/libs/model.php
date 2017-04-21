<?php

class Model {

	private $conn;
	private function connect() {
		/************************************************************
				Database Configuration
  			*************************************************************/
 /* $dbUser = "spokharel";
  $dbPassword = "w1147112";
  $database = "spokharel";
  $host     = "mysqldev.aero.und.edu";*/

 $dbUser = "root";
  $dbPassword= "";
  $database = "db_455_project";
  $host     = "localhost";
		$this->conn = new mysqli($host, $dbUser, $dbPassword,$database);
		if ($this->conn->connect_errno != 0) {
			die('database connection error');
		}
	}

	public function insert($table, $fields, $values) {
		$this->connect();
		$sql = "insert into $table (";

		foreach ($fields as $field) {
			$sql = $sql."$field,";

		}

		$sql = substr($sql, 0, strlen($sql)-1);

		$sql = $sql.') values (';

		foreach ($values as $value) {
			$sql = $sql."'$value',";

		}

		$sql = substr($sql, 0, strlen($sql)-1);
		$sql = $sql.')';
		//echo $sql;
		$this->conn->query($sql);
		if ($this->conn->insert_id != null) {
			return $this->conn->insert_id;
		} else {
			return false;
		}

	}

	function select($table, $fields, $condition = null) {
		$this->connect();
		//select fields list ..,,,, from table name
		$sql = "select ";

		foreach ($fields as $field) {
			$sql = $sql."$field,";
		}
		$sql = substr($sql, 0, strlen($sql)-1);

		$sql = $sql." from $table";

		if ($condition) {
			$sql = $sql." where ";
			foreach ($condition as $key => $value) {
				$sql = $sql."$key='$value'";
			}

		}
		//echo $sql;
		$res  = $this->conn->query($sql);
		$data = array();
		if ($res->num_rows > 0) {

			while ($a = $res->fetch_object()) {
				array_push($data, $a);

			}

		}
		return $data;
	}

	function delete($table, $id) {

		$this->connect();
		echo $sql = "delete from $table where id=$id";
		if ($this->conn->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function update($table, $data, $condition) {
		$this->connect();
		$sql = "update $table  set ";

		foreach ($data as $key => $value) {
			$sql = $sql."$key='$value',";

		}

		$sql = substr($sql, 0, strlen($sql)-1);

		if ($condition) {
			$sql = $sql." where ";
			foreach ($condition as $key => $value) {
				$sql = $sql."$key='$value'";
			}

		}

		//echo $sql;
		$this->conn->query($sql);
		if ($this->conn->affected_rows == 1) {
			return true;
		} else {
			return false;
		}

	}

	function select_query($sql) {
		$this->connect();
		//select fields list ..,,,, from table name
		$res  = $this->conn->query($sql);
		$data = array();
		if ($res->num_rows > 0) {

			while ($a = $res->fetch_object()) {
				array_push($data, $a);

			}

		}
		return $data;
		//echo $sql;
	}
}

?>
