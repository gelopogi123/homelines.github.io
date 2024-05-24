<?php
	
	include('session.php');
	$id = $_GET['id'];
	
	$p=mysqli_query($conn,"select * from product where productid='$id'");
	$prow=mysqli_fetch_array($p);
	
	$name		=$_POST['name'];
	$category	=$_POST['category'];
	$supplier	=$_POST['supplier'];
	$price		=$_POST['price'];
	$qty		=$_POST['qty'];
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location=$prow['photo'];
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location=$prow['photo'];
			?>
				<script>
					window.alert('Photo not updated. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	$sql =  mysqli_query($conn,"SELECT product_qty FROM product where productid = '$id' ");
	$result = $sql;
	$row = mysqli_fetch_array($result);
	$product_prev_val = $row['product_qty'];

	$sql = "UPDATE product set product_name='$name', supplierid=$supplier, categoryid=$category, product_price=$price, photo='$location', product_qty=$qty, old_value=$product_prev_val where productid= $id ";
	$result = mysqli_query($conn, $sql);

	$sql2 =  "INSERT INTO audit (userid, action, productid, old_values, quantity, inventory_date) VALUES ('".$_SESSION['adminid']."','Update Product','$id','$product_prev_val','$qty', NOW())";
	$result = mysqli_query($conn, $sql2);


	?>
		<script>
			window.alert('Product updated successfully!');
			window.history.back();
		</script>
	<?php

?>