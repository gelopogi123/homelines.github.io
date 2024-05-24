<?php
  include("session.php");
 
  include("conn.php"); 
  include("navbar.php"); 

if(isset($_POST['submit'])) {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "homelines";
            // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }

  $userid            =  $_SESSION['id'];
  $customer_name     =  mysqli_real_escape_string($conn, $_POST['name']);
  $email             =  mysqli_real_escape_string($conn, $_POST['email']);
  $address           =  mysqli_real_escape_string($conn, $_POST['address']);
  $zipcode           =  mysqli_real_escape_string($conn, $_POST['zipcode']);
  // $City              =  mysqli_real_escape_string($conn, $_POST['city']);
  $contact           =  mysqli_real_escape_string($conn, $_POST['contact']);
  $cod           =  mysqli_real_escape_string($conn, $_POST['cod']);
  
 
  $sql = "INSERT INTO form (userid, customer_name, address, email, contact, zipcode, cod)VALUES ('$userid','$customer_name', '$address','$email', '$contact','$zipcode', '$cod')";


  header("location: checkout.php");
  
  if(mysqli_query($conn, $sql)) {
      

  } else {
     echo "Error: " . $sql . "" . mysqli_error($conn);
  }
  $conn->close();
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Homeline</title>
    <link href="layout/bootstrap.min.css" rel="stylesheet">
    <link href="layout/font-awesome.min.css" rel="stylesheet">
    <link href="layout/prettyPhoto.css" rel="stylesheet">
    <link href="layout/price-range.css" rel="stylesheet">
    <link href="layout/animate.css" rel="stylesheet">
	<link href="layout/main.css" rel="stylesheet">
	<link href="layout/responsive.css" rel="stylesheet">
</head><!--/head-->
<body>
  <?php include("header.php"); ?>

  <section id="cart_items">
    <div class="container">
    <div class="register-req">
        <p>Please Fill your form carefully so that you get your Order correlty</p>
      </div><!--/register-req-->

      <div class="shopper-informations">
        <div class="row">
                <div class="col-sm-1">
            <div class="order-message">

      <form></form>
                  </div></div>
          <div style='position: absolute; center: 400px;'class="col-sm-8 clearfix">
          <div class="bill-to">
              <p>Information Form</p>
              <div class="form-one">
    <form action="form.php" method="post" name="form1">
      <input type="text" name="name" placeholder="Full Name *" required>
      <input type="text" name="email" placeholder="Email*" required>
      <input type="text" name="address" placeholder="Brgy,  Street,  Address *" required>          
      <input type="text" name="contact" placeholder="Contact # *" required>  
      <input type="text" name="zipcode" placeholder="Zip / Postal Code *">
      <select name="cod">
        <option>--Payment--</option>
        <option name = "cod" value="Cash on Delivery">Cash on Delivery</option>
      </select>
      <script type="text/javascript">

      function checkkform(form)
      {
        if(!form.terms.checked) {
          alert("Please Indicate that you accept the Terms and Conditions");
          form.terms.focus();
          return false;
        }
        return true;
      }
      </script>

      <form onsubmit="return checkform(this);">

      <p><input type="checkbox" required name="terms"> I Accept the <u> Terms and Conditions</u></p>
      <a class="btn btn-primary" href="checkout.php?cmd=emptycart">Cancel</a>
       <button type="submit"   name="submit" class="btn btn-primary" >Confirm Order</button>
      </form>
      
    </div>
    </div>
    
</form>

</div></div>        
</div></div>
</div></div>
</section> <!--/#cart_items--><br>


<a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;">
<i class="fa fa-angle-up">
</i></a>

<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
</body>
</html>
