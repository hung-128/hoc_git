<?php 
	trait SearchModel{
		public function modelRead($recordPerPage){
			$key = isset($_GET["key"])?$_GET["key"]: "";
			//tong so ban ghi
			$totalRecord = $this->modelTotalRecord();
			//tinh so trang
			//ham ceil la ham lay tran cua gia tri. VD: ceil(2.1) = 3
			//ham floor la ham lay san cua gia tri. VD: floor(2.6) = 2
			$numPage = ceil($recordPerPage/$totalRecord);
			//lay bien p truyen tu url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1):0;
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where name like '%$key%'  order by id desc limit $from,$recordPerPage"); // like so sanh chuoi
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			$key = isset($_GET["key"])?$_GET["key"]: "";
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from products where name like '%$key%' ");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array());
			//tra ve so luong ban ghi
			return $query->rowCount() > 0 ? $query->rowCount() : 1 ;
		}
		public function modelSmartSearch()
		{
			$key = isset($_GET["key"])?$_GET["key"]: "";
			$conn = Connection::getInstance();
			$query = $conn->prepare("select name,photo,id from products where name like '%$key%' "); // like so sanh chuoi
			//lay tat ca ban ghi tra ve
			$query->execute(array());
			return $query->fetchAll();
		}
		public function modelSearchPrice($recordPerPage){
			$fromPrice = isset($_GET["fromPrice"])?$_GET["fromPrice"]: 0;
			$toPrice = isset($_GET["toPrice"])?$_GET["toPrice"]: 0;
			//tong so ban ghi
			$totalRecord = $this->modelTotalRecordSearchPrice();
			//tinh so trang
			//ham ceil la ham lay tran cua gia tri. VD: ceil(2.1) = 3
			//ham floor la ham lay san cua gia tri. VD: floor(2.6) = 2
			$numPage = ceil($recordPerPage/$totalRecord);
			//lay bien p truyen tu url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1):0;
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where price >= $fromPrice and price <= $toPrice order by id desc limit $from,$recordPerPage"); // like so sanh chuoi
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecordSearchPrice(){
			$fromPrice = isset($_GET["fromPrice"])?$_GET["fromPrice"]: 0;
			$toPrice = isset($_GET["toPrice"])?$_GET["toPrice"]: 0;
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from products where where price >= $fromPrice and price <= $toPrice ");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array());
			//tra ve so luong ban ghi
			return $query->rowCount() > 0 ? $query->rowCount() : 1 ;
		}
	}
 ?>