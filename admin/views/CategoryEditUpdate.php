<?php //load file layout vào đây để đổ dữ liệu của view vào file layout
    $this->layoutPath = "layout.php";
 ?>
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Sửa thông tin sản phẩm</div>
        <div class="panel-body">
            <form method="post" action="<?php echo $action; ?>">
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Sản Phẩm</div>
                    <div class="col-md-10">
                        <input  type="text" value="<?php echo isset($result->name) ? $result->name :"" ?>" name="name" class="form-control" required>
                    </div>
                </div>
                <!-- end rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Các loại sản phẩm</div>
                    <div class="col-md-10">
                        <select name="parent_id">
                            <option value="0"></option>
                            <?php $category = $this->listCategory(); ?>
                            <?php foreach ($category as $category_key):?>
                            <option <?php
                                if(isset($result->parent_id)):?>
                                    <?php if($result->parent_id == $category_key->id): ?>
                                    selected
                                    <?php endif; ?>
                                <?php endif ?>
                                value="<?php echo $category_key->id ?>"> <?php echo $category_key->name ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input style="margin-top: 10px;" type="checkbox" name="hienthitrangchu"><label style="margin-left: 10px;color: black;">Hiển thị trang chủ</label>
                    </div>
                </div> 
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
