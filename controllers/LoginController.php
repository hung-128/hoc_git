<?php 
	include "models/LoginModel.php";
	
	class LoginController extends Controller
	{
		use LoginModel;
		public function index(){
			$this->loadView("dangnhap.php");
		}
		public function login(){
			$result = $this->checkLogin();
			if(isset($result->email)) {
				$_SESSION['user_email'] = $result->email;
				$_SESSION['user_id'] = $result->id;
				header("location:index.php");
			}
			else{
				header("location:index.php?controller=Login&notify=invalid");
			}
		}
		public function logout(){
			unset($_SESSION['user_email']);
			header("location:index.php");
		}
		public function register(){
			$this->loadView("dangki.php");
		}
		public function doRegister(){
			$this->modelRegister();
		}
		public function notify(){
			$this->loadView("LoginNotifyView.php");
		}

		public function orders(){
			$this->loadView("OrderView.php");
		}
	}
 ?>