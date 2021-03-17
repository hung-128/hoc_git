  	<?php //load file layout vào đây để đổ dữ liệu của view vào file layout
    $this->layoutPath = "layout.php";
 ?>
 <!-- <?php $category = $this->modelCategoryDisplayHome();
 echo "<pre>";
 print_r($category);
 echo "</pre>";
  ?>

 <?php foreach ($category as $key_category): ?> 
 <?php if ($this->modelCheckCategorySub($key_category->id)): ?>
 	<?php $categorySub = $this->modelListcategoriesSub1($key_category->id); ?>
	<?php foreach ($categorySub as $key_categorySub): ?>
		<?php echo $key_categorySub->name; echo "<br>"; ?>
		<?php if ($this->modelCheckCategorySub($key_categorySub->id)): ?>
		<?php $categorySubSub = $this->modelListcategoriesSub1($key_categorySub->id); ?>	
		<?php foreach ($categorySubSub as $key_categorySubSub): ?>
			<?php $product = $this->modelGetProduct($key_categorySubSub->id) ?>
			<?php echo $key_categorySubSub->name;echo "<br>"; 
			foreach ($product as $key_product) {
				echo $key_product->name;
				echo "<br>";
			}
			?>
		<?php echo "<br>" ?>	
		<?php endforeach ?>
		<?php else: ?>	
			<?php $product = $this->modelGetProduct($key_categorySub->id) ?>
			<?php echo $key_categorySub->name;echo "<br>"; 
			foreach ($product as $key_product) {
				echo $key_product->name;
				echo "<br>";
			}
			?>	
		<?php endif ?>
		</div>
	<?php endforeach ?>
<?php else: ?>
	<?php $product = $this->modelGetProduct($key_category->id) ?>
	<?php foreach ($product as $key_product): ?>
		<?php echo $key_product->name; ?>
	<?php endforeach ?>
<?php endif ?>
<?php endforeach; ?> -->
	<!--!!! vong for quet cac san pham con nhu macbook ... -->
<?php  ?>
<div class="container">
	<div class="row">
        <div class="col-xl-9">
            <!-- slide -->
            <div class="slide-chinh" >
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/frontend/images/slide1.png" style="width: 100%;height: 400px" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/frontend/images/slide2.png" style="width: 100%;height: 400px" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/frontend/images/slide3.jpg" style="width: 100%;height: 400px" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/frontend/images/slide4.png" style="width: 100%;height: 400px" alt="fouth slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div style="margin-top: 15px;">
            	<div class="spmoi-header">
            		<ul class="spmoi-list">
            			<li class="spmoi-item">
            				<span>SẢN PHẨM NỔI BẬT</span>
            			</li>
            		</ul>
            	</div>
            	<div class="slide-spmoi" >           		
	                <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
	                    <div class="carousel-inner ">
	                    	<?php
	                    	
	                    		$hot_product = $this->modelHotProduct();
	                    		$count_hotProduct = count($hot_product);
	                 			$numSlide = ceil($count_hotProduct/5);
	                 			
	                    	 ?>
	                    	 <?php for ($i=1; $i <= $numSlide ; $i++):?>
	                    	 <?php
	                    	 	$slide_array = array();
	                    	 	$from = ($i - 1) * 5;
	                    	 	$t = 0;
	                    	 	while ($t != 5) 
	                    	 	{
						            if (isset($hot_product[$from])) 
						            {
						                array_unshift($slide_array, $hot_product[$from]);
						                $from++;
						                $t++;
						            }
						            else 
						                break;
						        } 
	                    	  ?>
	                        <div class="carousel-item <?php if($i == 1) echo "active" ?>" >
	                            <div class="spmoi-slide" alt="<?php 
	                            switch ($i) {
	                    		case 1:
	                    			echo "First";
	                    			break;
	                    		case 2:
	                    			echo "Second";
	                    			break;
	                    		case 3:
	                    			echo "Third";
	                    			break;
	                    		case 4:
	                    			echo "Fourth";
	                    			break;
	                    	} ?> slide" >
	                    			<?php foreach ($slide_array as $key): ?>
									<div class="spmoi-slide-item" style="height: 250px;" >
										<img style="width: 158px;text-align: center;" src="assets/upload/product/<?php echo $key->photo ?>">
										<div class="spmoi-content figure-caption">
                                            <a style="max-width: 20px; white-space: nowrap;line-height: 30px;" href="index.php?controller=Product&action=detail&id=<?php echo $key->id ?>"><p><?php echo $key->name ?> </p></a>
                                            <p class="spmoi-price">giá: <?php echo number_format($key->price) ?>đ</p>
                                            <div class="spmoi-rating">
												<?php $rating = 0 ?>
		                            	<?php if ($this->modelCountRating($key_product->id) == 0): ?>
		                            	<?php else: ?>
		                            	<?php while ( $rating != 5):?>
										<?php $rating++; ?>
		                            		<?php if ( $rating > $this->Rating($key_product->id)): ?>
		                            			<i class="fas fa-star black-star"></i>
		                            		<?php else: ?>
		                            			<i class="fas fa-star gold-star"></i>
		                            		<?php endif ?>											
										<?php endwhile ?>
		                            	<?php endif ?>
		                            	<?php if ($this->modelCountRating($key_product->id) == 0): ?>
		                            		<span> Chưa có đánh giá</span>
		                            	<?php else: ?>
		                            		<span><?php echo $this->modelCountRating($key_product->id); ?> đánh giá</span>
		                            	<?php endif ?>
											</div>
											<?php if ($key->yeuthich == 1): ?>
											<div class="spmoi-favourite">
												<i style="color: white;font-size: 13px;" class="fas fa-check"></i>
												<span style="color:white;font-size: 13px;">Yêu thích</span>
											</div>
											<?php endif ?>
											<?php if ($key->discount != 0): ?>
											<div class="spmoi-saleoff">
												<span class="spmoi-sale-off-percent"><?php echo $key->discount ?>%</span>
												<span class="spmoi-sale-off-label">GIẢM</span>
											</div>
											<?php endif ?>
                                        </div>
									</div>
	                    			<?php endforeach ?>
	                            </div>
	                        </div>
	                    	 <?php endfor ?>
	                        
	                    </div>
	                    <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
	                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	                        <span class="sr-only">Previous</span>
	                    </a>
	                    <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
	                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
	                        <span class="sr-only">Next</span>
	                    </a>
	                </div>
	            </div>
            </div>
            
            <?php $category = $this->modelCategoryDisplayHome() ?>
            <!-- vòng for quet các sản phẩm lớn như Laptop, Điện thoại, Tablet -->
           
            <!-- san pham danh muc + san phẩm list -->
            
             	<?php foreach ($category as $key_category): ?>
             	<div class="<?php echo $key_category->id ?> list-sanpham"> 
            	<ul class="<?php echo $key_category->id ?> categotrySub-menu-header">
            		<li id="categorySub-menu-header-item" class="categorySub-menu-header-item ">
            			<a style="color: white;" href="index.php?controller=Product&action=categories&catid=<?php echo $key_category->id ?>&p=1"><?php echo $key_category->name ?></a>
            		</li>
            		<?php $categorySub = $this->modelListcategoriesSub1($key_category->id); ?>
            		<?php foreach ($categorySub as $key_categorySub): ?>
            		<li  class="macbook-header categorySub-menu-header-item">
            			<a  href="index.php?controller=Product&action=categories&catid=<?php echo $key_categorySub->id ?>&p=1"><?php echo $key_categorySub->name; ?></a>
            		</li>	
            		<?php endforeach ?>
            	</ul>
            	<?php if($this->modelCheckCategorySub($key_category->id)): ?>
            	<!--vong for quet cac san pham con nhu macbook ... -->
            	<?php $categorySub = $this->modelListcategoriesSub1($key_category->id); ?>
            	<?php foreach ($categorySub as $key_categorySub): ?>
            		<?php $n=0; ?>
            		<div class=" row" <?php if ($key_categorySub->hiendau == 1): ?> style="display: flex;" <?php else: ?> style="display: none" <?php endif ?> >
            		<?php if ($this->modelCheckCategorySub($key_categorySub->id)): ?>
            		<?php $categorySubSub = $this->modelListcategoriesSub1($key_categorySub->id); ?>	
            		<?php foreach ($categorySubSub as $key_categorySubSub): ?>
            			<?php $product = $this->modelGetProduct($key_categorySubSub->id) ?>
            			<?php foreach ($product as $key_product): ?>
            				<?php if ($n < 10): ?>
            				<div class="categorySub-menu-item">
		        				<img src="assets/upload/product/<?php echo $key_product->photo ?>">
								<div class="category-content figure-caption">
		                            <a  href="index.php?controller=Product&action=detail&id=<?php echo $key_product->id ?>"><p><?php echo $key_product->name ?></p></a>
		                            <?php if ($key_product->discount == 0): ?>
		                            	<p class="category-price">Giá: <?php echo number_format($key_product->price); ?>đ</p>
		                            <?php else: ?>
		                            	<p>Giá: <del ><?php echo number_format($key_product->price); $price = $key_product->price; ?>đ</del> <span style="color: #EE4D2D;"> <?php echo number_format($price - ($price * $key_product->discount)/100)  ?>đ</span></p>
		                            <?php endif ?>
		                            <div class="spmoi-rating">
		                            	<?php $rating = 0 ?>
		                            	<?php if ($this->modelCountRating($key_product->id) == 0): ?>
		                            	<?php else: ?>
		                            	<?php while ( $rating != 5):?>
										<?php $rating++; ?>
		                            		<?php if ( $rating > $this->Rating($key_product->id)): ?>
		                            			<i class="fas fa-star black-star"></i>
		                            		<?php else: ?>
		                            			<i class="fas fa-star gold-star"></i>
		                            		<?php endif ?>											
										<?php endwhile ?>
		                            	<?php endif ?>
		                            	<?php if ($this->modelCountRating($key_product->id) == 0): ?>
		                            		<span> Chưa có đánh giá</span>
		                            	<?php else: ?>
		                            		<span><?php echo $this->modelCountRating($key_product->id); ?> đánh giá</span>
		                            	<?php endif ?>
									</div>
									<?php if ($key_product->yeuthich == 1): ?>
									<div class="spmoi-favourite">
										<i style="color: white;font-size: 13px;" class="fas fa-check"></i>
										<span style="color:white;font-size: 13px;">Yêu thích</span>
									</div>
									<?php endif ?>
									<?php if ($key_product->discount != 0): ?>
									<div class="spmoi-saleoff">
										<span class="spmoi-sale-off-percent"><?php echo $key_product->discount; ?>%</span>
										<p style="margin-top: 5px;" class="spmoi-sale-off-label">GIẢM</p>
									</div>
									<?php endif; ?>
		                        </div>
		                        <?php $n++; ?>
		        			</div>
	        				<?php endif; ?>
            			<?php endforeach ?>
            		<?php endforeach ?>
            		<?php else: ?>	
            			<?php $product =  $this->modelGetProduct($key_categorySub->id) ?>
            			<?php foreach ($product as $key_product): ?>
            			<?php if ($n<10): ?>
            			<div class="categorySub-menu-item">
	        				<img src="assets/upload/product/<?php echo $key_product->photo ?>">
							<div class="category-content figure-caption">
	                            <a  href="index.php?controller=Product&action=detail&id=<?php echo $key_product->id ?>"><p><?php echo $key_product->name ?></p></a>
	                            <?php if ($key_product->discount == 0): ?>
		                            	<p class="category-price">Giá: <?php echo number_format($key_product->price); ?>đ</p>
		                            <?php else: ?>
		                            	<p>Giá: <del ><?php echo number_format($key_product->price); $price = $key_product->price; ?>đ</del> <span style="color: #EE4D2D;"> <?php echo number_format($price - ($price * $key_product->discount)/100)  ?>đ</span></p>
		                            <?php endif ?>
	                            <div class="spmoi-rating">
									<?php $rating = 0 ?>
		                            	<?php if ($this->modelCountRating($key_product->id) == 0): ?>
		                            	<?php else: ?>
		                            	<?php while ( $rating != 5):?>
										<?php $rating++; ?>
		                            		<?php if ( $rating > $this->Rating($key_product->id)): ?>
		                            			<i class="fas fa-star black-star"></i>
		                            		<?php else: ?>
		                            			<i class="fas fa-star gold-star"></i>
		                            		<?php endif ?>											
										<?php endwhile ?>
		                            	<?php endif ?>
		                            	<?php if ($this->modelCountRating($key_product->id) == 0): ?>
		                            		<span> Chưa có đánh giá</span>
		                            	<?php else: ?>
		                            		<span><?php echo $this->modelCountRating($key_product->id); ?> đánh giá</span>
		                            	<?php endif ?>
								</div>
								<?php if ($key_product->yeuthich == 1): ?>
								<div class="spmoi-favourite">
									<i style="color: white;font-size: 13px;" class="fas fa-check"></i>
									<span style="color:white;font-size: 13px;">Yêu thích</span>
								</div>
								<?php endif ?>
								<?php if ($key_product->discount != 0): ?>
								<div class="spmoi-saleoff">
									<span class="spmoi-sale-off-percent"><?php echo $key_product->discount; ?>%</span>
									<p class="spmoi-sale-off-label">GIẢM</p>
								</div>
								<?php endif; ?>
	                        </div>
		        		</div>
		        		<?php $n++; ?>
		        		<?php endif; ?>
		        		<?php endforeach ?>
            		<?php endif ?>
            		</div>
            	<?php endforeach ?>
            	<!--!!! vong for quet cac san pham con nhu macbook ... -->
        	<?php else: ?>
        		<?php $product = $this->modelGetProduct($key_category->id) ?>
        		<div class=" row" <?php if ($key_category->hiendau == 1): ?> style="display: flex;" <?php else: ?> style="display: none" <?php endif ?> >
				<?php foreach ($product as $key_product): ?>
					<?php $n=0; ?>
					<?php if ($n<10): ?>
					<div class="categorySub-menu-item">
        				<img src="assets/upload/product/<?php echo $key_product->photo ?>">
						<div class="category-content figure-caption">
                            <a  href="index.php?controller=Product&action=detail&id=<?php echo $key_product->id ?>"><p><?php echo $key_product->name ?></p></a>
                            <?php if ($key_product->discount == 0): ?>
                            	<p class="category-price">Giá: <?php echo number_format($key_product->price); ?>đ</p>
                            <?php else: ?>
                            	<p>Giá: <del ><?php echo number_format($key_product->price); $price = $key_product->price; ?>đ</del> <span style="color: #EE4D2D;"> <?php echo number_format($price - ($price * $key_product->discount)/100)  ?>đ</span></p>
                            <?php endif ?>
                            <div class="spmoi-rating">
								<?php $rating = 0 ?>
                            	<?php if ($this->modelCountRating($key_product->id) == 0): ?>
                            	<?php else: ?>
                            	<?php while ( $rating != 5):?>
								<?php $rating++; ?>
                            		<?php if ( $rating > $this->Rating($key_product->id)): ?>
                            			<i class="fas fa-star black-star"></i>
                            		<?php else: ?>
                            			<i class="fas fa-star gold-star"></i>
                            		<?php endif ?>											
								<?php endwhile ?>
                            	<?php endif ?>
                            	<?php if ($this->modelCountRating($key_product->id) == 0): ?>
                            		<span> Chưa có đánh giá</span>
                            	<?php else: ?>
                            		<span><?php echo $this->modelCountRating($key_product->id); ?> đánh giá</span>
                            	<?php endif ?>
							</div>
							<?php if ($key_product->yeuthich == 1): ?>
							<div class="spmoi-favourite">
								<i style="color: white;font-size: 13px;" class="fas fa-check"></i>
								<span style="color:white;font-size: 13px;">Yêu thích</span>
							</div>
							<?php endif ?>
							<?php if ($key_product->discount != 0): ?>
							<div class="spmoi-saleoff">
								<span class="spmoi-sale-off-percent"><?php echo $key_product->discount; ?>%</span>
								<p style="margin-top: 5px;" class="spmoi-sale-off-label">GIẢM</p>
							</div>
							<?php endif; ?>
                        </div>
	        		</div>	
	        		<?php $n++; ?>
					<?php endif ?>
				<?php endforeach ?>
				</div>
            <?php endif ?>
        </div>
            <?php endforeach ?>
            <!--!! vòng for quet các sản phẩm lớn như Laptop, Điện thoại, Tablet -->
            
            <!--!!! end san pham danh muc + san phẩm list -->
       </div> 
		<div class="col-xl-3">
      		<img class="banner-img-quangcao" src="assets/frontend/images/quangcao1.jpg" >
            <div class="slide-phu" >
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" >
                        <div class="carousel-item active">
                            <img class="slide-img"  src="assets/frontend/images/tuyểnnv1.jpg" alt="First slide">
                        </div>
                        <div  class="carousel-item">
                            <img class="slide-img" src="assets/frontend/images/tuyểnnv2.jpg" alt="Second slide">
                        </div>
                        <div  class="carousel-item">
                            <img class="slide-img" src="assets/frontend/images/tuyểnnv3.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div  class="tintuc1">
                <div class="tintuc-header" >
                    <p >TIN TỨC NỔI BẬT</p>
                </div>
                <ul class="tintuc-list" >
                   <li class="tintuc-item">
                   		<img  src="assets/frontend/images/tintuc2.jpg">
                       	<a href="">
                            <p style="font-size: 17px;font-weight: bold;">TRỌN BỘ HÌNH NỀN HUAWEI MATE 10 ĐẸP "MIỄN CHÊ" CHO MỌI SMARTPHONE</p>
                            <p>Bộ nền siêu đẹp từ huawei Mate 10 đến với nhiều chủ đề trừu [...] </p>
                        </a>
                   </li>
                   <li class="tintuc-item">
                   		<img  src="assets/frontend/images/tintuc2.jpg">
                       	<a href="">
                            <p style="font-size: 17px;font-weight: bold;">TRỌN BỘ HÌNH NỀN HUAWEI MATE 10 ĐẸP "MIỄN CHÊ" CHO MỌI SMARTPHONE</p>
                            <p>Bộ nền siêu đẹp từ huawei Mate 10 đến với nhiều chủ đề trừu [...] </p>
                        </a>
                   </li>
                   <li class="tintuc-item">
                   		<img  src="assets/frontend/images/tintuc2.jpg">
                       	<a href="">
                            <p style="font-size: 17px;font-weight: bold;">TRỌN BỘ HÌNH NỀN HUAWEI MATE 10 ĐẸP "MIỄN CHÊ" CHO MỌI SMARTPHONE</p>
                            <p>Bộ nền siêu đẹp từ huawei Mate 10 đến với nhiều chủ đề trừu [...] </p>
                        </a>
                   </li>
                </ul>
            </div>
            <img src="assets/frontend/images/quangcao2.jpg" style="width: 287px; margin-bottom: 10px;">
            <img src="assets/frontend/images/quangcao3.jpg" style="width: 287px;  margin-bottom: 10px;">
            
  		</div>	
	</div>
</div>




