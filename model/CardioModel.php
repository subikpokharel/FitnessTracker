<?php


	class CardioModel extends Model{

		public $id, $name, $met, $created_by, $modified_by, $created_date, $modified_date;

		function saveCardio(){
			$data = get_object_vars($this);
			unset($data['modified_by']);
			return $this->insert('tbl_exercise_cardio',array_keys($data),array_values($data));
		}



		function selectAllCardio(){
			return $this->select('tbl_exercise_cardio',array('*'));
		}

		function deleteCardioById(){
			return $this->delete('tbl_exercise_cardio',$this->id);
		}


		function selectCardioById(){
			return $this->select('tbl_exercise_cardio',array('*'),array('id' => $this->id));
		}

		function updateCardio(){
			$data = get_object_vars($this); 
			unset($data['created_by']);
			unset($data['created_date']);
			return $this->update('tbl_exercise_cardio',$data,array('id' => $this->id));
		}
		
	}
?>