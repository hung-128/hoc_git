<?php
	trait HeaderModel{
		public function listCategory(){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where parent_id=0 ");
			$conn->execute(array());
			return $conn->fetchAll();
		}
		public function listCategorySub($id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where parent_id=:_id");
			$conn->execute(array(":_id" => $id));
			return $conn->fetchAll();
		}
	}
 ?>