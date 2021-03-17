<?php 
  //load file layout vao day de do du lieu cua view vao file layout do
  $this->layoutPath = "layout_orderview.php";
 ?>
 <?php 
 	$listRecord = $this->modelOrders($_SESSION['user_id']);
  ?>
 <div style="background-color: white"  class="container">    
    <div class="panel panel-primary">
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <?php if (count($listRecord) == 0): ?>
                <div class="row" style="margin-top: 10px;border-bottom:  1px solid #ECECEC;display: block;text-align: center;padding: 50px;">
                    <img src="assets/frontend/images/mascot@2x.png">
                    <p style="font-size: 15px;font-weight: bold;margin-top: 20px;">Hiện Chưa có đơn hàng nào</p>
                    <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
                </div>
                <?php endif ?>
                <?php foreach($listRecord as $key_listRecord): ?>
                <div  class="row" style="line-height: 30px;border-top:  1px solid #ECECEC;border-bottom:   1px solid #ECECEC;">
                    <div class="col-xl-9" style="font-size: 15px;font-weight: bold">Đơn hàng ngày <?php echo date($key_listRecord->date) ?></div>
                    <div class="col-xl-3">
                        <ul style="display: flex;">
                            <li><i class="fas fa-truck"></i>&nbsp &nbsp</li>
                            <li>
                                <?php if ($key_listRecord->status == 1): ?>
                                <span>Giao hàng thành công</span>   
                                <?php else: ?>
                                 <span>Chưa giao hàng</span> 
                                <?php endif ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php $orderDetail = $this->modelOrderDetail($key_listRecord->id); ?>
                <?php foreach ($orderDetail as $key_orderDetail): ?>
                    <?php $product = $this->modelGetRecord($key_orderDetail->product_id); ?>
                    <div class="row" style="margin-top: 10px;border-bottom:  1px solid #ECECEC;">
                        <div style="display: flex;" class="col-xl-9">
                             <img  style="width: 150px;padding: 10px" src="assets/upload/product/<?php echo $product->photo ?>">
                             <div style="margin-top: 30px">
                                 <p style=""><?php echo $product->name ?></p>
                                 <p>x<?php echo $key_orderDetail->quantity ?></p>
                             </div>
                        </div>
                        <div style="text-align: center;margin-top: 40px;" class="col-xl-3">
                            <?php 
                                $discount = $product->discount;
                                $price = $product->price;
                             ?>
                            <?php if ($product->discount == 0): ?>
                                <p><?php echo number_format($product->price) ?>đ</p>
                            <?php else: ?>
                                <del><?php echo number_format($product->price);  ?>đ</del>
                                <p><?php 
                                    $price = $price - ($price*$discount)/100;
                                    echo number_format($price);
                                 ?>đ</p>
                            <?php endif ?>
                        </div>
                    </div>
                   
                 <?php endforeach ?>  
                <div style="font-size: 17px;height: 50px;font-weight: bold;line-height: 50px;text-align: right;">
                    <i class="fas fa-dollar-sign"></i> <span style="color: #EE4D2D">Tổng tiền: <?php echo number_format($key_listRecord->price) ?> đ</span>
                </div>
                <?php endforeach; ?>

            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <!-- <ul class="pagination">
                <li class="page-item">
                    <?php for($i = 1; $i <= $numPage; $i++): ?>
                    <a href="index.php?controller=users&action=read&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                    <?php endfor; ?>
                </li>
            </ul> -->
        </div>
    </div>
</div>