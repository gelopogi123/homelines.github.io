<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	
	$use=mysqli_query($conn,"select * from admin_detail where adminid='id'");
	$urow=mysqli_fetch_array($use);
	
	if ($password==$urow['password']){
		$pass=$password;
	}
	else{
		$pass=md5($password);
	}

	mysqli_query($conn,"update admin_detail set username='$username', password='$pass' where adminid='$id'");
	mysqli_query($conn,"update admin set admin_name='$name', address='$address', contact='$contact' where adminid='$id'");
	
	?>
		<script>
			window.alert('Admin updated successfully!');
			window.history.back();
		</script>
	<?php

?>