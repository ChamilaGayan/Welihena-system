<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
date_default_timezone_set("Asia/Colombo");
$error="";
$msg="";

if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - PDS - DS Office Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		
<!--		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		
		<script>
    $(document).ready(function(){
        $("#modalbtn").click(function(){
            $("#myModal").modal('show');
        });
    });
</script>
<style>
    .btnpopup{ margin: 5px;
    }
	
	 .table td{	    padding: 0rem; padding-left:0.2rem;
		}
	
	 .table th{	    padding: 0.25rem;}
		
	.btn-group-lg>.btn, .btn-lg{
	padding: 0.25rem 0.5rem; 
	font-size: 1rem;
	}
	.table-responsive{ font-size: 13px;}
	.pb-4, .py-4{
padding-bottom: 0.75rem!important;
    font-size: small;
    padding-top: 0.75rem!important;
}
	
</style>
    </head>
    <body class="sb-nav-fixed">
 <?php include('includes/header.php');?>
 
		<!--sidebar-->
		
		<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('includes/sidebar.php');?>
            </div>
			
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 class="mt-4">Removed Item List</h4>
						
	<!---->					
		                     <div class="row">
			 <div class="card-body">
                 
				 
				    <button type="button" class="btn btn-primary btn-sm" style="width:100px; height:30px;"><a href="inv_managecategories.php" style=" color:#FFFFFF;">Categories </a></button>
				   <button type="button" class="btn btn-success btn-sm" style="width:100px; height:30px;"><a href="inv_managesuppliers.php" style=" color:#FFFFFF;">Supplier </a></button>
				   <button type="button" class="btn btn-danger btn-sm" style="width:100px; height:30px;"><a href="inv_managereceiveitems.php" style=" color:#FFFFFF;">Items</a></button>
				  
				   <button type="button" style=" background-color: #9999FF; border: none; width:100px; height:30px;" class="btn btn-primary btn-sm"><a href="inv_issueitems.php" style=" color:#FFFFFF;">Issue Items </a></button>
				   <button type="button" style=" background-color: #AC5959; border: none; height:30px;" class="btn btn-primary btn-sm"><a href="inv_instock_items.php" style=" color:#FFFFFF;">In Stock Items </a></button>
				   
				    <button type="button" style=" background-color: #CC33CC; border: none;  height:30px;" class="btn btn-primary btn-sm"><a href="employee_issued_details.php" style=" color:#FFFFFF;">Employee Inventory Details </a></button>
					<button type="button" style=" background-color: #E67815; border: none;  height:30px;" class="btn btn-primary btn-sm"><a href="inv_removed_item_list.php" style=" color:#FFFFFF;">Removed Inventory Items </a></button>
                        </div>           </div>
	<!---->					
				<div class="row">

                            <div class=" col-lg-12">

                                    <div class="card-body">
										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<div class=" card mb-4"><div class="btnpopup">
                        
							</div>
                            <div class="card-body">
                                <div class="table-responsive">

								   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>

										<tr class="table-active">
                                            <th>Sr no</th>
                                            <th>Item Name</th>
                                            <th>Brand</th>
											<th>Model</th>
											<th>Serial No</th>
											<th>Location</th>
											<th>Price(Rs.)</th>
											<th>Warranty</th>
											<th>Remark Type</th>

                                            <th>Remark</th>
                                        </tr>
                                    </thead>
									<tbody>
<?php $sql = "SELECT * from inv_item";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  

$remark_status=$result->remark_status;
if ( $remark_status==2 ){





             ?>  
 <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->item_name);?></td>
                                            <td><?php echo htmlentities($result->brand);?></td>
                                            <td><?php echo htmlentities($result->model);?></td>
											
                                            <td><?php echo htmlentities($result->serial_No);?></td>
                                            <td><?php echo htmlentities($result->location);?></td>
                                            <td><?php echo htmlentities($result->price);?></td>
                                            <td><?php echo htmlentities($result->warranty);?></td>
                                            
											<?php 
                                                   
													$remark_type=$result->remark_type;
                                                if ($remark_type==1 ){
                                                     ?>
                                                <td style="background-color: #FFCC33;">
                                                
                                                 Dispose   </td>
                                                <?php
                                                } ?>
    
												<?php 
                                                    $remark_type=$result->remark_type;
													
                                                if ($remark_type==2){
                                                     ?>
                                                <td style="background-color: #7E85CF;">
                                                
                                                 Auction  </td>
												
												<?php
                                                } ?>
    
												<?php 
                                                    
													$remark_type=$result->remark_type;
                                                if ($remark_type==3){
                                                     ?>
                                                <td style="background-color: #E87DD2;">
                                                 Transfer to Another Place   </td>
                                                <?php }
                                                ?>
											
											
											
											
                                            <td><?php echo htmlentities($result->remark);?></td>
                                        </tr>
                                         <?php $cnt++;}} }?>
                                    </tbody>
                                </table>

                                    </div>
                                </div>
                            </div>
                        </div>
							
                      </div></div></div>
                </main>
				<div><br></div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
<?php //} ?> 