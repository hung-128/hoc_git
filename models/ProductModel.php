<?php 
	trait ProductsModel{
		//ham lay cac ban ghi co phan trang
		public function modelCheckCategorySub($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from categories_test where parent_id = :_category_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute([":_category_id"=>$category_id]);
			//lay tat ca ket qua tra ve
			if ($query->rowCount() > 0) {
				return true;
			}
			return false;
		}
		public function modelListcategoriesSub($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from categories_test where parent_id = :_category_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute([":_category_id"=>$category_id]);
			//lay tat ca ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		public function modelGetProduct($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id = $category_id ");
			$result = $query->fetchAll();
			return $result;
		}
		public function modelGetProduct1($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id = $category_id limit 0,5");
			$result = $query->fetchAll();
			return $result;
		}
		public function readCategorySub($category_id){
			$result = array();
			$done = array();
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from categories_test");
			$result = $query->fetchAll();
			$done = $this->data_tree($result,$category_id);
			return $done;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from products where category_id=:$category_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array());
			//tra ve so luong ban ghi
			return $query->rowCount() > 0 ? $query->rowCount():1;
		}
		//lay mot ban ghi
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from products where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->fetch();
		}

		public function modelGetCategory($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from categories_test where id=:_category_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_category_id"=>$category_id));
			//tra ve mot ban ghi
			return $query->fetch();
		}	
		public function modelRating(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$star = isset($_POST["star"]) ? $_POST["star"] : 0;
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into rating set product_id=:_product_id,star =:_star");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_product_id"=>$id,":_star" => $star));
			//tra ve mot ban ghi
			}
		public function modelCountRating(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->prepare("select product_id from rating where product_id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->rowCount();
		}	
		public function modelProductsInCategory($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id=$category_id or category_id in (select id from categories where parent_id=$category_id) order by id desc ");
			$result = $query->fetchAll();
			return $result;
		}
		public function readImg($product_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from product_img where product_id = :_product_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute([":_product_id"=>$product_id]);
			//lay tat ca ket qua tra ve
			return $query->fetchAll();
		}
	}

 ?>