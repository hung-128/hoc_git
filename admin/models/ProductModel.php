<?php 
	trait ProductModel{
		public function readModel($RecordPerPage){
			$p = isset($_GET['p'])&&is_numeric($_GET['p'])&&$_GET['p']>0 ? ($_GET['p']-1) : 0;
			$from = $p * $RecordPerPage;
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from products order by id desc limit $from,$RecordPerPage");
			$conn->execute(array());
			$conn = $conn->fetchAll();
			return $conn;
		}
		public function readModelCategory($RecordPerPage){
			$p = isset($_GET['p'])&&is_numeric($_GET['p'])&&$_GET['p']>0 ? ($_GET['p']-1) : 0;
			$from = $p * $RecordPerPage;
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from products order by id desc limit $from,$RecordPerPage");
			$conn->execute(array());
			$conn = $conn->fetchAll();
			return $conn;
		}
		public function totalRecord(){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select id from products");
			$conn->execute(array());
			return $conn->rowCount();
		}
		public function getRecord($id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from products where id=:_id");
			$conn->execute(array(":_id" => $id));
			return $conn->fetch();
		}
		public function getCategoryRecord($id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where id=:_id");
			$conn->execute(array(":_id" => $id));
			return $conn->fetch();
		}
		public function createRecord(){
			$name = $_POST["name"];					
			$description = $_POST["description"];
			$content = $_POST["contentt"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$parent_id = $_POST["parent_id"];
			$photo = "";
			$price = $_POST["price"];
			$discount = $_POST["discount"]; 
			if($_FILES["photo"]["name"] != ""){	
				$photo = time().$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/upload/product/$photo");				
			}
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into products set name=:_name, description=:_description,content=:_content,hot=:_hot,photo=:_photo,category_id=:_parent_id,price=:_price,discount=:_discount");
			$query->execute(array(":_photo"=>$photo,":_name"=>$name,":_description"=>$description,":_content"=>$content,":_hot"=>$hot,":_parent_id"=>$parent_id,":_price"=>$price,":_discount"=>$discount));
		}
		public function updateRecord($id){
			$name = $_POST["name"];					
			$description = $_POST["description"];
			$content = $_POST["contentt"];
			$hot = isset($_POST["hot"])?1:0;
			$category_id = $_POST["parent_id"];
			$price = $_POST["price"];
			$discount = $_POST["discount"];
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update products set name=:_name, description=:_description,content=:_content,hot=:_hot,category_id=:_category_id,price=:_price,discount=:_discount where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id,":_name"=>$name,":_description"=>$description,":_content"=>$content,":_hot"=>$hot,":_category_id"=>$category_id,":_price"=>$price,":_discount"=>$discount));
			//-------
			//neu user upload anh
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu de xoa di
				$oldImage = $conn->prepare("select photo from products where id=:_id");
				$oldImage->execute(array(":_id"=>$id));
				//lay mot ban ghi
				$result = $oldImage->fetch();
				if(isset($result->photo) && file_exists("../assets/upload/product/".$result->photo))
					unlink("../assets/upload/product/".$result->photo);
				//---
				//lay anh moi de update
				$photo = time().$_FILES["photo"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/upload/product/$photo");
				//update truong photo trong talble products
				//thuc hien truy van
				$query = $conn->prepare("update products set photo=:_photo where id=:_id");
				//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
				$query->execute(array(":_id"=>$id,":_photo"=>$photo));
				//---
			}
		}
		public function createImg($id){
			
		}
		public function deleteRecord($id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("delete from products where id=:_id");
			$conn->execute(array(":_id" => $id));
		}
		public function listCategory(){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where parent_id=0 ");
			$conn->execute(array());
			return $conn->fetchAll();
		}

		//lay danh muc con
		public function listCategorySub($id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where parent_id=:_id");
			$conn->execute(array(":_id" => $id));
			return $conn->fetchAll();
		}

		//kiem tra xem danh muc co danh muc con ko?
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

		//lay cac product co category_id nhu tren
		public function modelGetProduct($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id = $category_id ");
			$result = $query->fetchAll();
			return $result;
		}
		// đếm số ảnh của 1 product
		public function TotalProductImg($product_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from product_img where product_id = :_product_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute([":_product_id"=>$product_id]);
			//lay tat ca ket qua tra ve
			return $query->rowCount() ;
		}
		public function createImgRecord($product_id,$totalImg)
		{
			$photo = "";
			$total = "";
			$total = count($_FILES['photoPhu']['name']);
			$total = 4 - $totalImg;
	 		for ($i=0; $i <= $total-1 ; $i++) 
	 		{ 
	 			$photo = $_FILES['photoPhu']['name'][$i];
	 			if($photo != "")
	 			{	
					$photo = time().$_FILES["photoPhu"]["name"][$i];
					move_uploaded_file($_FILES["photoPhu"]["tmp_name"][$i], "../assets/upload/product/$photo");				
				}
				$conn = Connection::getInstance();
				$query = $conn->prepare("insert into product_img set name=:_photo,product_id=:_product_id ");
				$query->execute(array(":_photo"=>$photo,":_product_id" => $product_id));
	 		}
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
		public function deleteImgProduct($img_id){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("delete from product_img where id=:_id");
			$conn->execute(array(":_id" => $img_id));
		}
	}
 ?>
