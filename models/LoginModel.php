<?php 
	trait LoginModel{
		public function checkLogin(){
			$email = isset($_POST['email']) ? $_POST['email'] : "";
			$password = isset($_POST['password']) ? $_POST['password'] : "";
			$password = md5($password);
			$conn = Connection::getInstance();
			$conn = $conn->prepare("select * from customers where email=:_email and password=:_password");
			$conn->execute(array(":_email" => $email, ":_password" => $password));		
			$result = $conn->fetch();
			return $result;
		}
		public function modelRegister(){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//kiem tra xem email da ton tai chua, neu chua ton tai thi insert vao csdl
			$conn = Connection::getInstance();
			$queryEmail = $conn->prepare("select email from customers where email=:_email");
			$queryEmail->execute(array(":_email" => $email));
			$checkEmail = $queryEmail->rowCount();
			if($checkEmail == 0){
				//insert ban ghi vao csdl
				$result = $conn->prepare("insert into customers set name=:_name,email=:_email,phone=:_phone,address=:_address,password=:_password");
				$result->execute(array(":_name" => $name,":_email" => $email,":_phone" => $phone,":_address" => $address,":_password" => $password ));
				header("location:index.php?controller=login&action=notify&message=registerSuccess");
			}else{
				header("location:index.php?controller=login&action=notify&message=emailExists");
			}
		}
		public function modelOrders($customer_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orders where customer_id=$customer_id order by id desc");
			//tra ve so luong ban ghi
			return $query->fetchAll();
		}
		public function modelOrderDetail($order_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orderdetails where order_id=$order_id");
			//tra ve so luong ban ghi
			return $query->fetchAll();
		}
		//lay mot ban ghi trong table customers		
		public function modelGetCustomers($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from customers where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from products where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->fetch();
		}
	}
 ?>