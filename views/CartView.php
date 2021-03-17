<?php 
  //load file layout vao day de do du lieu cua view vao file layout do
  $this->layoutPath = "layout.php";
 ?>
<?php if(isset($_SESSION["cart"])): ?>
<div class="container template-cart">
  <form action="index.php?controller=cart&action=update" method="post">
    <div class=" table-responsive">
      <table  class="table table-cart">
        <thead>
        <th>Sản Phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        </thead>
        <tbody> 
        <?php foreach($_SESSION["cart"] as $product): ?>               
          <tr style="line-height: 30px;">
            <td><img src="assets/upload/product/<?php echo $product["photo"];?>" class="img-responsive" /></td>
            <td><a href="index.php?controller=products&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></td>
            <td> 
              <?php if ($product['discount'] != 0): ?>
              <span><del><?php echo number_format($product['price']) ?>đ</del></span>
              <?php endif ?>
              <?php echo number_format($product['price']-$product['price']*$product['discount']/100); ?>₫ 
            </td>
            <td><input style="width: 40px;height: 30px;text-align: center;" type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống"></td>
            <td><p><b><?php echo number_format($product["number"]*($product['price']-$product['price']*$product['discount']/100)); ?>₫</b></p></td>
            <td><a href="index.php?controller=cart&action=remove&id=<?php echo $product["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="6"><a href="index.php?controller=cart&action=destroy" class="button" style="text-align: right;">Xóa toàn bộ</a> <a style="float: right; margin-right: 10px;margin-left: 10px;" href="index.php" class="btn btn-danger  ">Tiếp tục mua hàng</a>
              <?php if($this->cartNumber() > 0): ?>
              <input style="float: right;" type="submit" class="btn btn-danger align-middle" value="Cập nhật">
            <?php endif; ?>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </form>
  <div class="total-cart" style="text-align: right;"> 
    <?php if($this->cartNumber() > 0): ?>
    <span  style=";font-weight: bold; font-size: 20px;">Tổng tiền thanh toán:</span> <br>
   <span style="font-size: 20px;font-weight: bold;"><?php echo number_format($this->cartTotal()); ?>₫ </span><br>
    <a style="margin-top: 10px;" href="index.php?controller=cart&action=checkout" class="btn btn-danger">Thanh toán</a> </div>
  <?php endif; ?>
</div>
<?php endif; ?>