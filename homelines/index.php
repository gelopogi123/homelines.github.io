<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>


<div class="container">
<style type="text/css">
		#slideshow {
  margin: 80px auto;
  position: absolute;
  width: 1150px;
  height: 500px;
  padding: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
}

#slideshow > div {
  position: absolute;
  top: 10px;
  left: 10px;
  right: 10px;
  bottom: 10px;
}

	</style>
<div id="slideshow">
   <div>
     <img src="upload/bg1.jpg" style="height: 480px; width: 1130px">
   </div>
   <div>
     <img src="upload/bg2.jpg" style="height: 480px; width: 1130px">
   </div>
   <div>
     <img src="upload/bg3.jpg" style="height: 480px; width: 1130px">
   </div>
    <div>
     <img src="upload/bg4.jpg" style="height: 480px; width: 1130px">
   </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include('cart_search_field.php'); ?>
		<?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $conn=mysqli_connect("127.0.0.1","root","","homelines");
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $total_pages_sql = "SELECT COUNT(*) FROM product";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM product LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){

        ?>
        	<div class="col-lg-3">
				<div>
					<img src="<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
					<div style="height: 10px;"></div>
					<div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['product_name']; ?></div>
					<div style="height: 10px;"></div>
			
			
							
					<div style="margin-left:17px; margin-right:17px;">
					<form method="post" action="index.php">

          Quantity: <input type="number" name="qty" style="width:80px;" id="qty<?php echo $row['productid']; ?>"> 
          <?php echo number_format($row['product_price'],2); ?>
				<br>
          <br>
        	<button type="button" name="btnqty" style="width:150px;" class="btn btn-primary btn-sm concart" value="<?php echo $row['productid']; ?>">Add to Cart</i></button></div>
					<br>
          <br>

					</form>
								
					<!--<div style="margin-left:17px; margin-right:17px;">
						<button type="button" class="btn btn-primary btn-sm addcart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Add to Cart</button> <span class="pull-right"><strong><?php echo number_format($row['product_price'],2); ?></strong></span> 
					</div>-->
				</div>
				</div>
        <?php
        }
        //  mysqli_close($conn);
    ?>
<style>
.container {
  position: relative;
}

.bottomright {
  position: absolute;
  bottom: 8px;
  right: 16px;
  font-size: 18px;
}
</style>
    <div id="bottomright">
    	<ul class="pagination pull-right">
	        <li><a href="?pageno=1">First</a></li>
	        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
	            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
	        </li>
	        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
	            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
	        </li>
	        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
	    </ul>
    </div>

		

	</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include('script.php'); ?>
<?php include('modal.php'); ?>

<script src="custom.js"></script>
<script type="text/javascript">
	$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');8888888888888888888888888
}, 3000);
</script>
<div class="classy-nav-container breakpoint-off">
                <div class="container">
					
</div>
</div>











</body>
</html>