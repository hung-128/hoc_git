<?php 
	include "models/CategoryModel.php";
	class HomeController extends Controller{
		use CategoryModel;
		public function __construct()
		{
			$this->authentication();
		}
		public function index(){
			$this->loadView("HomeView.php");
		}
	}
 ?>