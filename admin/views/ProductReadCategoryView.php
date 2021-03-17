<?php 
	$this->layoutPath = "layout.php";
 ?>
<?php 
    $category_id = isset($_GET["category"]) ? $_GET["category"] : 0;
    $category = $this->listCategorySub($category_id);
    $product_array = array();
    $p = isset($_GET["p"]) ? ($_GET["p"]-1) : 0;
 ?>
   <!-- Begin Page Content -->
  
    <div class="container-fluid">
        <!-- Page Heading -->
        <?php $name_category = $this->getCategoryRecord($category_id); ?>
        <h1 class="h3 mb-2 text-gray-800"><?php echo($name_category->name) ?></h1>
        <div  style="margin-left: -40px;height: 40px;line-height: 30px;text-align: center;">
            <ul style="display: flex;list-style: none;">
                <li>
                    <a class="btn btn-primary" href="index.php?controller=product&action=create" style="color: #fff;text-decoration: none">Create</a>
                </li>
            <?php foreach ($category as $key_category): ?>
                <li style="margin-left: 10px;">     
                    <a href="index.php?controller=product&action=readCategory&catid=<?php echo $key_category->id ?>&p=1" class="btn btn-danger"><?php echo $key_category->name ?></a>
                </li>
            <?php endforeach ?>
            </ul>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <?php $Record = 0; //đếm sô bản ghi để tính số trang?>
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản Phẩm</th>
                                <th>Mô tả</th>
                                <th>Hot</th>
                                <th>Giá</th>
                                <th>Giảm giá</th>
                                <th>Sản phẩm mẹ</th>
                                <th></th>
                            </tr>
                        <!-- TẠO PRODUCT_ARRAY -->
                        <?php if ($this->modelCheckCategorySub($category_id) == true): ?>         
                            <?php foreach ($category as $key_category): ?>  <!-- macbook,HP,DELL,.... -->
                                <?php if ($this->modelCheckCategorySub($key_category->id) == true): ?>
                                    <?php $categorySub = $this->listCategorySub($key_category->id); ?>
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
                          <!--!!! PHÂN TRANG -->

                        <!-- IN RA CÁC SẢN PHẨM -->
                         <?php foreach ($array as $result_key): ?>
                          <tr> 
                                <td style="overflow: hidden; text-align: center;">
                                    <img style="width: 150px;" src="../assets/upload/product/<?php echo $result_key->photo; ?>">
                                </td>                           
                                <td><?php echo $result_key->name; ?></td>
                                <td>
                                    <?php echo $result_key->description; ?>
                                </td>
                                <td>
                                    <input type="checkbox" <?php if($result_key->hot == 1): ?> checked <?php endif; ?>>
                                </td>
                                <td >
                                    <?php $price = $result_key->price; 
                                        if ($result_key->discount != 0):?>
                                            <del><?php echo number_format($result_key->price)?>đ</del>
                                            <?php
                                                $price = $price - (($price/100) * $result_key->discount);
                                             ?>
                                             <span> <?php echo(number_format($price)); ?>đ</span>
                                        <?php else: ?>
                                            <?php echo $result_key->price; ?>
                                        <?php endif; ?>
                                        đ
                                </td>
                                <td>
                                    <?php echo $result_key->discount; ?> %
                                </td>
                                <td>
                                    <?php 
                                        $nameCategory_array = array(); // thực hiện phân tên trang
                                        $nameCategory = $this->getCategoryRecord($result_key->category_id);
                                        array_unshift($nameCategory_array,$nameCategory->name);
                                        //$nameCategory_array = array_push($nameCategory_array,$nameCategory->name);
                                        $count = 1;
                                        while ($nameCategory->parent_id != 0) {
                                            $nameCategory = $this->getCategoryRecord($nameCategory->parent_id);
                                            array_unshift($nameCategory_array,$nameCategory->name);
                                        }
                                        $count = count($nameCategory_array);
                                        $n = 0;
                                        foreach ($nameCategory_array as $key) {
                                            echo " ";
                                            echo $key;
                                            echo " ";
                                            $n++;
                                            if ($n == $count) 
                                                break;
                                            echo "/";
                                            
                                         } 
                                    ?>
                                </td>
                                <td>
                                    <a href="index.php?controller=product&action=update&id=<?php echo $result_key->id ?>">edit</a>
                                    <a href="index.php?controller=product&action=delete&id=<?php echo $result_key->id?>" onclick="return window.confirm('Are you sure?')">delete</a>
                                </td>
                            </tr>   
                         <?php endforeach ?>
                    </table>
                    <ul class="pagination">
                    	<?php for ($i=1; $i <= $numPage ; $i++):?>
                    	<li ><a style="margin-left: 5px;" class="btn btn-primary" href="index.php?controller=product&&action=readCategory&category=<?php echo $category_id; ?>&p=<?php echo $i; ?>" ><?php echo $i ?></a></li>
                    	<?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

