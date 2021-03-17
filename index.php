<?php 
	session_start();
	include "application/Connection_frontend.php";
	include "application/Controller_frontend.php";
 	$controller = isset($_GET['controller']) ? $_GET['controller'] : "Home";
 	ucfirst($controller);		
 	$action =  isset($_GET['action']) ? $_GET['action'] : "index";
 	$fileController = "controllers/".$controller."Controller.php";
 	if (file_exists($fileController)) {
 		include $fileController;
 		$class = $controller."Controller";
 		$obj = new $class();
 		$obj->$action();
 	}
  ?>