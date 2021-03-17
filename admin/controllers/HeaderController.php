<?php
	include "models/HeaderModel.php";
	class HeaderController extends Controller{
		use HeaderModel;
		public function index(){
			$this->loadView("HeaderView.php");
		}
	} 
 ?>