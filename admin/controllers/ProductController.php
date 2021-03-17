<?php 
	include "models/ProductModel.php";
	class ProductController extends Controller{
		use ProductModel;
		public function read(){
			$RecordPerPage = 4;
			$TotalRecord = $this->totalRecord();
			$numPage = ceil($TotalRecord/$RecordPerPage);
			$result = $this->readModel($RecordPerPage);			
			$this->loadView("ProductReadView.php",['result' => $result,'numPage' => $numPage]);
		}
		public function readCategorySub(){
			$this->loadView("ProductReadCategoryView.php");
		}
		public function readCategory(){
			$this->loadView("ProductReadCategoryView.php");
		}
		public function create(){
			$action = "index.php?controller=product&action=doCreate";
			$this->loadView("ProductEditUpdate.php",['action' => $action]);
		}
		public function doCreate(){
			$this->createRecord();
			header("location:index.php?controller=product&action=read");
		}
		public function update(){
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$result = $this->getRecord($id);
			$action = "index.php?controller=product&action=doUpdate&id=$id";
			$this->loadView("ProductEditUpdate.php", ['result' => $result,'action' => $action]);
		}
		public function doUpdate(){
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$this->updateRecord($id);
			$totalImg = $this->TotalProductImg($id);
			if ($totalImg < 4) {
				$this->createImgRecord($id,$totalImg);
				header("location:index.php?controller=product&action=read");
			}
			else {
				header("location:index.php?controller=product&action=update&id=$id&notify=invalid");
			}
		}
		public function delete(){
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$this->deleteRecord($id);
			header("location:index.php?controller=product&action=read");
		}
		public function deleteImg(){
			$img_id = isset($_GET['img_id']) ? $_GET['img_id'] : '';
			$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
			$this->deleteImgProduct($img_id);
			header("location:index.php?controller=product&action=update&id=$product_id");
		}
	}
 ?>