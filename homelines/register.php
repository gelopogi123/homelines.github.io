<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Homeline Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
		<div class="input-group">
  	  <label>Customer Name:</label>
  	  <input type="customer_name" name="customer_name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="username" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
		<div class="input-group">
  	  <label>Address</label>
  	  <input type="address" name="address" value="<?php echo $address; ?>">
  	</div>
		<div class="input-group">
  	  <label>Contact:</label>
  	  <input type="contact" name="contact" value="<?php echo $contact; ?>">
  	</div>
		<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
		
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
     <span style="color:dodgerblue"><input type="checkbox" name="remember" style="margin-bottom:15px" required>
              <a target="_blank" rel="noopener noreferrer" href="terms_and_condition.html">Terms & Privacy</a></span>.
   
  </form>

 <?php include('script.php'); ?>
  <script type="text/javascript">
    $(document).ready(function () {
      $("#terms_and_condition").click(function () {
        $("#myModal").modal();  
      });
      $("[name='remember']").click(function () {
        if ($(this).is(':checked')) {
          $("[name='sign_up']").prop("disabled",false);
        } else {
          $("[name='sign_up']").prop("disabled",true);
        }
      });
    });
  </script>
</body>
</html>