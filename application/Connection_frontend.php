<?php 
	//kết nối csdl
	
	class Connection{
		//chữ static ở đây để thực hiện tenclass"
		public static function getInstance(){
			//su dung PDO để kết nối csdl mysql
			//new PDO("chuoi kết nối csdl" , "username","password")
			$connect = new PDO("mysql:host=localhost;dbname=web_mvc","root","");
			//xác lập lấy dũ liệu theo chuẩn unicode(để lấy dl hiển thị đc tiếng việt)
			$connect->exec("set names utrf8");
			//xác lập cách duyệt đối tượng ở tập kết quả trả về
			$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			return $connect;
		}		
	}
 ?>