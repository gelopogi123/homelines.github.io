<?php
	include('session.php');
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	
	mysqli_query($conn,"insert into admin_detail (username, password, access) values ('$username', '$password', '2')");
	$adminid=mysqli_insert_id($conn);
	
	mysqli_query($conn,"insert into admin (adminid, admin_name, address, contact) values ('$adminid', '$name', '$address', '$contact')");
	
	?>
		<script>
			window.alert('Admin added successfully!');
			window.history.back();
		</script>
	<?php
?>