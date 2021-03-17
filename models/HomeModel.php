<?php 
	trait HomeModel{
		//liet ke cac danh muc cap 0
		public function modelHotProduct(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where hot = 1");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$result = $query->fetchAll();
			return $result;
		}
		public function modelListcategoriesSub(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from categories_test where parent_id = 0");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute();
			//lay tat ca ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		public function modelListcategoriesSub1($category_id){
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
		public function modelCategoryDisplayHome(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories_test where hienthitrangchu=1 and parent_id = 0 order by id asc");
			$result = $query->fetchAll();
			return $result;
		}
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
		public function data_tree($data, $parent_id = 0, $level = 0){
		    $result = [];
		    foreach($data as $item)
		    {
		        if($item['parent_id'] == $parent_id)
		        {
		            $item['level'] = $level;
		            $result[] = $item;
		            unset($data[$item['id']]);
		            $child = data_tree($data, $item['id'], $level + 1 );
		            $result = array_merge($result, $child);
		        }
	    	}
		    return $result;
		}
		public function modelGetProduct($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id = $category_id ");
			$result = $query->fetchAll();
			return $result;
		}
		
		public function modelCountRating($id){
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->prepare("select product_id from rating where product_id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->rowCount();
		}	
		public function Rating($id){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select star from rating where product_id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			$result = $query->fetchAll();
			$count = $query->rowCount() != 0 ? $query->rowCount() : 1; ;
			$rating = 0;
				foreach ($result as $key) {
					$rating += $key->star;
				}
			$rating = floor($rating/$count);
			return $rating;
		}
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot=1 order by id desc limit 0,6");
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>