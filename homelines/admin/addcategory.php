<?php
	include('session.php');
	
    $category_name=$_POST['category_name'];
  

	
	mysqli_query($conn,"insert into category (category_name) values ('$category_name')");
	
	?>
		<script>
			window.alert('Category added successfully!');
			window.history.back();
		</script>
	<?php
?>