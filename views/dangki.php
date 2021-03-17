<?php 
  //load file layout vao day de do du lieu cua view vao file layout do
  $this->layoutPath = "layout.php";
 ?>
<!-- đăng kí -->
<style type="text/css">
	.form-group{
		width: 100%
	}
</style>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form action="index.php?controller=login&action=doRegister" method="post" class="user">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Address" name="address" required>
                                </div>
                            </div>
                            <div style="margin-left: -15px;" class="form-group">
                            	<div  class="col-sm-12">
                            		 <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address" name="email" required>
                            	</div>
                               
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 ">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" name="password" required>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div> -->
                            </div>
                            <input type="submit" placeholder="Register Account" class="btn btn-primary btn-user btn-block">
                            <hr>
                            <a href="index.html" class="btn btn-danger btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-primary btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end đăng kí -->

<!-- footer -->

