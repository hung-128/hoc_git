<?php 
	//load file model
	include "models/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		//ham tao
		public function __construct(){
			//neu chua ton tai gio hang thi khoi tao no
			if(isset($_SESSION["cart"]) == false)
				$_SESSION["cart"] = array();
		}
		//them san pham vao gio hang
		public function create(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham cartAdd de them san pham vao session array
			$this->cartAdd($id);
			//quay tro lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//ham liet ke cac san pham
		public function index(){
			//goi view
			$this->loadView("CartView.php");
		}
		//xoa toan bo gio hang
		public function destroy(){
			$this->cartDestroy();
			//quay tro lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//xoa tung san pham
		public function remove(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$this->cartDelete($id);
			//quay tro lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//cap nhat san pham
		public function update(){
			//duyet cac phan tu trong session array de update lai so luong
			foreach($_SESSION["cart"] as $product){
				$number = $_POST["product_".$product["id"]];
				//echo "$number <br>";
				//goi ham update so luong
				$this->cartUpdate($product["id"],$number);
			}
			//quay tro lai trang gio hang
			header("location:index.php?controller=cart");
		}
		//thanh toan gio hang
		public function checkout(){
			//neu user chua dang nhap thi yeu cau dang nhap de thanh toan
			if($_SESSION["user_email"]){
				$this->cartCheckOut();
				//quay tro lai trang gio hang
				header("location:index.php?controller=login&action=orders");
			}else{
				header("location:index.php?controller=login&action=login");
			}
		}
	}
 ?>