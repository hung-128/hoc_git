<?php //load file layout vào đây để đổ dữ liệu của view vào file layout
    $this->layoutPath = "layout.php";
 ?>
 <?php
  $id = isset($_GET['id']) ? $_GET['id'] : 0; 
  $product = $this->modelGetRecord($id); ?>
    <script type="text/javascript">
        function changeImage(imgId){
        //lay gia tri thuoc tinh src cua the html co id truyen vao ham
        var srcImg = document.getElementById(imgId).getAttribute("src");
        //tac dong vao the html co id=imgShow, set lai gia tri cua thuoc tinh src
        document.getElementById('imgShow').setAttribute("src",srcImg);
        document.getElementById('imgShow').setAttribute("style","padding: 20px 0px;width: 350px;");
        //reset boeder
        resetBorderImage();
        //tac dong vao the html co id=imgId, set lai gia tri cua thuoc tinh style
        document.getElementById(imgId).setAttribute("style","border:1px solid green,");
    }
    function resetBorderImage(){
        //tac dong vao the html co id=imgId, set lai gia tri cua thuoc tinh style
        document.getElementById("img1").setAttribute("style","border-width:0px;width: 110px");
        document.getElementById("img2").setAttribute("style","border-width:0px;width: 110px");
        document.getElementById("img3").setAttribute("style","border-width:0px;width: 110px");
        document.getElementById("img4").setAttribute("style","border-width:0px;width: 110px");
        document.getElementById("img5").setAttribute("style","border-width:0px;width: 110px");
    }
    </script>
    <div class="container" style="border-bottom: 1px solid #D8D5D5; height: 780px;">
        <div class="row">
            <div class="col-xl-3" >
                <div class="menu-duongdan">
                    <p style="color: #949494;"><a href="">TRANG CHỦ</a> / <a href="">CAMERA</a></p>
                </div>
                <div class="menuSP">
                    <div class="header" style="border-bottom: 1px solid #D8D5D5;height: 30px;width: 150px;">
                        <p style="font-weight: bold;font-size: 15px;">Sản Phẩm Tương Tự</p>
                    </div>
                    <div class="menusp-content" style="width: 100%;border: 1px solid #D8D5D5;">
                        <ul>
                            <?php $sameProduct = $this->modelGetProduct1($product->category_id) ?>
                            <?php foreach ($sameProduct as $key ): ?>
                            <li style="display: flex;">
                                <img src="assets/upload/product/<?php echo $key->photo ?>">
                                <p>
                                    <a href="index.php?controller=product&action=detail&id=<?php echo $key->id ?>"><?php echo $key->name ?></a>
                                    <br>
                                        <span><?php echo number_format($key->price) ?>đ</span>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-5" style="">
                <div style="border: 2px solid #EFEFEF;text-align: center;margin-top: 80px;">
                    <img src="assets/upload/product/<?php echo $product->photo ?>" id="imgShow" style="padding: 20px 0px;width: 350px;">
                </div>
                <ul style="display: flex;border: 1px solid #EFEFEF;height: 130px;margin-top: 20px;text-align: center;padding: 0px;">
                    <?php
                        $product_img = $this->readImg($id); 
                        $n=1;
                     ?>
                     <?php foreach ($product_img as $key): ?>
                        <li style="width: 25%;overflow: hidden;padding: 10px 0px;margin-top: 5px;margin-left: 0px;">
                            <img style="width: 110px" onclick="changeImage('img<?php echo $n ?>');" id="img<?php echo $n ?>" src="assets/upload/product/<?php echo $key->name ?>">
                        </li>
                        <?php $n++; ?>
                     <?php endforeach ?>
                </ul>
                <a href="index.php?controller=Cart&action=create&id=<?php echo $product->id ?>" class="btn " style="text-align: center;margin-left: 160px;margin-top: 20px;color: white;background-color: #DC2D35;line-height: 40px;">THÊM VÀO GIỎ
                </a>
                <div style="display: flex;margin-left: 20px;">
                    <button class="btn " style="height: 55px;width: 200px;margin-top: 10px;color: white;background-color: #288AD6;margin-left:  ">TRẢ GÓP
                    <p style="margin-top: -5px;">Thủ tục đơn giản</p>
                    </button>
                    <button class="btn " style="height: 55px;width: 200px;margin-top: 10px;color: white;background-color: #288AD6;margin-left: 10px;">MUA NGAY
                    <p style="margin-top: -5px;">Visa, master, JCB</p>
                    </button>
                </div>
            </div>
            <div class="col-xl-4">
                <div style="border-bottom: 1px solid #D8D5D5; ">
                    <h3 style="font-weight: bold;margin-top: 80px;"><?php echo $product->name; ?></h3>
                </div>
                <p style="color: #C10017;font-size: 22px;"><?php echo number_format($product->price)?>₫</p>
                <div style="margin-top: 40px;">
                    <p><span><img src="assets/frontend/images-sp/tích.svg" style="width: 15px;height: 15px;margin-right: 5px;"></span>TÌNH TRẠNG: MỚI 100% QUỐC TẾ</p>
                    <p><span><img src="assets/frontend/images-sp/tích.svg" style="width: 15px;height: 15px;margin-right: 5px;"></span>BẢO HÀNH: 12 THÁNG APPLE</p>
                    <p><span><img src="assets/frontend/images-sp/tích.svg" style="width: 15px;height: 15px;margin-right: 5px;"></span>TRỌN BỘ: NGUYÊN SEAL CHƯA ACTIVE</p>
                </div>
                <div class="row" style="margin-top: 30px;">
                    <div class="col-xl-6" style="padding-right: -5px;">
                        <p style="font-weight: bold;">Tính phí ship tự động</p>
                        <div class="ship">
                            <div class="row">
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/ship1.jpg" style="width: 100%" ></a>
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/ship2.jpg" style="width: 100%" ></a>
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/ship3.jpg" style="width: 100%;height: 20px;" ></a>
                            </div>
                            <div class="row">
                                 <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/ship4.jpg" style="width: 100%" ></a>
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/ship5.jpg" style="width: 100%" ></a>
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/ship6.jpg" style="width: 100%;height: 20px;" ></a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-6" style="margin-left: 0px;border-left: 1px solid #D8D5D5;">
                        <p style="font-weight: bold;">Thanh toán</p>
                    
                        <div class="pay" style="margin-top: 38px;margin-left: 10px;padding-left: -5px;">
                            <div class="row">
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/pay1.jpg" style="width: 100%" ></a>
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/pay2.jpg" style="width: 100%" ></a>
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/pay3.jpg" style="width: 100%;" ></a>
                            </div>
                            <div class="row">
                                 <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/pay4.jpg" style="width: 100%" ></a>
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/pay5.jpg" style="width: 100%" ></a>
                                <a style="width: 33.33%" href=""><img src="assets/frontend/images-sp/pay6.jpg" style="width: 100%;" ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <p style="font-weight: bold;margin-top: 20px;">"Hãy trở thành Affilicate của chúng tôi để tìm thêm thu nhập thụ động, kiếm tiền online"</p>
                <button class="btn" style="background-color: #DC2D35;color:white;font-weight: bold;font-size: 15px;text-align: center;width: 250px; " type="submit">Đăng kí Affilicate</button>
                <div style="border-bottom: 1px solid #D8D5D5; border-top: 1px solid #D8D5D5;line-height: 20px;height: 20px;font-size: 10px;margin-top: 40px;">
                    Mã:camera-5
                </div>
                <p style="font-size: 10px;">Danh mục: Camera</p>
            </div>
        </div>
    </div>
    <div class="container " style="margin-top: 20px;height: auto;display: flex; width: auto;    ">
        <div class=" col-xl-12">
            <div class="chitiet-header">
                <ul>
                    <li type="mota" class="btn btn-danger">Mô tả</li>
                    <li type="danhgia" class="btn btn-danger">Đánh giá</li>
                    <li type="cauhinh" class="btn btn-danger">Cấu hình</li>
                </ul>
            </div>
            <div class="mota-danhgia">
                <div class="container mota" style="border: 1px solid #D8D5D5; border-radius: 5px;margin-left: -17px;font-size: 15px;">
                    <div style="margin-top: 20px;">
                        <?php echo $product->content ?> 
                    </div>
                </div>
                <div class="container danhgia" style="display: none;">
                    <h4 style="font-weight: bold;margin-top: 20px;">Đánh giá</h4>
                    <p>Chưa có đánh giá nào</p>
                    <form method="post" action="index.php?controller=product&action=rating&id=<?php echo $product->id;?>">
                        <div class="container" style="border: 1px solid #DC2C34;margin-bottom: 50px;padding-bottom: 10px;">
                            <?php if ($this->modelCountRating($_GET['id']) == 0): ?>
                            <h4 style="font-weight: bold;margin-top: 20px;">Hãy là người đầu tiên nhận xét “ <?php echo $product->name; ?>”</h4>
                            <?php else: ?>
                            <h4 style="font-weight: bold;margin-top: 20px;">nhận xét “ <?php echo $product->name; ?>”</h4>
                            <?php endif ?>
                            <p style="font-weight: bold;margin-top: 20px;">Có <?php echo $this->modelCountRating($_GET['id']) ?> Đánh giá</p>
                            <div class="ratting">
                                <div class="stars">
                                    <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                            </div>
                            <p style="font-weight: bold;">Nhận xét của bạn*</p>
                            <input type="text" style="width: 100%;height: 100px;border: 1px solid #D8D5D5; box-shadow: -1px -1px 1px -1px #888888;">
                            <div class="row" style="margin-top: 10px;">
                                <button class="btn btn-danger" style="color: white;width: 10%;margin-top: 20px;margin-left: 13px;" type="submit">Gửi đi</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container cauhinh" style="display: none;">
                    <div style="margin-top: 10px;"></div>
                    <table style="padding-top: : 10px;" border="1">
                        <?php echo $product->description; ?>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

    