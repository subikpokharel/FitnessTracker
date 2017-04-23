<?php

	class CusdetailsModel extends Model{
		public $id,$cus_id, $height, $weight, $age, $bmi, $phone, $address, $gender, $bmr ;

		function selectDetails($cid){
			$this->cus_id = $cid;
			 return $this->select('tbl_customer_details', array('*'),array('cus_id' => $this->cus_id));
		}
		function saveDetails($cid){
			$this->cus_id = $cid;
			$data = get_object_vars($this);
			//print_r($data);
			return $this->insert('tbl_customer_details',array_keys($data),array_values($data));
		}
		function selectBmi($cid){
			$this->cus_id = $cid;
			 return $this->select('tbl_customer_details', array('bmi'),array('cus_id' => $this->cus_id));
		}
		function selectBmr($cid){
			$this->cus_id = $cid;
			 return $this->select('tbl_customer_details', array('bmr'),array('cus_id' => $this->cus_id));
		}
	}
?>