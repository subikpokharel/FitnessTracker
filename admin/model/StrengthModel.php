<?php


	class StrengthModel extends Model{

		public $id, $name, $created_by, $modified_by, $created_date, $modified_date, $musclegroup;

		function saveStrength(){
			$data = get_object_vars($this);
			unset($data['modified_by']);
			//print_r($data);
			return $this->insert('tbl_exercise_strength',array_keys($data),array_values($data));
		}



		function selectAllStrength(){
			return $this->select('tbl_exercise_strength',array('*'));
		}

		function deleteStrengthById(){
			return $this->delete('tbl_exercise_strength',$this->id);
		}


		function selectStrengthById(){
			return $this->select('tbl_exercise_strength',array('*'),array('id' => $this->id));
		}

		function updateStrength(){
			$data = get_object_vars($this); 
			unset($data['created_by']);
			unset($data['created_date']);
			return $this->update('tbl_exercise_strength',$data,array('id' => $this->id));
		}
		
	}
?>