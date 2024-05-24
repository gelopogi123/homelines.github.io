<?php require_once("session.php");
function redirect($location){
    header("location:$location");
}

if(isset($_GET['id'])) {
   $id = $_GET['id'];
      $query = mysqli_query($conn, "DELETE FROM admin_side 
      WHERE salesid=$id".mysqli_real_escape_string($id)."");
     redirect("admin_side.php? items_deleted");
}


?>