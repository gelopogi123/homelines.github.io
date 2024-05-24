<?php

	include('session.php');
	
	$cpass  = $_POST['cpass'];
	$repass = $_POST['repass'];
	$username = $_POST['username'];
	$fipassword = $_POST['password'];

	$mdrep = md5($_POST['repass']);
	
	$user_id =  $_SESSION['id'];
	$sql = "SELECT bpassword FROM customers WHERE userid = ".$user_id."  ";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);

		$bpassword = $row['bpassword'];
		$_SESSION['bpass'] = $bpassword;

		if($bpassword != $_POST['password']) {
			?>
			<script>
				window.alert('Password did not match!');
				window.history.back();
			</script>
			<?php
		} elseif($cpass != $repass) {
			?>
			<script>
				window.alert('New password did not match!');
				window.history.back();
			</script>
			<?php

		} else {
			// echo $fipassword;
			$sql = mysqli_query($conn,"UPDATE customers SET username = '$username', password='$mdrep', bpassword='$repass' WHERE userid='".$_SESSION['id']."' ");
			?>
			<script>
			window.alert('Account updated successfully!');
			window.history.back();
			</script>
			<?php
		}

	}
		
?>