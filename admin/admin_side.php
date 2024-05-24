
<head>

<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
 
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pending</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
      
            <form method="post" action="functions.php">
           
           
                <table width="100%" class="table table-striped table-bordered table-hover" id="salesTable">
                    <thead>
                        <tr>
                            <th class="hidden"></th>
                            <th>Sales Date</th>
                            <th>Customer User</th>
                           
                            <th>Total Purchase</th>
                            <th>Details</th>
                            <th>Action</th>
                            <th>Status</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php    
                      $sq=mysqli_query($conn,"SELECT * from admin_side left join customers on customers.userid=admin_side.orderid WHERE active = 0 order by sales_date desc");
                      while($sqrow=mysqli_fetch_array($sq)){
                         $salesid = $sqrow["salesid"];
                         $username = $sqrow["username"];
                         $contact =$sqrow["contact"];
                         $sales_date =$sqrow["sales_date"];
                       
                         $sales_total =$sqrow["sales_total"];
                         $status = $sqrow['active'];

                         if($status == 0) {
                             $status1 = "PENDING";
                         } elseif ($status == 1) {
                             $status1 = "APPROVED";
                         } elseif($status == 2) {
                             $status1 = "CANCELED";
                         } 
                        ?>
                      
                            <tr>
                                <td class="hidden">
                                    <input type="hidden" name="salesid" value="<?php echo $sqrow['salesid']; ?>">
                                </td>
                                <td>
                                    <?php echo date('M d, Y h:i A',strtotime($sqrow['sales_date'])); ?>
                                    <input type="hidden" name="sales_date" value="<?php echo date('M d, Y h:i A',strtotime($sqrow['sales_date'])); ?>">
                                </td>
                                <td>
                                    <?php echo $sqrow['username']; ?>
                                    <input type="hidden" name="username" value="<?php echo $sqrow['username']; ?>">
                                    
                                </td>
                               
                                <td align="right">
                                    <?php echo number_format($sqrow['sales_total'],2); ?>
                                    <input type="hidden" name="sales_total" value="<?php echo number_format($sqrow['sales_total'],2); ?>">
                                  </td>
                                 <td>
                                    <a href="#admin_detail<?php echo $sqrow['salesid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-fullscreen"></span>View Full Details
                                    </a>
                                    <?php include ('admin_detail.php'); ?>
                                   
                                  </td>  
                                     
                       
                                <td>
                    
                                <button type="submit" class="btn btn-success" name="accept" ><span class="glyphicon glyphicon-check"></span>
                                </button>
                               </td>
                               <td>
                                    <?php echo $status1; ?>
                                    <input type="hidden" name="status" value="<?php echo $sqrow['status']; ?>">
                                    
                                </td>
                                
                      
                    </tr>
                            
                        <?php
                        }
                    
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</head>
</body>
</html>