<?php //load file layout vào đây để đổ dữ liệu của view vào file layout
$this->layoutPath = "layout.php";
?>
<?php $key = $_GET["key"]; ?>
<div class="container ">
    <div class="slide" style="margin-left: -5px;">
        <div class="row">
            <div class="col-xl-8">
                <div class="slide">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/frontend/images-danhmuc/slide1.png" >
                            </div>
                            <div class="carousel-item">
                                <img src="assets/frontend/images-danhmuc/slide2.png">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/frontend/images-danhmuc/slide3.png" >
                            </div>
                            <div class="carousel-item">
                                <img src="assets/frontend/images-danhmuc/slide4.png" >
                            </div>
                            <div class="carousel-item">
                                <img src="assets/frontend/images-danhmuc/slide4.png">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="margin-left: -20px; position: absolute;right: 23px;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <img src="assets/frontend/images-danhmuc/quangcao1.png" style="height: 150px;width: 100%;padding-left: -40px; ">
            </div>
        </div>
    </div>
</div>
<!-- ////slide quang cao -->
<div class="container logo"> 
    <ul style="margin-left: 0px;">
        <li>
            <a href="">
                <img src="assets/frontend/images-danhmuc/logo1.jpg">
            </a>
        </li>
        <li>
            <a href="">
                <img src="assets/frontend/images-danhmuc/logo2.jpg">
            </a>
        </li>
        <li>
            <a href="">
                <img src="assets/frontend/images-danhmuc/logo3.png">
            </a>
        </li>
        <li>
            <a href="">
                <img src="assets/frontend/images-danhmuc/logo4.jpg">
            </a>
        </li>
        <li>
            <a href="">
                <img src="assets/frontend/images-danhmuc/logo5.jpg">
            </a>
        </li>
        <li>
            <a href="">
                <img src="assets/frontend/images-danhmuc/logo6.png">
            </a>
        </li>
        <li>
            <a href="">
                <img src="assets/frontend/images-danhmuc/logo7.jpg">
            </a>
        </li>
        <li>
            <a href="">
                <img src="assets/frontend/images-danhmuc/logo8.png">
            </a>
        </li>
    </ul>
</div>
<!-- chọn mức giá -->
<div class="container filter">
    <nav class="navbar navbar-expand-lg" style="border-bottom: 1px solid #D8D5D5; ">
        <ul class="navbar-nav">
            Chọn mức giá: 
            <li class="nav-item active">
                <a href="index.php?controller=product&action=categories&catid=<?php echo $category_id ?>&priceFrom=0&priceTo=2000000">Dưới 2 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="">Từ 2-4 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="">Từ 4-7 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="">Từ 7-13 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="">Trên 13 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="">Từ 7-13 triệu</a>
            </li>
            <li class="nav-item dropdown" style="margin-top: -8px;">
                <form>
                    <a class="nav-link dropdown-toggle" href="#" id="mydropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bộ lọc
                    </a>
                    <div class="dropdown-menu boloc" aria-labelledby="mydropdown">
                        <!-- ----------------row 1----------------- -->
                        <div class="row" style="border-bottom: 1px solid #D8D5D5;padding-bottom: 10px;width: 448px;margin-left: 0px;">
                            <div class="col-xl-4 menu-boloc" style="">
                                <p>Loại điện thoại</p>
                                <ul>
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> Android</span></li>
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> Iphone(IOS)</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> Điện thoại phổ thông</span></li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p>Dung lượng pin</p>
                                <ul style="margin-left: -50px;margin-top: -10px;">
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> 
                                    Từ 3000 đến 5000 mAh</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> Pin khủng trên 5000 mAh</span></li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p>Dung lượng RAM</p>
                                <ul style="margin-left: -50px;margin-top: -10px;">
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> Dưới 4GB</span></li>
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> 4-6GB</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> 8GB trở lên</span></li>
                                </ul>
                            </div>
                        </div>
                        <!--------- row 2 ---------- -->
                        <div class="row" style="width: 448px;margin-left: 0px;">
                            <div class="col-xl-4 menu-boloc" style="">
                                <p>Bộ nhớ trong</p>
                                <ul>
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> Dưới 32GB</span></li>
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> 32-64GB</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> 128-256GB</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> 512GB trở lên</span></li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p>Tính năng camera</p>
                                <ul style="margin-left: -50px;margin-top: -10px;">
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> Chụp cận cảnh(macro)</span></li>
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> Chụp góc rộng</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> Chụp xóa phông</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> Chụp zoom xa</span></li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p>Tính năng đặc biệt</p>
                                <ul style="margin-left: -50px;margin-top: -10px;">
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> Chơi game cấu hình cao</span></li>
                                    <li><span><input type="checkbox" name="thethao" value="Bóng đá"> Bảo mật khuôn mặt</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> Bảo mật vân tay</span></li>
                                    <li> <span><input type="checkbox" name="thethao" value="Bóng đá"> Sạc pin nhanh</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-9">
                            </div>
                            <div  class="col-xl-3">
                            <input type="submit" class="btn btn-primary" value="Kết quả"  >
                            </div>
                        </div>
                    </div>

                </form>
            </li>
            <li>
                <a href=""><span><input type="checkbox" name="thethao" value="Bóng đá" style="margin-right: 3px;">Mới</span></a>
            </li>
            <li style="line-height: 40px;">
                <form method="post" style="display: flex;" action="index.php?controller=search&action=search&key=<?php echo $key; ?>">
                <select style="height: 27px;" name="sort"  class="form-control">
                      <option value="0">Sắp xếp</option>
                      <option value="priceAsc">Giá tăng dần</option>
                      <option value="priceDesc">Giá giảm dần</option>
                      <input style="height: 27px;width: 100px;line-height: 10px;margin-left: 5px;" type="submit" value="Thực hiện">
                </select>    
                </form>
            </li>
        </ul>
    </nav>
</div>
 <?php 
        function cmp($a, $b) {
           if ($a->price == $b->price) {
                return 1;
            }
            return ($a->price > $b->price) ? 1 : -1;
        }
        function cmt($a, $b) {
           if ($a->price == $b->price) {
                return 1;
            }
        return ($a->price < $b->price) ? 1 : -1;
        }
    ?>
<?php
    $sort = isset($_POST['sort']) ? $_POST['sort'] : "";
 ?>

<div class="container" style="border: 1px solid #D8D5D5;margin-top: 10px;">
    <div class="row" style="border-bottom: 1px solid #D8D5D5;">
    <?php switch ($sort):
            case "priceAsc":
         ?>
         <?php usort($data, "cmp"); ?>
          <?php foreach ($data as $key_product_array): ?>
             <div style="width: 20%;">
                <?php if ($key_product_array->discount != 0): ?>
                <div class="tragop" style="margin-bottom: 5px;margin-left: 25px;" >Giảm <span ><?php echo $key_product_array->discount ?>%</span></div>
                <?php endif ?>
                <a href="index.php?controller=Product&action=detail&id=<?php echo $key_product_array->id ?>">
                    <img src="assets/upload/product/<?php echo $key_product_array->photo; ?>" style="width: 100%;">
                    <p style="margin-top: 10px;margin-left: 10px;"><?php echo $key_product_array->name; ?></p>
                    <p style="color: #BF081F;font-weight: bold;margin-left: 10px;"><?php echo number_format($key_product_array->price) ?>₫</p>
                </a>
            </div>
         <?php endforeach ?>
         <?php break; ?>
         <?php case "priceDesc": ?>
         <?php usort($data, "cmt"); ?>
          <?php foreach ($data as $key_product_array): ?>
             <div style="width: 20%;">
                <?php if ($key_product_array->discount != 0): ?>
                <div class="tragop" style="margin-bottom: 5px;margin-left: 25px;" >Giảm <span ><?php echo $key_product_array->discount ?>%</span></div>
                <?php endif ?>
                <a href="index.php?controller=Product&action=detail&id=<?php echo $key_product_array->id ?>">
                    <img src="assets/upload/product/<?php echo $key_product_array->photo; ?>" style="width: 100%;">
                    <p style="margin-top: 10px;margin-left: 10px;"><?php echo $key_product_array->name; ?></p>
                    <p style="color: #BF081F;font-weight: bold;margin-left: 10px;"><?php echo number_format($key_product_array->price) ?>₫</p>
                </a>
            </div>
         <?php endforeach ?>
         <?php break; ?>
         <?php default: ?>
        <?php foreach ($data as $key_product_array): ?>
             <div style="width: 20%;">
                <?php if ($key_product_array->discount != 0): ?>
                <div class="tragop" style="margin-bottom: 5px;margin-left: 25px;" >Giảm <span ><?php echo $key_product_array->discount ?>%</span></div>
                <?php endif ?>
                <a href="index.php?controller=Product&action=detail&id=<?php echo $key_product_array->id ?>">
                    <img src="assets/upload/product/<?php echo $key_product_array->photo; ?>" style="width: 100%;">
                    <p style="margin-top: 10px;margin-left: 10px;"><?php echo $key_product_array->name; ?></p>
                    <p style="color: #BF081F;font-weight: bold;margin-left: 10px;"><?php echo number_format($key_product_array->price) ?>₫</p>
                </a>
            </div>
         <?php endforeach ?>
         <?php break; ?>
     <?php endswitch; ?>
    </div>
</div>
    
    <div style="padding: 10px;margin-bottom: -10px; " class="container">
      <ul style="line-height: 30px;text-align: right;" class="pagination">
        <li style="margin-right: 10px;" class="page-item">Trang</li>
        <?php for($i = 1; $i <= $numPage; $i++): ?>
        <li class="page-item"><a class="page-link" href="index.php?controller=product&action=categories&catid=<?php echo $category_id; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
      </ul>
    </div>

</div>


