<?php
	session_start();
	
	if (!isset($_SESSION['adminid']) ||(trim ($_SESSION['adminid']) == '')) {
	header('location:../index.php');
    exit();
	}
	
	include('../conn.php');

	$sq=mysqli_query($conn,"select * from `admin_detail` where adminid='".$_SESSION['adminid']."'");
	$srow=mysqli_fetch_array($sq);
	
	$admin =$srow['username'];
?>