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
            <h1 class="page-header">Customers
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="cusTable">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Username</th>
                        <th>Password</th>
						<th>Address</th>
                        <th>Contact Info</th>
						<th>Email</th>
						<th>Action</th>
						
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"select * from customers where customers.userid");
					while($cqrow=mysqli_fetch_array($cq)){
					?>
						<tr>
							<td><?php echo $cqrow['customer_name']; ?></td>
							<td><?php echo $cqrow['username']; ?></td>
							<td>*****</td>
							<td><?php echo $cqrow['address']; ?></td>
							<td><?php echo $cqrow['contact']; ?></td>
							<td><?php echo $cqrow['email'];   ?></td>
							<td>
						
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['userid']; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('user_button.php'); ?>
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