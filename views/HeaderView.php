<?php $category = $this->modelListCategories();
	 ?>
<style type="text/css">
	.categorySub{
		position: absolute;
		right: -100px;
		top: 0px;
		display: block;
		background-color: #fff;
		width: 100px;
		display: none;
	}
	.categorySub li:hover{
		background-color: #dbdbdb;
	}
	#category-item1:hover #categorySub-list1{
		display: block;
	}	
	#category-item2:hover #categorySub-list2{
		display: block;
	}	
	#category-item3:hover #categorySub-list3{
		display: block;
	}	
	.categorySub li{
		padding: 5px;
		width: 100%;
		height: 40px;
		line-height: 40px;
	}
</style>
<div class="container ">
        <div class="row">
            <div class="col-xl-3 col-md-2">
                <nav class="category">
                    <a href="" class="dropdown" data-toggle="dropdown" >
                        <h5 style="font-weight: bold;" class="category__heading">
                        <i style="font-weight: bold;" class="fas fa-list-ul category__heading-icon"></i>
                        Danh mục</h5>
                    </a>
                    <?php
                    	
                     ?>
                        <ul  id="category-list" class="dropdown-menu category-list" >
                        	<?php $n = 1; ?>
                        	<?php foreach ($category as $key_category ): ?>
	                            <li style="position: relative;" id="category-item<?php echo $n; ?>" role="presentation" class="category-item">
	                                <div class="row">
	                                    <div class="col-xl-10">
	                                        <span>
	                                            <i class="fa fa-<?php echo $key_category->icon; ?> category-icon"></i>
	                                            <a href="index.php?controller=Product&action=categories&catid=<?php echo $key_category->id ?>&p=1" class="category-item__link"><?php echo $key_category->name; ?></a>
	                                        </span>
	                                    </div>
	                                    <?php if ($this->modelCheckCategorySub($key_category->id) == true): ?>
	                                    	 <div class="col-xl-2">
	                                        	<i class="fa fa-caret-right muitenxuong"></i>
	                                    	</div>
	                                    <?php endif ?>
	                                   
	                                    <?php $categorySub = $this->modelListcategoriesSub($key_category->id); ?>
	                                    <?php if ($this->modelCheckCategorySub($key_category->id) == true): ?>
											<ul class="categorySub" id="categorySub-list<?php echo $n; ?>">
		                                    	<?php foreach ($categorySub as $key_categorySub):?>
		                                    		<li>
		                                    	 		<a href="index.php?controller=Product&action=categories&catid=<?php echo $key_categorySub->id ?>&p=1"><?php echo $key_categorySub->name; ?></a>
		                                    	 	</li>
		                                    	<?php endforeach; ?>
	                                    	</ul>
	                                    	<?php $n++; ?> 
	                                    <?php endif ?>
	                                </div>
	                            </li>
                        	<?php endforeach ?>
                        </ul>
                    </nav>
                </div>
            <div class="col-xl-9 col-md-9">
                <div class=" menu-camket" >
                    <ul class="menu-banner">
                        <li style="text-align: center" class="menu-banner-item">
                            <a href=""><span>CAM KẾT</span>
                            <p style="margin-top: -8px;">giá tốt nhất</p> 
                            </a>                                                
                        </li>
                        <li style="text-align: center" class="menu-banner-item">
                            <a href=""><span>MIỄN PHÍ</span>
                            <p style="margin-top: -8px;">Vận chuyển</p>   
                            </a>                                                
                        </li>
                        <li style="text-align: center" class="menu-banner-item">
                            <a href=""><span>THANH TOÁN</span>
                            <p style="margin-top: -8px;">Khi nhận hàng</p>    
                            </a>                                                
                        </li>
                        <li style="text-align: center" class="menu-banner-item">
                            <a href=""> <span>ĐỔI TRẢ HÀNG</span>
                            <p style="margin-top: -8px;">Trong 3 ngày</p> 
                            </a>                                                
                        </li>
                        <li style="text-align: center" class="menu-banner-item">
                            <a href=""><span>BẢO HÀNH</span>
                            <p style="margin-top: -8px;">Tại nơi sử dụng</p>  
                            </a>                                                
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>