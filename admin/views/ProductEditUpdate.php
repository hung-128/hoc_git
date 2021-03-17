<?php 
//load file layout vao day de do du lieu cua view vao file layout do
    $this->layoutPath = "layout.php";
?> 
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Sửa thông tin sản phẩm</div>
        <div class="panel-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Sản Phẩm</div>
                    <div class="col-md-10">
                        <input  type="text" value="<?php echo isset($result->name) ? $result->name :"" ?>" name="name" class="form-control" required>
                    </div>
                </div>
                <!-- end rows -->
                <!-- Price -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Price</div>
                    <div class="col-md-10">
                        <input type="number" value="<?php echo isset($result->price)?$result->price:""; ?>" name="price" class="form-control" required>
                    </div>
                </div>
                <!-- end Price -->
                <!-- discount -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Discount (1-100%)</div>
                    <div class="col-md-10">
                        <input type="number" value="<?php echo isset($result->discount)?$result->discount:"0"; ?>" name="discount" class="form-control" required>
                    </div>
                </div>
                <!-- end discount -->
                <!-- description -->
                 <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Descripition</div>
                    <div class="col-md-10">
                        <textarea name="description" id="description" class="form-control">
                            <?php echo isset($result->description)?$result->description:""; ?>
                        </textarea>
                        <script type="text/javascript">CKEDITOR.replace("description");</script>
                    </div>
                </div>
                <!-- end description -->
                <!-- content -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Content</div>
                    <div class="col-md-10">
                        <textarea name="contentt" id="content" class="form-control">
                            <?php echo isset($result->content)?$result->content:""; ?>
                        </textarea>
                        <script type="text/javascript">CKEDITOR.replace("contentt");</script>
                    </div>
                </div>
                <!-- end content -->
                <!-- cacloaisanpham -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Các loại sản phẩm</div>
                    <div class="col-md-10">
                        <select name="parent_id" >
                            <option value="0"></option>
                            <?php $category = $this->listCategory(); ?>
                            <?php foreach ($category as $category_key):?>
                            <option 
                                <?php if(isset($result)):?>
                                    <?php if($result->category_id == $category_key->id): ?>
                                    selected
                                    <?php endif; ?>
                                <?php endif ?>
                                value="<?php echo $category_key->id ?>"> 
                                 <?php echo $category_key->name ?>
                            </option>
                            <?php $category_Sub = $this->listCategorySub($category_key->id); ?>
                            <?php foreach ($category_Sub as $category_Sub_key): ?>
                            <option   
                                    <?php if (isset($result)):?> 
                                            <?php  if ($result->category_id == $category_Sub_key->id): ?>
                                                selected
                                            <?php endif; ?>
                                    <?php endif; ?>      
                              value="<?php echo $category_Sub_key->id ?>"><p>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($category_Sub_key->name);?></p>
                            </option>
                            <?php $category_Sub_Sub = $this->listCategorySub($category_Sub_key->id); ?>
                            <?php foreach ($category_Sub_Sub as $category_SubSub_key ):?>
                            <option <?php if (isset($result)):?> 
                                            <?php  if ($result->category_id == $category_SubSub_key->id): ?>
                                                selected
                                            <?php endif; ?>
                                    <?php endif; ?>    
                             value="<?php echo $category_SubSub_key->id; ?>">
                             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($category_SubSub_key->name);?></p>
                            </option>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                 <!-- end cacloaisanpham -->
                
                <!-- hot -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input  type="checkbox" <?php if(isset($result->hot)&&$result->hot==1): ?> checked <?php endif; ?> name="hot" id="hot"> <label for="hot">Hot products</label>
                    </div>
                </div>
                <!-- end hot -->

                <!-- update img -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Upload image chính</div>
                    <div class="col-md-10">
                        <input class="form-control" value="<?php 
                        if(isset($result->photo)){echo $result->photo;}  
                        else {echo "";}?>
                            " type="file" name="photo">
                    </div>
                </div>
                <!-- update img -->
                <?php
                     $product_id = isset($_GET['id']) ? $_GET['id'] : " ";
                ?>
                <!-- update img phụ -->
                 <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Upload image phụ</div>
                    <div class="col-md-10">
                        <input class="form-control" value="<?php 
                        if(isset($result->photo)){echo $result->photo;}  
                        else {echo "";}?>
                            " type="file" multiple="multiple" name="photoPhu[]">
                    </div>
                </div>
                <?php $image = $this->readImg($product_id); ?> 
                <?php if (count($image) != 0): ?>
                <div class="row" style="margin-top: 5px;" >
                    <div class="col-md-2">Image phụ đã có</div>
                    <div class="col-md-10">
                        <ul style="list-style: none;">
                            <?php foreach ($image as $key_images ): ?>
                             <li style="display: flex;">
                                <img style="width: 150px;padding: 10px;margin-left: -50px;" src="../assets/upload/product/<?php echo $key_images->name ?>">
                                <a style="margin-top: 10px;" href="index.php?controller=product&action=deleteImg&img_id=<?php echo $key_images->id ?>&product_id=<?php echo $product_id ?>">delete</a>
                            </li>   
                            <?php endforeach ?>
                            
                        </ul>
                    </div>
                </div>
                <?php endif ?>
                <?php if (isset($_GET['notify'])): ?>
                <div class="row alert alert-danger">Đã đủ ảnh, vui lòng xóa bớt ảnh!!!</div>
                <?php endif ?>
                <!-- !!! update img phụ -->
                
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input style="width: 100px;" type="submit" value="submit" class="btn btn-primary">
                    </div>
                </div>
                <!-- end rows -->
            </form>
        </div>
    </div>
</div>