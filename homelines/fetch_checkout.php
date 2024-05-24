<?php
	include('session.php');
	if(isset($_POST['check'])){
		?>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<th></th>
				<th>Product Name</th>
				<th>Available Qty</th>
				<th>Product Price</th>
				<th>Purchase Qty</th>
				<th>SubTotal</th>
			</thead>
			<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				if(!isset($_SESSION['id'])) {
					echo "Login First";
				} else {
					$query=mysqli_query($conn,"select * from cart left join product on product.productid=cart.productid where userid= '".$_SESSION['id']."' ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><button type="button" class="btn btn-danger btn-sm remove_prod" onclick="rel().this"value="<?php echo $row['productid']; ?>"><i class="fa fa-trash fa-fw"></i> Remove</button></td>
							<td><?php echo $row['product_name']; ?></td>
							<td><?php echo $row['product_qty']; ?></td>
							<td align="right"><?php echo number_format($row['product_price'],2); ?></td>
							<td><button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
								<button type="button"class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-plus fa-fw"></i></button> 
								<?php echo $row['qty'];?>
							</td>
							<td align="right"><strong><span class="subt">
								<?php
									$subtotal=$row['qty']*$row['product_price'];
									echo number_format($subtotal,2);
									$total+=$subtotal;
									$_SESSION['checktotal'] = $total;
								?>
							</span></strong></td>
						</tr>
						<?php
					}
				}

			?>
			<tr>
				<td colspan="5"><span class="pull-right"><strong>Grand Total</strong></span></td>
				<td align="right"><strong><span id="total"><?php echo number_format($total,2); ?></span><strong></td>
			</tr>
			</form>
			</tbody>
		</table>
		<?php
	}


?>
		<script>
		function rel() {
			window.alert('Product Deleted!');
			self.location = "checkout.php";
		}
		</script>


		
		<!-- Edit Profile -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<?php
		$cq=mysqli_query($conn,"select * from customers where customers.userid='".$_SESSION['id']."'");
		$crow=mysqli_fetch_array($cq);
	?>
	     
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Billing Address</h4></center>
                </div>
				
                <div class="modal-body">
				
				<div class="container-fluid">
				
                    <form role="form" method="POST" action="confirm_check.php<?php echo '?id='.$_SESSION['id']; ?>" enctype="multipart/form-data">
						<div class="container-fluid">
						<label>Billing Address</label>
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="cname" value="<?php echo ucwords($crow['customer_name']); ?>">
                        </div>
						<div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="address" value="<?php echo ucwords($crow['address']); ?>">
                        </div>
						<div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Contact Info:</span>
                            <input type="text" style="width:330px;" class="form-control" name="contact" value="<?php echo $crow['contact']; ?>">
                        </div>
						 <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Email:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="email" value="<?php echo ucwords($crow['email']); ?>">
                         </div>
						 <div class="form-group">
							<label>Select Payment Status</label>
							<select name="payment" id="payment" class="form-control">
								<option value="cash on delivery">Cash on Delivery</option>
							
							</select>
						</div>
    				</div>
                <div class="modal-footer">
                	<?php 
	if(!isset($_SESSION['id'])) {
		
	} else {
		$query = mysqli_query($conn ,"SELECT * FROM cart WHERE userid = '".$_SESSION['id']."'  ");
		if (mysqli_num_rows($query) > 0){ 
		?>
				<button type="submit" href="#profile" id="check" data-toggle="modal" class="btn btn-primary pull-right" style="margin-right:15px;"><i class="fa fa-check fa-fw"></i> Confirm</button>
		
		</div>
		<?php
		// header("Location: checkout.php");
		} else {
			echo "No products";
		}

	}

	
	?>

					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
