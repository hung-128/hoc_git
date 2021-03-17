<?php //load file layout vào đây để đổ dữ liệu của view vào file layout
    $this->layoutPath = "layout.php";
 ?>
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit user</div>
        <div class="panel-body">
            <form method="post" action="<?php echo $action; ?>">
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Name</div>
                    <div class="col-md-10">
                        <input  type="text" value="<?php echo isset($result->name) ? $result->name :"" ?>" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Email</div>
                    <div class="col-md-10">
                        <input  type="Email" value="<?php echo isset($result->email) ? $result->email :"" ?>" disabled name="email" class="form-control" required>
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Password</div>
                    <div class="col-md-10">
                        <input  type="text" placeholder="nhập nếu muốn đổi password"  name="password" class="form-control" >
                    </div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input type="submit" class="btn btn-primary" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>