<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/style2.css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/reponsive.css">
    <script type="text/javascript" src="assets/frontend/js/jequery.js" ></script>
    <title>webbanhang</title>
</head>
<body style="background-color: #ECECEC" >
     <div class="container-fluid header sticky-top" style="background-color: #EFEFEF;">
         <div class="container header">
            <div class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <a href="index.php"><img style="margin-left: -45px;" src="assets/frontend/images/logo.jpg"></a>
                    </div>
                    <div style="display: flex;">
                         <input id="search" type="search" placeholder="Nhập từ bạn cần tìm?" aria-describedby="button-addon1" class="form-control border-0 bg-light ">
                         <button id="button-addon1" type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </div>  
                    <div >
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a href="index.php?controller=Cart" class="nav-link text-dark ">
                                    <span>Giỏ hàng <i id="giohang" class="fas fa-cart-arrow-down"></i></span>
                                </a>
                            </li>
                            <li class="dangnhap-btn" class="nav-item">
                                <a  class="nav-link text-dark " href="">
                                    <span><?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "Tài Khoản"; ?> <i id="giohang" class="fas fa-user"></i></span>
                                </a>
                                <?php if (isset($_SESSION['user_email'])): ?>
                                <ul class="dangnhap ">
                                    <li class="dangnhap-item" style="border-bottom: 1px solid #EFEFEF;">
                                        <a href="">Tài khoản của tôi</a>
                                    </li>

                                    <li class="dangnhap-item" style="border-bottom: 1px solid #EFEFEF;">
                                        <a href="index.php?controller=login&action=orders">Đơn mua</a>                                    
                                    </li>
                                    <li class="dangnhap-item">
                                        <a href="index.php?controller=login&action=logout">Đăng xuất</a>
                                    </li>
                                </ul>    
                                <?php else: ?>
                                <ul class="dangnhap ">
                                    <li class="dangnhap-item" style="border-bottom: 1px solid #EFEFEF;">
                                        <a href="index.php?controller=login">Đăng nhập</a>
                                    </li>
                                    <li class="dangnhap-item" style="border-bottom: 1px solid #EFEFEF;">
                                        <a href="index.php?controller=login&action=register">Đăng kí tài khoản</a>
                                    </li>
                                </ul>    
                                <?php endif ?>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    //load MVC bang tay
    //include file controller cua MVC
    include "controllers/HeaderController.php";
    //khoi tao object
    $obj = new HeaderController();
    //goi den ham ben trong class controller
    $obj->index();
    ?>
    <?php echo $this->view; ?> 
    <div class="container-fluid">
        <div class="cskh" style="background-color: #C2050B;width: 100%;height: 450px;">
            <div class="container" style="display: flex;">
                <div style="width: 18%;margin-top: 20px;" >
                    <p >
                        <a href="" style="color: #FEEE05;font-weight: bold;">Hệ thống Mona media</a>
                        <br>
                        <br>
                        <a href="">Chính sách & Quy định chung</a>
                        <br>
                        <br>
                        <a href="">Chính sách đổi trả sản phẩm</a>
                        <br>
                        <br>
                        <a href="">Chính sách bảo hành</a>
                        <br>
                        <br>
                        <a href="">Chính sách giao hàng</a>
                    </p>
                </div>
                <div style="width: 18%; margin-top: 20px;">
                    <p >
                        <a href="" style="color: #FEEE05;font-weight: bold;">Thông tin khuyến mãi</a>
                        <br>
                        <br>
                        <a href="">Giới thiệu</a>
                        <br>
                        <br>
                        <a href="">Tin tức</a>
                        <br>
                        <br>
                        <a href="">Tin khuyến mãi</a>
                        <br>
                        <br>
                        <a href="">Tuyển dụng</a>
                        <br>
                        <br>
                        <a href="">Quan hệ cổ đông</a>
                    </p>
                </div>
                <div style="width: 18%; margin-top: 20px;">
                    <p >
                        <a href="" style="color: #FEEE05;font-weight: bold;">Hỗ trợ khách hàng</a>
                        <br>
                        <br>
                        <a href="">Hỗ trợ mua hàng trực tuyến</a>
                        <br>
                        <br>
                        <a href="">Các hình thức thanh toán</a>
                        <br>
                        <br>
                        <a href="">Hướng dẫn mua hàng trực tuyến</a>
                        <br>
                        <br>
                        <a href="">Phát hành hóa đơn</a>
                    </p>
                </div>
                <div style="width: 18%;margin-top: 20px;">
                    <p >
                        <a href="" style="color: #FEEE05;font-weight: bold;">Hỗ trợ khách hàng</a>
                        <br>
                        <br>
                        <a href="">Hỗ trợ mua hàng trực tuyến</a>
                        <br>
                        <br>
                        <a href="">Các hình thức thanh toán</a>
                        <br>
                        <br>
                        <a href="">Hướng dẫn mua hàng trực tuyến</a>
                        <br>
                        <br>
                        <a href="">Phát hành hóa đơn</a>
                    </p>
                </div>
                <div style="width: 28%;margin-top: 20px;margin-left: 10px;">
                        <a href="" style="color: #FEEE05;font-weight: bold;">Thanh toán an toàn</a>
                        <a href=""><img src="images/thanh toán.jpg" style="margin-top: 10px;"></a>
                        <a href="" style="color: #FEEE05;font-weight: bold;">Đăng kí nhận tin</a>
                        <div class="input-group mb-3" style="margin-top: 5px">
                            <input type="text" class="form-control" placeholder="Email...">
                            <div class=”input-group-append”>
                            <button class="btn" style="background-color: black;color: white" type="submit">Go</button>
                        </div>
                </div>
            </div>
        </div>
        <div class="ttll" style="background-color: black;width: 100%;height: 300px; color: white;">
            <div class="container" style="display: flex;">
                <div style="width: 33.33%;">
                    <div class="content-footer">
                        <p>
                            <p style="color: #FEEE05;font-weight: bold;font-size: 15px;">
                                MONACOMPUTER - LÝ THƯỜNG KIỆT 
                                <span>
                                    <a style="color: #FEEE05;" href="">[bản đồ]</a>
                                </span>
                            </p>
                            319 C16 Lý Thường Kiệt, p15, quận 10, TP.HCM
                            <br>
                            Tel: 1900 636 648 (máy lẻ 101)
                            <br>
                            Email: mon@mona.media
                            <br>
                            <a href="" style="color: #FEEE05;">[Liên hệ]</a>
                        </p>
                    </div>
                    
                
                </div>
                <div style="width: 33.33%;">
                    <div class="content-footer">
                        <p>
                            <p style="color: #FEEE05;font-weight: bold;font-size: 15px;">
                                MONACOMPUTER - LÝ THƯỜNG KIỆT 
                                <span>
                                    <a style="color: #FEEE05;" href="">[bản đồ]</a>
                                </span>
                            </p>
                            319 C16 Lý Thường Kiệt, p15, quận 10, TP.HCM
                            <br>
                            Tel: 1900 636 648 (máy lẻ 101)
                            <br>
                            Email: mon@mona.media
                            <br>
                            <a href="" style="color: #FEEE05;">[Liên hệ]</a>
                        </p>
                    </div>
                    
                
                </div>
                <div style="width: 33.33%;">
                    <div class="content-footer">
                        <p>
                            <p style="color: #FEEE05;font-weight: bold;font-size: 15px;">
                                MONACOMPUTER - LÝ THƯỜNG KIỆT 
                                <span>
                                    <a style="color: #FEEE05;" href="">[bản đồ]</a>
                                </span>
                            </p>
                            319 C16 Lý Thường Kiệt, p15, quận 10, TP.HCM
                            <br>
                            Tel: 1900 636 648 (máy lẻ 101)
                            <br>
                            Email: mon@mona.media
                            <br>
                            <a href="" style="color: #FEEE05;">[Liên hệ]</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>