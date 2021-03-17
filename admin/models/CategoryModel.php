<?php 
	trait CategoryModel{
		public function readModel($RecordPerPage){
			$p = isset($_GET['p'])&&is_numeric($_GET['p'])&&$_GET['p']>0 ? ($_GET['p']-1) : 0;
			$from = $p * $RecordPerPage;
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where parent_id = 0 order by id desc limit $from,$RecordPerPage");
			$conn->execute(array());
			$conn = $conn->fetchAll();
			return $conn;
		}
		public function totalRecord(){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select id from categories_test where parent_id=0");
			$conn->execute(array());
			return $conn->rowCount();
		}
		public function getRecord($id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where id=:_id");
			$conn->execute(array(":_id" => $id));
			return $conn->fetch();
		}
		public function createRecord(){
			$hienthitrangchu = isset($_POST['hienthitrangchu']) ? 1 : 0;
			$name = $_POST['name'];
			$parent_id = isset($_POST['parent_id'])? $_POST['parent_id'] : 0;
			$conn = Connection::getInstance();
			$conn = $conn->prepare("insert into categories_test set name=:_name,hienthitrangchu=:_hienthitrangchu,parent_id=:_parent_id");
			$conn->execute(array(":_name" => $name,":_hienthitrangchu" => $hienthitrangchu,":_parent_id"=>$parent_id));
		}
		public function updateRecord($id){
			$hienthitrangchu = isset($_POST['hienthitrangchu']) ? 1 : 0;
			$name = $_POST['name'];
			$parent_id = isset($_POST['parent_id'])? $_POST['parent_id'] : 0;
			$conn = Connection::getInstance();
			$conn = $conn->prepare("update categories_test set name=:_name,hienthitrangchu=:_hienthitrangchu,parent_id=:_parent_id where id=:_id");
			$conn->execute(array(":_id" => $id,":_name" => $name,":_hienthitrangchu" => $hienthitrangchu,":_parent_id"=>$parent_id));
		}
		public function deleteRecord($id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("delete from categories_test where id=:_id");
			$conn->execute(array(":_id" => $id));
		}
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