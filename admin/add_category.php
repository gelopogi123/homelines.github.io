<?php
	include('session.php');
	
	$name=$_POST['category_name'];
	mysqli_query($conn,"insert into category (category_name) values ('$name')");
	
	?>
		<script>
			window.alert('Category added successfully!');
			window.history.back();
		</script>
