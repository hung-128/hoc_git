<?php 
	trait UserModel
	{
		public function readRecord($RecordPerPage){		
			$totalRecord = $this->totalRecord();
			$p = isset($_GET['p']) && is_numeric($_GET['p'])&&$_GET["p"]>0 ? ($_GET['p']-1) : 0;
			$from = $p * $RecordPerPage;
			$conn = Connection::getInstance();
			$conn =  $conn->query("select * from users order by id desc limit $from,$RecordPerPage");
			//lay tat ca ban ghi tra ve
			$result = $conn->fetchAll();
			return $result;
		}
		public function totalRecord(){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select id from users");
			$conn->execute(array());
			return $conn->rowCount();
		}
		public function getRecord($id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from users where id=:_id");
			$conn->execute(array(":_id" => $id));
			return $conn->fetch();
		}
		public function modelUpdate($id){
			$name = $_POST["name"];
			$password = $_POST["password"];

			$conn = Connection::getInstance();
			$conn = $conn->prepare("update users set name=:_name where id=:_id");
			$conn->execute(array(":_name" => $name,":_id" => $id));
			if($password != ""){
				$password = md5($password);
				$conn = $conn->prepare("update users set password=:password where id=:_id");
				$conn->execute(array(":_password" => $password,":_id" => $id));
			}
		}
		public function listCategory(){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where parent_id=0 ");
			$conn->execute(array());
			return $conn->fetchAll();
		}

	}
 ?>