<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_category"><i class="fa fa-plus-circle"></i> Add Category</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="catTable">
                <thead>
                    <tr>
                        <th>Company Name</th>
	
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
				$caq=mysqli_query($conn,"select categoryid, category_name from category");
				while($caqrow=mysqli_fetch_array($caq)){
					?>
						<tr>
							<td><?php echo $caqrow['category_name']; ?></td>
							
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $caqrow['categoryid']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $caqrow['categoryid']; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('cat_butt.php'); ?>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>