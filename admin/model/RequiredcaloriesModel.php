<?php


	class RequiredcaloriesModel extends Model{

		public $id, $exercise_level, $multiplier, $modified_by, $created_date, $modified_date;

		function saveCalories(){
			$data = get_object_vars($this);
			unset($data['modified_by']);
			return $this->insert('tbl_required_calories',array_keys($data),array_values($data));
		}



		function selectAllCalories(){
			return $this->select('tbl_required_calories',array('*'));
		}

		function deleteCaloriesById(){
			return $this->delete('tbl_required_calories',$this->id);
		}


		function selectCaloriesById(){
			return $this->select('tbl_required_calories',array('*'),array('id' => $this->id));
		}

		function updateCalories(){
			$data = get_object_vars($this); 
			unset($data['created_by']);
			unset($data['created_date']);
			return $this->update('tbl_required_calories',$data,array('id' => $this->id));
		}
		
	}
?>