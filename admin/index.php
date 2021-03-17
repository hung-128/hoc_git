
<?php 
	//bat session
	session_start();
	include "../application/Connection.php";
	include "../application/Controller.php";
	//---
	//laybien controller truyền từ url
	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
	//viết hoa kí tự đầu tiên
	$controller = ucfirst($controller);
	//gán chuỗi để biến $controller thành đường dẫn file vật lí
	$fileController = "controllers/$controller"."Controller.php";
	//lấy biến action truyên từ url
	$action = isset($_GET["action"]) ? $_GET["action"] : "index";

	//kiểm tra nếu file tồn tại thì include nó
	if (file_exists($fileController)) {
		include $fileController;
		//ghép chuỗi để thành tên class
		$class = $controller."Controller";
		//khởi tạo biến obj của class $class
		$obj = new $class(); //<=> $obj = new UserController() 
		//gọi hàm bên trong class
		$obj->$action();
	}
 ?>