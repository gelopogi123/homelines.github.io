<?php
	include('session.php');
	
	$id=$_GET['id'];
	$name=$_POST['category_name'];

	mysqli_query($conn,"update category set category_name='$name' where categoryid='$id'");
	
	?>
		<script>
			window.alert('category updated successfully!');
			window.history.back();
		</script>
	<?php

?>