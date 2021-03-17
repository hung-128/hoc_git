<?php 
	$this->layoutPath = "layout.php";
 ?>
 
   <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <div class="btn btn-primary" style="height: 40px;line-height: 30px;text-align: center;">
            <a href="index.php?controller=category&action=create" style="color: #fff;text-decoration: none">Create</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Hiển thị</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($result as $key): ?>
                            <tr>                          	
                                <td><?php echo $key->name; ?></td>
                                <td>
                                    <input type="checkbox" name="hienthitrangchu" <?php if($key->hienthitrangchu == 1): ?> checked <?php endif;?> >
                                </td>
                                <td>
                                	<a href="index.php?controller=category&action=update&id=<?php echo $key->id ?>">edit</a>
                                	<a href="index.php?controller=category&action=delete&id=<?php echo $key->id ?>">delete</a>
                                </td>
                            </tr>
                            <?php
                                // lấy id của $key->id
                                // so sánh với những cái id sub nếu có parent_id giống với $key->id thì lấy
                                $parent_id = $key->id;
                                $resultSub = $this->listCategorySub($parent_id);
                             ?>
                            <?php foreach ($resultSub as $keySub): ?>
                            <tr >
                                <td style="padding-left: 50px;"><?php echo $keySub->name ?></td>
                                <td>
                                    <input type="checkbox" name="hienthitrangchu" <?php if($keySub->hienthitrangchu == 1): ?> checked <?php endif;?> > 
                                </td>
                                <td>
                                    <a href="index.php?controller=category&action=update&id=<?php echo $keySub->id ?>">edit</a>
                                    <a href="index.php?controller=category&action=delete&id=<?php echo $keySub->id ?>">delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                       		<?php endforeach; ?>
                        </tbody>
                    </table>
                    <ul class="pagination">
                    	<?php for ($i=1; $i <= $numPage ; $i++):?>
                    	<li ><a style="margin-left: 5px;" class="btn btn-primary" href="index.php?controller=category&&action=read&&p=<?php echo $i; ?>" ><?php echo $i ?></a></li>
                    	<?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

