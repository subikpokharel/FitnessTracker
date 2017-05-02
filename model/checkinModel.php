<?php

	class CheckinModel extends Model{
		public $id,$weight,$cus_id, $date;

		function selectById(){
			return $this->select('tbl_cus_checkin',array('*'),array('cus_id' => $this->cus_id));
		}

		function updateById(){
				$data = get_object_vars($this);
				//print_r($data);
				return $this->update('tbl_cus_checkin',$data,array('id' => $this->id));
		}
		function insertWeight(){
			$data = get_object_vars($this);
			//print_r($data);
			return $this->insert('tbl_cus_checkin',array_keys($data),array_values($data));
		}


	}
?>