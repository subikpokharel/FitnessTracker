<?php

	class AskgoalModel extends Model{
		public $id,$weight;

		function selectById(){
			return $this->select('tbl_ask_goal_reference',array('*'),array('id' => $this->id));
		}

	}
?>