<?php


	class FoodModel extends Model{

		public $id, $name, $calories, $fat,$carbs,$protein,$sugar,$sodium,$created_by, $modified_by, $created_date, $modified_date;

		function saveFood(){
			$data = get_object_vars($this);
			unset($data['modified_by']);
			return $this->insert('tbl_food_reference',array_keys($data),array_values($data));
		}



		function selectAllFood(){
			return $this->select('tbl_food_reference',array('*'));
		}

		function deleteFoodById(){
			return $this->delete('tbl_food_reference',$this->id);
		}


		function selectFoodById(){
			return $this->select('tbl_food_reference',array('*'),array('id' => $this->id));
		}

		function updateFood(){
			$data = get_object_vars($this); 
			unset($data['created_by']);
			unset($data['created_date']);
			return $this->update('tbl_food_reference',$data,array('id' => $this->id));
		}
		
	}
?>