<?php 
	//load file model
	include "models/ProductModel.php";
	class ProductController extends Controller{
		//ke thua class ProductsModel
		use ProductsModel;
		public function categories(){
			$this->loadView("danhmuc.php");
		}
		public function categoriesSub(){
			$this->loadView("danhmucSub.php");
		}
		//chii tiet san pham
		public function detail(){
			$this->loadView("sanpham.php");
		}
		public function rating(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$this->modelRating();
			header("location:index.php?controller=product&action=detail&id=$id");
		}
	}
 ?>