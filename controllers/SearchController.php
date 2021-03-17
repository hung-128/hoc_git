<?php 
	include "models/SearchModel.php";
	class SearchController extends Controller
	{
		use SearchModel;
		public function search(){
			//xac dinh so ban ghi tren mot trang
			$recordPerPage = 16;
			//lay tong so bang hi
			$totalRecord = $this->modelToTalRecord();
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("SearchView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//smartSearch
		public function smartSearch()
		{
			$date = $this->modelSmartSearch();
			$str = "";
			foreach ($date as $rows) {
				$str = $str."<li><img src='assets/upload/product/{$rows->photo}'><a href='index.php?controller=product&action=detail&id={$rows->id}'>{$rows->name}</a></li>";
			}
			echo $str;
		}
		public function searchPrice(){
			$recordPerPage = 15;
			//lay tong so bang hi
			$totalRecord = $this->modelToTalRecordSearchPrice();
			//tinh so trang
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelSearchPrice($recordPerPage);
			$this->loadView("SearchPrice.php",["data" => $data,"numPage" => $numPage]);
		}
	}

 ?>