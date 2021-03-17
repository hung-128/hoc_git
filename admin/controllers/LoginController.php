<?php 
    include "models/LoginModel.php";
	class LoginController extends Controller
	{
		use LoginModel;
		public function index()
		{
			//goi view
			$this->loadView("LoginView.php");
		}
		public function login()
		{
			$result = $this->modelGetRecord();
			if(isset($result->email)){
				$_SESSION["admin_email"] = $result->email;
				header("location:index.php");
			} 
			else{
				header("location:index.php?controller=login&notify=notify");
			}
		}
		public function logout(){
			unset($_SESSION["admin_email"]);
			header("location:index.php");
		}
	}
 ?>