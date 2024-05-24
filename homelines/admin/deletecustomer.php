<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from customers where userid='$id'");
	
	header('location:customer.php');

?>