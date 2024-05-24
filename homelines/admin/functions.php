<?php include('session.php'); ?>
<?php
function redirect($location){
    
    header("Location: $location");
    
}

if(isset($_POST['accept'])) {

	$salesid    	= mysqli_real_escape_string($conn ,$_POST['salesid']);
	$sales_total    = mysqli_real_escape_string($conn ,$_POST['sales_total']);
	$sales_date     = mysqli_real_escape_string($conn ,$_POST['sales_date']);


	// $sql ="INSERT INTO sales(orderid, sales_total , sales_date) VALUES ('$orderid',
	// '$sales_total', '$sales_date')";
	$sql = "UPDATE admin_side SET active = 1 WHERE salesid = ".$salesid." ";

	if ($conn->query($sql) === TRUE) {
		 redirect('admin_side.php');
		// echo $sql;
		include('session.php');
		$total=$_GET['total'];
		
		if(preg_match("/^[0-9,]+$/", $total)){
			$new=$total;
		}
		else{
			$new = str_replace(',', '', $total);
		}

		$query=mysqli_query($conn,"select * from cart where userid='".$_SESSION['id']."'");
		while($row=mysqli_fetch_array($query)){
			mysqli_query($conn,"insert into sales_detail (salesid, action, productid, sales_qty) values ('$sid', '".$row['productid']."', '".$row['qty']."')");
			
			$pro=mysqli_query($conn,"select * from product where productid='".$row['productid']."'");
			$prorow=mysqli_fetch_array($pro);
			
			$newqty=$prorow['product_qty']-$row['qty'];
			
			mysqli_query($conn,"update product set product_qty='$newqty' where productid='".$row['productid']."'");
			
			mysqli_query($conn,"insert into delivery (userid, action, productid, quantity, delivery_date) values ('".$_SESSION['id']."', 'Approve', '".$row['productid']."', '".$row['qty']."', NOW())");
		
			mysqli_query($conn,"insert into inventory (userid, action, productid, quantity, inventory_date) values ('".$_SESSION['id']."', 'Purchase', '".$row['productid']."', '".$row['qty']."', NOW())");
		}
		mysqli_query($conn,"delete from cart where userid='".$_SESSION['id']."'");
		header("location: admin_side.php");
	$_SESSION['id'];

	}
}














// 		$sql1 ="DELETE FROM admin_side WHERE salesid = $orderid";

// 		if ($conn->query($sql1) === TRUE) {
//     	echo "Record deleted successfully";
// 		} else {
//     	echo "Error deleting record: " . $conn->error;
// 		}
//  	    redirect("admin_side.php");
// 	} else {
// 	    echo "Error: " . $sql . "<br>" . $conn->error;
// 	}
// }

// if(isset($_POST['remove'])) {
// 	$salesid = mysqli_real_escape_string($conn ,$_POST['salesid']);
// 	$sql ="DELETE FROM admin_side WHERE salesid = $salesid";

	// if ($conn->query($sql) === TRUE) {
	//     echo "Delete record successfully" . $sql;
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// }


?>