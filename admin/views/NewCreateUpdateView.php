<?php 
//load file layout vao day de do du lieu cua view vao file layout do
$this->layoutPath = "layout.php";
?> 
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit news</div>
        <div class="panel-body">
            <!-- muon upload file thi phai co thuoc tinh enctype="multipart/form-data" o trong the form -->
            <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Name</div>
                    <div class="col-md-10">
                        <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required>
                    </div>
                </div>
                <!-- end rows -->                  
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Descripition</div>
                    <div class="col-md-10">
                        <textarea name="description" id="description">
                            <?php echo isset($record->description)?$record->description:""; ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("description");
                        </script>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Content</div>
                    <div class="col-md-10">
                        <textarea name="content" id="contentt">
                            <?php echo isset($record->content)?$record->content:""; ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("contentt");
                        </script>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input type="checkbox" <?php if(isset($record->hot)&&$record->hot==1): ?> checked <?php endif; ?> name="hot" id="hot"> <label for="hot">Hot news</label>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input type="submit" value="Process" class="btn btn-primary">
                    </div>
                </div>
                <!-- end rows -->
            </form>
        </div>
    </div>
</div>