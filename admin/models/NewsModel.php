<?php 
	trait NewsModel{
		//ham lay cac ban ghi co phan trang
		public function modelRead($recordPerPage){
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
			$query = $conn->query("select * from news order by id desc limit $from,$recordPerPage");
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from news");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array());
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from news where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate($id){
			$name = $_POST["name"];					
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"])?1:0;
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update news set name=:_name, description=:_description,content=:_content,hot=:_hot where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id,":_name"=>$name,":_description"=>$description,":_content"=>$content,":_hot"=>$hot));
			//-------
			//neu user upload anh
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu de xoa di
				$oldImage = $conn->prepare("select photo from news where id=:_id");
				$oldImage->execute(array(":_id"=>$id));
				//lay mot ban ghi
				$result = $oldImage->fetch();
				if(isset($result->photo) && file_exists("../assets/upload/news/".$result->photo))
					unlink("../assets/upload/news/".$result->photo);
				//---
				//lay anh moi de update
				$photo = time().$_FILES["photo"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/upload/news/$photo");
				//update truong photo trong talble news
				//thuc hien truy van
				$query = $conn->prepare("update news set photo=:_photo where id=:_id");
				//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
				$query->execute(array(":_id"=>$id,":_photo"=>$photo));
				//---
			}		
			//-------
		}
		public function modelCreate(){
			$name = $_POST["name"];					
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"])?1:0;
			$photo = "";
			//---
			//neu user upload anh
			if($_FILES["photo"]["name"] != ""){				
				//lay anh moi de update
				$photo = time().$_FILES["photo"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/upload/news/$photo");				
			}
			//---
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("insert into news set name=:_name, description=:_description,content=:_content,hot=:_hot,photo=:_photo");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_photo"=>$photo,":_name"=>$name,":_description"=>$description,":_content"=>$content,":_hot"=>$hot));
			//-------			
		}
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa di
			$oldImage = $conn->prepare("select photo from news where id=:_id");
			$oldImage->execute(array(":_id"=>$id));
			//lay mot ban ghi
			$result = $oldImage->fetch();
			if(isset($result->photo) && file_exists("../assets/upload/news/".$result->photo))
				unlink("../assets/upload/news/".$result->photo);
			//---
			//thuc hien truy van
			$query = $conn->prepare("delete from news where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));			
		}	
		public function listCategory(){
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from categories_test where parent_id=0 ");
			$conn->execute(array());
			return $conn->fetchAll();
		}
	
	}
 ?>