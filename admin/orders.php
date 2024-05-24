<?php
include("session.php");
include("navbar.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($conn,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
  <?php include("header.php");?>
   	<div class="container-fluid main-container">
	<?php include("include/side_bar.php");?>
    <div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders
				<span class="pull-right">
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
<tr><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th>Address</th><th>Details</th><th>Shipping</th><th>Time</th><th>Action</th></tr>
<?php 
$result=mysqli_query($conn,"select order_id, product_name, cus_name, contact_no, email, address, city, details,zip_code, time, quantity from orders order by time Desc Limit $page1,10")or die ("query 1 incorrect.....");

while(list($order_id,$product_name,$cus_name,$contact_no,$email,$address,$city,$details,$zip_code,$time,$quantity)=mysqli_fetch_array($result))
{	
echo "<tr><td>$cus_name</td><td>$product_name</td><td>$email<br>$contact_no</td><td>$address<br>ZIP: $zip_code<br>$city</td><td>$details</td><td>$quantity</td><td>$time</td>

<td>
<a class=' btn btn-success' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
</td></tr>";
}
?>
</table>
</div></div>
<nav align="center"> 
<?php 
//counting paging

$paging=mysqli_query($conn,"select productid,image, product_name,price from product");
$count=mysqli_num_rows($paging);

$a=$count/5;
$a=ceil($a);
echo "<bt>";echo "<bt>";
for($b=1; $b<=$a;$b++)
{
?> 
<ul class="pagination " style="border:groove #666">
<li><a class="label-info" href="orders.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li></ul>
<?php	
}
?>
</nav>
</div></div>
<?php include("conn.php"); ?>
</body>
</html>