<?php
	include('session.php');

	if(isset($_SESSION['id'])) {

		if(isset($_POST['cart'])){

			$id=$_POST['id'];
			$qty=$_POST['qty'];
			
			if($qty == 0) {

				echo "Invalid Quantity Value";
			} else if ($qty < 1) {

				echo "Quantity must be greater than or equal to one";
					
			// } else if ($qty > ) {

			// 	echo "asdsadsadsa";
			

			} else {

				$sql = "SELECT product_qty FROM product WHERE productid = ".$id." ";
				$result = mysqli_query($conn , $sql);

				while($row = mysqli_fetch_array($result)) {

					$product_qty = $row['product_qty'];

					if($product_qty < $qty) {
						echo "Not enough stock";
					} else {
						$query=mysqli_query($conn,"select * from cart where productid= '$id' and userid='".$_SESSION['id']."'");
						if (mysqli_num_rows($query) > 0){
							echo "Product already on your cart!";
						} else {
							mysqli_query($conn,"insert into cart (userid, productid, qty) values ('".$_SESSION['id']."', '$id', '$qty')");
						}
						
					}
				}
			}
		}
	} else {
		echo "Login first";
	}
	

?>