<?php 
	include "models/UserModel.php";
	class UserController extends Controller
	{
		use UserModel;
		public function read(){
			$RecordPerPage = 3;
			$result = $this->readRecord($RecordPerPage);
			$totalRecord = $this->totalRecord();
			$numPage = ceil($totalRecord/$RecordPerPage);
			$this->loadView("UserReadView.php",['result' => $result, 'numPage' => $numPage]);
		}
		public function update(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$action = "index.php?controller=user&action=doUpdate&id=$id";
			$result = $this->getRecord($id);
			$this->loadView("UserEditUpdate.php",['result' => $result, 'action' => $action]);
		}
		public function doUpdate(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$this->modelUpdate($id);
			header("location:index.php?controller=user&action=read");
		}
	}
 ?>