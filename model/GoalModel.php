<?php

	class GoalModel extends Model{
		public $id,$cus_id, $date, $burnt, $consumed, $total;

		function saveCusRecords(){
			$data = get_object_vars($this);
			print_r($data);
			return $this->insert('tbl_cus_records_calories',array_keys($data),array_values($data));
		}

		function selectDetails(){
			$this->date = date("Y-m-d");
			$sql = "select * from tbl_cus_records_calories where cus_id = $this->cus_id and date = '$this->date'";
			//echo($sql);
			return $this->select_query($sql);
		}


		function updateburnt($id){
			$this->id = $id;
			$data = get_object_vars($this);
			unset($data['cus_id']);
			unset($data['consumed']);
			//print_r($data);
			return $this->update('tbl_cus_records_calories',$data,array('id' => $this->id));
		}


		function updateconsumed($id){
			$this->id = $id;
			$data = get_object_vars($this);
			unset($data['cus_id']);
			unset($data['burnt']);
			//print_r($data);
			return $this->update('tbl_cus_records_calories',$data,array('id' => $this->id));
		}
	}
?>