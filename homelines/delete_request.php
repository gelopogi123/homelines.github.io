<?php include('session.php'); ?>
<?php



$id = $_GET['id'];



$sql = "DELETE FROM admin_side WHERE salesid = $id ";
$result = mysqli_query($conn, $sql);

$sql1 = "DELETE FROM sales_detail WHERE salesid = $id ";
$result1 = mysqli_query($conn, $sql1);

?>

<script>
    window.alert('Order Cancel');
    window.location.href='index.php';
</script>