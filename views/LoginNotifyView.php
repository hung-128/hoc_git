<!-- load file layout chung -->
<?php $this->layoutPath = "layout.php"; ?>
<div class="row" style="margin-top: 30px;">
	<div class="container">
		<?php 
			$message = isset($_GET["message"]) ? $_GET["message"] : "";
		 ?>
		 <?php if($message == "emailExists"): ?>
		 <div class="alert alert-danger">Email đã tồn tại!</div>
		<?php endif; ?>
		<?php if($message == "registerSuccess"): ?>
		 <div class="alert alert-danger">Đăng ký thành công!</div>
		<?php endif; ?>
		<?php if($message == "checkOutSuccess"): ?>
		 <div class="alert alert-danger">Thanh toán giỏ hàng thành công!</div>
		<?php endif; ?>
	</div>
</div>