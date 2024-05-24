<?php include('header.php'); 
	   include('navbar.php');
?>
<?php include('session.php'); ?>

<?php



// if(isset($_SESSION['id'])) {
// 	?>
// 	<script>
// 		window.alert('Login Success, Welcome <?php echo $row['username']; ?>!!');
// 		window.location.href='index.php';
// 	</script>
// 	<?php
// } else {
// 	?>
// 	<script>
// 		window.alert('Login Success, Welcome <?php echo $row['username']; ?>!!');
// 		window.location.href='index.php';
// 	</script>
// 	<?php
// }
function check_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if(isset($_SESSION['id'])) {
	header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username=check_input($_POST['username']);
	
	if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
		$_SESSION['msg'] = "Username should not contain space and special characters!"; 
		header('location: login.php');
	}
	else{
		
	$fusername=$username;
	
	$password = check_input($_POST["password"]);
	$fpassword=md5($password);
	
	$query=mysqli_query($conn,"select * from `customers` where username='$fusername' and password='$fpassword'");
	
	if(mysqli_num_rows($query)==0){
		$_SESSION['msg'] = "Login Failed, Invalid username or password!";
		header('location: login.php');
	}
	else{
	
		$row=mysqli_fetch_array($query);
	if ($row['access']==2){
			$_SESSION['id']=$row['userid'];
			?>
			<script>
				window.alert('Login Success, Welcome <?php echo $row['username']; ?>!!');
				window.location.href='index.php';
			</script>
			<?php
	} 
	}
	
	}
}
?>
<body>

<div class="container">

	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> HomeLine Login</center></h2>
		<hr>


		<form method="POST" action="login.php">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
		<p class="message"> register<a href="register.php">Sign up</a>
     </p>
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
<?php include('script.php'); 
?>
</body>
</html>