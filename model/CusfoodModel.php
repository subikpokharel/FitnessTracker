<?php

	class CusfoodModel extends Model{
		public $id,$cus_id, $name, $calories, $fat, $carbs,$protein,$date,$time;

		function savecusFood(){
			$this->date = date("Y-m-d");
			$data = get_object_vars($this);
			//print_r($data);
			return $this->insert('tbl_cus_food',array_keys($data),array_values($data));
		}

		function selectfood(){
			$this->date = date("Y-m-d");
			$sql = "select * from tbl_cus_food where cus_id = $this->cus_id and date = '$this->date'";
			return $this->select_query($sql);
		}
	}
?>