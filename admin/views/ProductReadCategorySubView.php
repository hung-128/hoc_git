<?php 
	$this->layoutPath = "layout.php";
 ?>
 <?php 
    $sanphamSub = $this->listCategorySub($id);
    $n=0;
    foreach($sanphamSub as $key ) {
        $n++;
    }
  
 ?>
   <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <div class="btn btn-primary" style="height: 40px;line-height: 30px;text-align: center;">
            <a href="index.php?controller=product&action=create" style="color: #fff;text-decoration: none">Create</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
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
                                 <?php $record = 0 ?>
                                <?php if ($n==0): ?>
                                      <?php foreach ($result as $result_key): //quét từng product một?>
                                        <tr> 
                                            <?php if($result_key->category_id == $id): //nếu product đó có category_id == id đc trả về từ phương thức GET thì in ra?>
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
                                                            <del><?php echo $result_key->price?>đ</del>
                                                            <?php
                                                                $price = $price - (($price/100) * $result_key->discount);
                                                             ?>
                                                             <span> <?php echo($price); ?>đ</span>
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
                                                        $category_subParentName = "";
                                                        $category_sub = $this->getCategoryRecord($result_key->category_id); //lay cac du lieu cua san pham
                                                        $category = $this->listCategory();
                                                        if ($category_sub->parent_id != 0) {   // kiem tra xem sanphamme nay da la cap cao nhat chua(max = 0)
                                                            $category_subParentId = $category_sub->parent_id;
                                                            foreach ($category as $key_category ) {
                                                                if ($key_category->id == $category_subParentId) {
                                                                    $category_subParentName = $key_category->name;
                                                                }
                                                            }
                                                        }
                                                        if ($category_subParentName != "") {
                                                            echo $category_subParentName." / ".$category_sub->name;
                                                        }
                                                        else{
                                                            echo($category_sub->name);
                                                        }
                                                     ?>
                                                </td>
                                                <td>
                                                    <a href="index.php?controller=product&action=update&id=<?php echo $result_key->id ?>">edit</a>
                                                    <a href="index.php?controller=product&action=delete&id=<?php echo $result_key->id?>" onclick="return window.confirm('Are you sure?')">delete</a>
                                                </td>
                                                <?php $record++; ?> <!-- đếm số bản ghi để thục hiện đếm trang -->
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif($n>0): ?>
                                    <?php foreach ($sanphamSub as $key_sanphamSub)://quét từng danh mục con?>
                                    <?php foreach ($result as $result_key): //quét từng product một?>
                                        <tr> 
                                            <?php if($result_key->category_id == $key_sanphamSub->id): //nếu product đó có category_id == id đc trả về từ phương thức GET thì in ra?>
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
                                                            <del><?php echo $result_key->price?>đ</del>
                                                            <?php
                                                                $price = $price - (($price/100) * $result_key->discount);
                                                             ?>
                                                             <span> <?php echo($price); ?>đ</span>
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
                                                        $category_subParentName = "";
                                                        $category_sub = $this->getCategoryRecord($result_key->category_id); //lay cac du lieu cua san pham
                                                        $category = $this->listCategory();
                                                        if ($category_sub->parent_id != 0) {   // kiem tra xem sanphamme nay da la cap cao nhat chua(max = 0)
                                                            $category_subParentId = $category_sub->parent_id;
                                                            foreach ($category as $key_category ) {
                                                                if ($key_category->id == $category_subParentId) {
                                                                    $category_subParentName = $key_category->name;
                                                                }
                                                            }
                                                        }
                                                        if ($category_subParentName != "") {
                                                            echo $category_subParentName." / ".$category_sub->name;
                                                        }
                                                        else{
                                                            echo($category_sub->name);
                                                        }
                                                     ?>
                                                </td>
                                                <td>
                                                    <a href="index.php?controller=product&action=update&id=<?php echo $result_key->id ?>">edit</a>
                                                    <a href="index.php?controller=product&action=delete&id=<?php echo $result_key->id?>" onclick="return window.confirm('Are you sure?')">delete</a>
                                                </td>
                                                <?php $record++; ?>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php endforeach; ?>
                                <?php endif ?>
                                
                    </table>
                    <?php echo $record; ?>
                    <ul class="pagination">
                    	<?php for ($i=1; $i <= $numPage ; $i++):?>
                    	<li ><a style="margin-left: 5px;" class="btn btn-primary" href="index.php?controller=product&&action=readCategorySub&category=<?php echo $id; ?>&p=<?php echo $i; ?>" ><?php echo $i ?></a></li>
                    	<?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

