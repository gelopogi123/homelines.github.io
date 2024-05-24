<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from supplier where supplierid='$id'");
	
	header('location:supplier.php');

?>