<?php 
	include "models/CategoryModel.php";
	class CategoryController extends Controller{
		use CategoryModel;
		public function read(){
			$RecordPerPage = 4;
			$TotalRecord = $this->totalRecord();
			$numPage = ceil($TotalRecord/$RecordPerPage);
			$result = $this->readModel($RecordPerPage);
			$this->loadView("CategoryReadView.php",['result' => $result,'numPage' => $numPage]);
		}
		public function create(){
			$action = "index.php?controller=category&action=doCreate";
			$this->loadView("CategoryEditUpdate.php",['action' => $action]);
		}
		public function doCreate(){
			$this->createRecord();
			header("location:index.php?controller=category&action=read");
		}
		public function update(){
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$result = $this->getRecord($id);
			$action = "index.php?controller=category&action=doUpdate&id=$id";
			$this->loadView("CategoryEditUpdate.php", ['result' => $result,'action' => $action]);
		}
		public function doUpdate(){
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$this->updateRecord($id);
			header("location:index.php?controller=category&action=read");
		}
		public function delete(){
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$this->deleteRecord($id);
			header("location:index.php?controller=category&action=read");
		}
	}
 ?>