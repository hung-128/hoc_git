<?php //load file layout vào đây để đổ dữ liệu của view vào file layout
$this->layoutPath = "layout.php";
?>
<!-- slide quang cao -->
 <?php
    $category_id = isset($_GET["catid"]) ? $_GET["catid"] : 0;
    $category = $this->modelListcategoriesSub($category_id);
    $p = $_GET["p"] - 1;
    $product_array = array();
?>

<?php 
    $nameCategory_array = array(); // thực hiện phân tên trang
    $nameCategory = $this->modelGetCategory($category_id);
    array_unshift($nameCategory_array,$nameCategory->name);
    //$nameCategory_array = array_push($nameCategory_array,$nameCategory->name);
    $count = 1;
    while ($nameCategory->parent_id != 0) {
        $nameCategory = $this->modelGetCategory($nameCategory->parent_id);
        array_unshift($nameCategory_array,$nameCategory->name);
    } 
    $dem = count($nameCategory_array);
    $i = 0;
    ?>
<div style="font-size: 18px;color: #696969" class="container">
    <span ><a href="">Home</a> / 
        <?php foreach ($nameCategory_array as $key): ?>
        <a href=""><span><?php echo $key; $i++; ?> <?php if($i == $dem) break; ?>  </span></a>/
        <?php endforeach ?></span>
</div>
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
                <a href="index.php?controller=product&action=categoriesSub&catid=<?php echo $category_id ?>&priceFrom=0&priceTo=2000000&p=1">Dưới 2 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="index.php?controller=product&action=categoriesSub&catid=<?php echo $category_id ?>&priceFrom=2000000&priceTo=7000000&p=1">Từ 2-7 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="index.php?controller=product&action=categoriesSub&catid=<?php echo $category_id ?>&priceFrom=7000000&priceTo=15000000&p=1">Từ 7-15 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="index.php?controller=product&action=categoriesSub&catid=<?php echo $category_id ?>&priceFrom=15000000&priceTo=25000000&p=1">Từ 15-25 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="index.php?controller=product&action=categoriesSub&catid=<?php echo $category_id ?>&priceFrom=25000000&priceTo=30000000&p=1">Từ 25-30 triệu</a>
            </li>
            <li class="nav-item active">
                <a href="index.php?controller=product&action=categoriesSub&catid=<?php echo $category_id ?>&priceFrom=30000000&p=1">Trên 30 triệu</a>
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
                <form method="post" style="display: flex;" action="index.php?controller=product&action=categories&catid=<?php echo $category_id; ?>&p=<?php echo ($p+1) ?>">
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
<div class="container" style="">
    <ul style="display: flex;margin-top: 10px;">
    <?php foreach ($category as $key_category): ?>
        <li style="margin-left: 10px;">     
            <a href="index.php?controller=product&action=categories&catid=<?php echo $key_category->id ?>&p=1" class="btn btn-danger"><?php echo $key_category->name ?></a>
        </li>
    <?php endforeach ?>
    </ul>
</div>
<!-- chọn mức giá -->
<div class="container ">
    <div class="row noibat" style="border: 1px solid #D8D5D5;">
        <div class="col-xl-5" style="margin-left: -15px;border-right: 1px solid #D8D5D5;">
            <div style="width: 100%;">
                <a href=""><img src="assets/frontend/images-danhmuc/noibat1.jpg" style="width: 100%;"></a>
                <div style="margin-left: 10px;">
                     <div class="tragop" >Trả góp <span >0%</span></div>
                     <a href="" >Samsung Galaxy Note 20 Ultra
                    </a>
                    <div style="display: flex;">
                        <p style="font-weight: bold;">24.990.000₫</p> 
                        <del style="font-size: 14px;margin-left: 10px;">29.990.000₫</del>
                        <p style="color: red;font-size: 14px;margin-left: 10px;">-16%</p>
                    </div>
                </div>
            </div>
            <div style="width: 100%;">
                <a href=""><img src="assets/frontend/images-danhmuc/noibat2.jpg" style="width: 100%;"></a>
                <div style="margin-left: 10px;">
                     <div class="tragop" >Trả góp <span >0%</span></div>
                     <a href="" >OPPO Reno4
                    </a>
                    <div style="display: flex;">
                        <p style="font-weight: bold;">7.990.000₫</p> 
                        <del style="font-size: 14px;margin-left: 10px;">8.990.000₫</del>
                        <p style="color: red;font-size: 14px;margin-left: 10px;">-11%</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7" style="margin-top: 14px;">
            <div class="row" style="margin-left: 5px;">
                <div class="col-xl-4" style="width: 100%;border-right: 1px solid #D8D5D5;border-bottom: 1px solid #D8D5D5;width: 100%;height: 100%;border-left: 1px solid #D8D5D5;border-top: 1px solid #D8D5D5;">
                    <div class="tragop" style="margin-bottom: 5px;" >Trả góp <span >0%</span></div>
                    <a href=""><img src="assets/frontend/images-danhmuc/noibat3.jpg" style="width: 100%;margin-left: -5px;"></a>
                    <div style="margin-left: 10px;margin-left: -5px;">
                         <a href="" >OPPO Reno4</a>
                        
                        <div style="display: flex;">
                            <p style="font-weight: bold;">7.990.000₫</p> 
                            <del style="font-size: 14px;margin-left: 10px;">8.990.000₫</del>
                            <p style="color: red;font-size: 14px;margin-left: 10px;">-11%</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4" style="width: 100%;border-right: 1px solid #D8D5D5;border-bottom: 1px solid #D8D5D5;width: 100%;height: 100%;border-top: 1px solid #D8D5D5;">
                    <div class="tragop" style="margin-bottom: 5px;" >Trả góp <span >0%</span></div>
                    <a href=""><img src="assets/frontend/images-danhmuc/noibat4.jpg" style="width: 100%;margin-left: -5px;"></a>
                    <div style="margin-left: 10px;margin-left: -5px;">
                         <a href="" >OPPO Reno4
                        </a>
                        <div style="display: flex;">
                            <p style="font-weight: bold;">7.990.000₫</p> 
                            <del style="font-size: 14px;margin-left: 10px;">8.990.000₫</del>
                            <p style="color: red;font-size: 14px;margin-left: 10px;">-11%</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4" style="width: 100%;border-right: 1px solid #D8D5D5;border-bottom: 1px solid #D8D5D5;width: 100%;height: 100%;border-top: 1px solid #D8D5D5;">
                    <div class="tragop" style="margin-bottom: 5px;" >Trả góp <span >0%</span></div>
                    <a href=""><img src="assets/frontend/images-danhmuc/noibat5.jpg" style="width: 100%;margin-left: -5px;"></a>
                    <div style="margin-left: 10px;margin-left: -5px;">
                         <a href="" >OPPO Reno4
                        </a>
                        <div style="display: flex;">
                            <p style="font-weight: bold;">7.990.000₫</p> 
                            <del style="font-size: 14px;margin-left: 10px;">8.990.000₫</del>
                            <p style="color: red;font-size: 14px;margin-left: 10px;">-11%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-left: 5px;">
                <div class="col-xl-4" style="width: 100%;border-right: 1px solid #D8D5D5;border-bottom: 1px solid #D8D5D5;width: 100%;height: 100%;border-left: 1px solid #D8D5D5;">
                    <div class="tragop" style="margin-bottom: 5px;" >Trả góp <span >0%</span></div>
                    <a href=""><img src="assets/frontend/images-danhmuc/noibat3.jpg" style="width: 100%;margin-left: -5px;"></a>
                    <div style="margin-left: 10px;margin-left: -5px;">
                         <a href="" >OPPO Reno4
                        </a>
                        <div style="display: flex;">
                            <p style="font-weight: bold;">7.990.000₫</p> 
                            <del style="font-size: 14px;margin-left: 10px;">8.990.000₫</del>
                            <p style="color: red;font-size: 14px;margin-left: 10px;">-11%</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4" style="width: 100%;border-right: 1px solid #D8D5D5;border-bottom: 1px solid #D8D5D5;width: 100%;height: 100%">
                    <div class="tragop" style="margin-bottom: 5px;" >Trả góp <span >0%</span></div>
                    <a href=""><img src="assets/frontend/images-danhmuc/noibat4.jpg" style="width: 100%;margin-left: -5px;"></a>
                    <div style="margin-left: 10px;margin-left: -5px;">
                         <a href="" >OPPO Reno4
                        </a>
                        <div style="display: flex;">
                            <p style="font-weight: bold;">7.990.000₫</p> 
                            <del style="font-size: 14px;margin-left: 10px;">8.990.000₫</del>
                            <p style="color: red;font-size: 14px;margin-left: 10px;">-11%</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4" style="width: 100%;border-right: 1px solid #D8D5D5;border-bottom: 1px solid #D8D5D5;width: 100%;height: 100%">
                    <div class="tragop" style="margin-bottom: 5px;" >Trả góp <span >0%</span></div>
                    <a href=""><img src="assets/frontend/images-danhmuc/noibat5.jpg" style="width: 100%;margin-left: -5px;"></a>
                    <div style="margin-left: 10px;margin-left: -5px;">
                         <a href="" >OPPO Reno4
                        </a>
                        <div style="display: flex;">
                            <p style="font-weight: bold;">7.990.000₫</p> 
                            <del style="font-size: 14px;margin-left: 10px;">8.990.000₫</del>
                            <p style="color: red;font-size: 14px;margin-left: 10px;">-11%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $sort = isset($_POST['sort']) ? $_POST['sort'] : "";
 ?>
<div class="container" style="border: 1px solid #D8D5D5;margin-top: 10px;">
    <!-- TẠO PRODUCT_ARRAY -->
    <div class="row" style="border-bottom: 1px solid #D8D5D5;">
    <?php if ($this->modelCheckCategorySub($category_id) == true): ?>         
         <?php foreach ($category as $key_category): ?>  <!-- macbook,HP,DELL,.... -->
            <?php if ($this->modelCheckCategorySub($key_category->id) == true): ?>
                <?php $categorySub = $this->modelListcategoriesSub($key_category->id); ?>
                <?php foreach ($categorySub as $key_categorySub): ?>  <!-- macbook air, macbook pro... -->
                    <?php $product = $this->modelGetProduct($key_categorySub->id) ?>
                    <?php $product_array = array_merge($product_array,$product) ?>
                <?php endforeach ?>
            <?php else: ?>
            <?php $product = $this->modelGetProduct($key_category->id) ?> 
            <?php $product_array = array_merge($product_array,$product) ?>
            <?php endif ?>
         <?php endforeach ?>
    <?php else: ?>
        <?php $product = $this->modelGetProduct($category_id) ?> 
        <?php $product_array = array_merge($product_array,$product) ?>
    <?php endif ?>
    <!-- !!! TẠO PRODUCT_ARRAY -->

    <!-- PHÂN TRANG -->
    <?php
        $recordPerPage = 10; // số record trên 1 trang
        $count = count($product_array); //đếm tổng số record
        $numPage = ceil($count/$recordPerPage); // số trang
        $array = array();
        $from = $p * $recordPerPage;
        $n = 0;
        while ($n != $recordPerPage) {
            if (isset($product_array[$from])) {
                array_unshift($array, $product_array[$from]);
                $from++;
                $n++;
            }
            else 
                break;
         }
     ?>
     <!-- !! PHÂN TRANG -->

     <!-- SẮP XẾP -->
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
    <!-- !!! SẮP XẾP -->
        <style type="text/css">
            .tragop{
                position: absolute;
                left: 0px;
                top: 0px;
            }
        </style>
          <?php switch ($sort):
            case "priceAsc":
         ?>
         <?php usort($array, "cmp"); ?>
          <?php foreach ($array as $key_product_array): ?>
             <div style="width: 20%;position: relative;">
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
         <?php usort($array, "cmt"); ?>
          <?php foreach ($array as $key_product_array): ?>
             <div style="width: 20%;position: relative;">
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
        <?php foreach ($array as $key_product_array): ?>
             <div style="width: 20%;position: relative;">
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
    
    <div style="padding: 10px;margin-bottom: -10px; " class="container">
      <ul style="line-height: 30px;text-align: right;" class="pagination">
        <li style="margin-right: 10px;" class="page-item">Trang</li>
        <?php for($i = 1; $i <= $numPage; $i++): ?>
        <li class="page-item"><a class="page-link" href="index.php?controller=product&action=categories&catid=<?php echo $category_id; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
      </ul>
    </div>

</div>


