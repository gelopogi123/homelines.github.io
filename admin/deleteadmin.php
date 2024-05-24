<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from admin_detail where adminid='$id'");
	mysqli_query($conn,"delete from admin where adminid='$id'");
	
	header('location:admin.php');

?>