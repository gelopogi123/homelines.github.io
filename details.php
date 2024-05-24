
<html>
<body>
<!-- Full Details -->
    <div class="modal fade" id="detail<?php echo $sqrow['salesid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Homeline Enterprises Receipt</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$sales = mysqli_query($conn,"SELECT * FROM admin_side where salesid='".$sqrow['salesid']."'");
					$srow  = mysqli_fetch_array($sales);
				?>
				<table width="100%" cellpadding="5" >
					<tr>
						<td width="65%">
							To,<br />
							<b>RECEIVER (BILL TO)</b><br>
							Name :	<strong><?php echo ucwords($srow['name']); ?></strong><br>	
							Billing Address : <strong><?php echo ucwords($srow['address']); ?></strong><br>
							Email : <strong><?php echo ucwords($srow['email']); ?></strong><br>
							Contact : <strong><?php echo ucwords($srow['contact']); ?></strong><br>
						</td>
						
						<td width="35%">
						
							Invoice No. : <strong><?php echo ucwords($srow['salesid']); ?></strong><br />
							Invoice Date :<?php echo date("F d, Y", strtotime($srow['sales_date'])); ?></
							strong><br />
						    Payment Method :	<strong><?php echo ucwords($srow['payment']); ?></strong><br>	
							
						</td>
					</tr>
				</table>
					
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Price</th>
										<th>Purchase Qty</th>
										<th>SubTotal</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										$pd=mysqli_query($conn,"select * from sales_detail left join product on product.productid=sales_detail.productid where salesid='".$sqrow['salesid']."'");
										while($pdrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td><?php echo ucwords($pdrow['product_name']); ?></td>
												<td align="right"><?php echo number_format($pdrow['product_price'],2); ?></td>
												<td><?php echo $pdrow['sales_qty']; ?></td>
												<td align="right">
													<?php 
														$subtotal=$pdrow['product_price']*$pdrow['sales_qty'];
														echo number_format($subtotal,2);
														$total+=$subtotal;
													?>
												</td>

											</tr>
											<?php
										}
									?>
									<tr>

										<td align="right" colspan="3"><strong>Total</strong></td>
										<td align="right"><strong><?php echo number_format($total,2); ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
		

                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
   				</div>
            </div>
        </div>
    </div>

</body>
</html>