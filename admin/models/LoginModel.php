<?php 
	trait LoginModel
	{
		public function modelGetRecord(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			$password = md5($password);
			$conn = Connection::getInstance();
			$query = $conn->prepare("select email, password from users where email=:_email and password=:_password");
			$query->execute(array(":_email" => $email, ":_password" => $password));
			$result = $query->fetch();
			return $result;
		}
	}
 ?>