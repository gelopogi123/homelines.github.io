<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<body>
<div class="container">
	<div style="height:80px;"></div>
	<div class="row">
		<div class="col-lg-12">
			<a href="index.php" class="btn btn-primary" style="position:relative; left:3px;"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
		</div>
	</div>
	<div style="height:10px;"></div>
	<div id="checkout_area"></div>

	<div style="height:20px;"></div>
	<div class="row">
	<?php 
	if(!isset($_SESSION['id'])) {
		
	} else {
		$query = mysqli_query($conn ,"SELECT * FROM cart WHERE userid = '".$_SESSION['id']."'  ");
		if (mysqli_num_rows($query) > 0){ 
		?>
				
		<button type="submit"  href="#profile" data-toggle="modal" class="btn btn-primary pull-right" style="margin-right:15px;"><i class="fa fa-check fa-fw"></i> Continue to Payment </button>

		</div>
		<?php
		// header("Location: checkout.php");
		} else {
			echo "No products";
		}

	}

	
	?>

</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	showCheckout();
	
});
</script>
</body>
</html>