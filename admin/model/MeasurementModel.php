<?php


	class MeasurementModel extends Model{

		public $id, $measurement_unit,$created_by, $modified_by, $created_date, $modified_date;

		function saveMeasurement(){
			$data = get_object_vars($this);
			unset($data['modified_by']);
			return $this->insert('tbl_food_measurement',array_keys($data),array_values($data));
		}



		function selectAllMeasurement(){
			return $this->select('tbl_food_measurement',array('*'));
		}

		function deleteMeasurementById(){
			return $this->delete('tbl_food_measurement',$this->id);
		}


		function selectMeasurementById(){
			return $this->select('tbl_food_measurement',array('*'),array('id' => $this->id));
		}

		function updateMeasurement(){
			$data = get_object_vars($this); 
			unset($data['created_by']);
			unset($data['created_date']);
			return $this->update('tbl_food_measurement',$data,array('id' => $this->id));
		}
		
	}
?>