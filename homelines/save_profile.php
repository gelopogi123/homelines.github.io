<?php
	include('session.php');
	$uid=$_GET['id'];

	$name= $_POST['cname'];
	$address= $_POST['address'];
	$contact= $_POST['contact'];
	$payment= $_POST['payment'];
	$email= $_POST['email'];
	mysqli_query($conn,"update customers set customer_name='$name', address='$address', email='$email', contact='$contact', payment='$payment' where userid='$uid'");
	
	?>
			<script>
				window.alert('Account updated successfully!');
				window.history.back();
			</script>
			<?php
		
?>