<?php

	class CusgoalModel extends Model{
		public $id,$cus_id, $goal, $calories, $weight_per_week, $macronutrients;

		function saveGoals(){
			$data = get_object_vars($this);
			//print_r($data);
			return $this->insert('tbl_cus_goal',array_keys($data),array_values($data));
		}

		function selectDetails(){
			return $this->select('tbl_cus_goal', array('*'),array('cus_id' => $this->cus_id));
		}

		function selectCal(){
			return $this->select('tbl_cus_goal', array('calories'),array('cus_id' => $this->cus_id));
		}
	}
?>