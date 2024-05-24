<?php include('header.php'); 
      ?>
<?php
	session_start();
	
	// if (isset($_SESSION['id'])){
	// 	$query=mysqli_query($conn,"select * from admin_detail where adminid='".$_SESSION['id']."'");
	// 	$row=mysqli_fetch_array($query);
		
	// 	if ($row['access']==1){
	// 		header('location:admin/');
	// 	}
	// }
?>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> Homeline Admin Login</center></h2>
		<hr>
		<form method="POST" action="admin_login.php">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
<?php include('script.php'); ?>
</body>
</html>