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
            <h1 class="page-header">Admin
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_admin"><i class="fa fa-plus-circle"></i> Add Admin</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="adTable">
                <thead>
                    <tr>
                        <th>Admin Name</th>
                        <th>Username</th>
                        <th>Password</th>
						<th>Address</th>
                        <th>Contact Info</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$aq=mysqli_query($conn,"select * from admin left join admin_detail on admin_detail.adminid=admin.adminid");
					while($aqrow=mysqli_fetch_array($aq)){
					?>
						<tr>
							<td><?php echo $aqrow['admin_name']; ?></td>
							<td><?php echo $aqrow['username']; ?></td>
							<td>*****</td>
							<td><?php echo $aqrow['address']; ?></td>
							<td><?php echo $aqrow['contact']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $aqrow['adminid']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<!-- <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $aqrow['adminid']; ?>"><i class="fa fa-trash"></i> Delete</button> -->
								<?php include('admin_button.php'); ?>
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