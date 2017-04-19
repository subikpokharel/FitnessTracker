<?php


	class BmiModel extends Model{

		public $id, $bmi_low, $bmi_high,$remarks,$created_by, $modified_by, $created_date, $modified_date;

		function saveBmi(){
			$data = get_object_vars($this);
			unset($data['modified_by']);
			return $this->insert('tbl_bmi_reference',array_keys($data),array_values($data));
		}



		function selectAllBmi(){
			return $this->select('tbl_bmi_reference',array('*'));
		}

		function deleteBmiById(){
			return $this->delete('tbl_bmi_reference',$this->id);
		}


		function selectBmiById(){
			return $this->select('tbl_bmi_reference',array('*'),array('id' => $this->id));
		}

		function updateBmi(){
			$data = get_object_vars($this); 
			unset($data['created_by']);
			unset($data['created_date']);
			return $this->update('tbl_bmi_reference',$data,array('id' => $this->id));
		}
		
	}
?>