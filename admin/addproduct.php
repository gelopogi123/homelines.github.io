<?php

	include('session.php');
	
	$name=$_POST['name'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$supplier=$_POST['supplier'];
	$qty=$_POST['qty'];
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Please upload JPG or PNG photo only!');
					window.location.href='product.php';
				</script>
			<?php
		}
	}
	
	mysqli_query($conn,"insert into product (product_name,categoryid,product_price,product_qty,photo,supplierid) values ('$name','$category','$price','$qty','$location', '$supplier')");
	$pid=mysqli_insert_id($conn);
	
	mysqli_query($conn,"insert into audit (userid, action, productid, quantity, inventory_date) values ('".$_SESSION['id']."', 'Add Product', '$pid', '$qty', NOW())");
	
	?>
		<script>
			window.alert('Product added successfully!');
			window.history.back();
		</script>
	<?php
?>