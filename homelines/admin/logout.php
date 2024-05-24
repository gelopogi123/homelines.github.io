<?php
	session_start();
	
	include('conn.php');
	
	mysqli_query($conn,"update adminlog set logout=NOW() where adminlogid='".$_SESSION['adminlog']."'");
	
	unset($_SESSION['adminid']);
	header('location:../index.php');

?>