<?php 
	$this->layoutPath = "layout.php";
 ?>
 
   <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($result as $key): ?>
                            <tr>                          	
                                <td><?php echo $key->name; ?></td>
                                <td><?php echo $key->email; ?></td>
                                <td>
                                	<a href="index.php?controller=user&action=update&id=<?php echo $key->id ?>">edit</a>
                                	<a href="index.php?controller=user&action=update&id=<?php echo $key->id ?>">update</a>
                                </td>
                            </tr>
                       		<?php endforeach; ?>
                        </tbody>
                    </table>
                    <ul class="pagination">
                    	<?php for ($i=1; $i <= $numPage ; $i++):?>
                    	<li ><a style="margin-left: 5px;" class="btn btn-primary" href="index.php?controller=user&&action=read&&p=<?php echo $i; ?>" ><?php echo $i ?></a></li>
                    	<?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

