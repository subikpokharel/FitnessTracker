<?php

	class ExerciseModel extends Model{
		public $id,$cus_id, $name, $time, $sets, $number_per_set,$weight,$exercise_type,$calories,$date;

		function saveExercise(){
			$this->date = date("Y-m-d");
			$data = get_object_vars($this);
			//print_r($data);
			return $this->insert('tbl_cus_exercise',array_keys($data),array_values($data));
		}

		function selectCexercise(){
			$this->date = date("Y-m-d");
			$sql = "select * from tbl_cus_exercise where cus_id = $this->cus_id and date = '$this->date' and exercise_type = 'cardio'";
			return $this->select_query($sql);
		}


		function selectSexercise(){
			$this->date = date("Y-m-d");
			$sql = "select * from tbl_cus_exercise where cus_id = $this->cus_id and date = '$this->date' and exercise_type = 'strength'";
			return $this->select_query($sql);
		}
	}
?>