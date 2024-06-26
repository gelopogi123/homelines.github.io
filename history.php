<?php include('session.php');
 	  include('header.php'); 
	  include('navbar.php'); 
	  include('cart_search_field.php');

	  
	  if(isset($_SESSION['id'])) {
		
	  } else {
		 
		  header("Location: login.php");
	  }

?>
<body>

<div class="container">
	<div style="height: 50px;"></div>
		<div class="row">
        	<div class="col-lg-12">
            	<h1 class="page-header">Purchase History</h1>
        	</div>
    	</div>
          
				<div class="row">
                <div class="col-lg-12">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
								<th>Purchase Date</th>
								<th>Total Amount</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							
							if(isset($_SESSION['id'])) {

								$h=mysqli_query($conn,"select * from admin_side where orderid='".$_SESSION['id']."' order by sales_date desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['sales_date']));?></td>
											<td><?php echo number_format($hrow['sales_total'],2); ?></td>
											<td>
												<a href="#detail<?php echo $hrow['salesid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
												<?php include ('modal_hist.php'); ?>
											</td>
										</tr>
									<?php
								} 
							} else {
								echo "Login first";
								
							}
								
							?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	
	
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	$('#history').addClass('active');
	
	$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	});
});
</script>
</body>
</html>