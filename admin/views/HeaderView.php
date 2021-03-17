<div class="collapse" id="sanpham-item">
	<div class="bg-white py-2">                          
	    <?php 
	        $category_menu = $this->listCategory();     
	     ?>
	    <?php foreach ($category_menu as $keys ):?>
	       <a class="collapse-item" data-toggle="collapse"  href="#sanpham-itemSub<?php echo $keys->id;?>"><?php echo($keys->name);?></a>
	       <?php $category_menuSub = $this->listCategorySub($keys->id); ?>
	        <div class="collapse" id="sanpham-itemSub<?php echo $keys->id;?>">
	            <div class="bg-white py-2">
	                <a class="collapse-item" href="index.php?controller=product&action=readCategory&category=<?php echo $keys->id ?>&p=1"><?php echo($keys->name);?></a>
	             <?php foreach ($category_menuSub as $keys1):?>       

	                <a href="index.php?controller=product&action=readCategorySub&category=<?php echo $keys1->id ?>" class="collapse-item"><?php echo $keys1->name; ?></a>
	             <?php endforeach; ?>   
	            </div>
	        </div>
	       
	    <?php endforeach; ?>
	</div>
</div>