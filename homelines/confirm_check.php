<?php
	include('session.php');

	// echo $_SESSION['checktotal'];
	$fullname = $_POST['cname'];
	// echo "cname";
	$address  = $_POST['address'];
	// echo "address";
	$contact  =	$_POST['contact'];
	// echo "contact";
	$email = $_POST['email'];
	// echo "email";
	$payment  = $_POST['payment'];
// echo "payment";
	// if(preg_match("/^[0-9,]+$/", $total)){
	// 	$new=$total;
	// }
	// else{
	// 	$new = str_replace(',', '', $total);
	// }

	mysqli_query($conn,"INSERT INTO admin_side (orderid, active, sales_total, sales_date, name, address, contact, email,payment) VALUES ('".$_SESSION['id']."','0','".$_SESSION['checktotal']."', NOW(),'$fullname','$address','$contact','$email','$payment')");
	$sid=mysqli_insert_id($conn);
	
	$query=mysqli_query($conn,"select * from cart where userid='".$_SESSION['id']."'");
	while($row=mysqli_fetch_array($query)){

		 mysqli_query($conn,"insert into sales_detail (salesid, productid, sales_qty) values ('$sid', '".$row['productid']."', '".$row['qty']."')");
		
	// 	$pro=mysqli_query($conn,"select * from product where productid='".$row['productid']."'");
	// 	$prorow=mysqli_fetch_array($pro);
		
	// 	$newqty=$prorow['product_qty']-$row['qty'];
		
	// 	mysqli_query($conn,"update product set product_qty='$newqty' where productid='".$row['productid']."'");
		
	// 	mysqli_query($conn,"insert into inventory (userid, action, productid, quantity, inventory_date) values ('".$_SESSION['id']."', 'Purchase', '".$row['productid']."', '".$row['qty']."', NOW())");
	
	 }
	
		// mysqli_query($conn,"delete from cart where userid='".$_SESSION['id']."'");
	 	 header("location: thankyou.php");
	  $_SESSION['id'];


?>