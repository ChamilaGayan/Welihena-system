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
else{
if(isset($_POST['update']))
{
$item_id=intval($_GET['item_id']); 
$remark_type=$_POST['remark_type'];
$remark=$_POST['remark'];

	$sql_r="UPDATE inv_item SET remark_type='$remark_type',remark='$remark',remark_status='2' WHERE item_id='$item_id'";
	if($remark_type > 0){
	$res= mysqli_query($conn, $sql_r) or die(mysqli_error());
	}


if($res)
{
   
	
  
$msg="Item details updated Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}


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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		
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
.form-control{
font-size :small;
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
                        <h4 class="mt-4">Update Items <a href="inv_managereceiveitems.php" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" style="float:right;" >Back</a></h4>
                        <div class="row">

                            <div class=" col-lg-12">

                                    <div class="card-body" style="background-color:#FFCC99;">
										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$item_id=intval($_GET['item_id']);
$sql = "SELECT * from inv_item WHERE item_id=:item_id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':item_id',$item_id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{             
$item_id=$result->item_id;   
$cat_id=$result->cat_id;  


$sql4 = "SELECT * from inv_catagory where cat_id=:cat_id";
$query4 = $dbh -> prepare($sql4);
$query4->bindParam(':cat_id',$cat_id,PDO::PARAM_STR);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
foreach($results4 as $result4)
{
$category = $result4->cat_name;
}





  ?> 


                                         <form id="example-form" method="post" name="additems">
                                            <div class="form-row">
											
                                               <div class="col-md-12">
											 <table>
											 <tbody style="font-size: small;">
												 
												 <tr>
													 <td width="50%;"><label class=" mb-1" for="cat_id"><b>Category </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo $category;?></td>
												 </tr>
												 <tr>
													 <td><label class=" mb-1" for="item_name"><b>Item Name </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo htmlentities($result->item_name);?></td>
												 </tr>
												 <tr>
													 <td><label class=" mb-1" for="brand"><b>Brand </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo htmlentities($result->brand);?></td>
												 </tr>
												 <tr>
													 <td><label class="mb-1" for="model"><b>Model </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo htmlentities($result->model);?></td>
												 </tr>
												 <tr>
													 <td><label class=" mb-1" for="serial_No"><b>Serial Number </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo htmlentities($result->serial_No);?></td>
												 </tr>
												 <tr>
													 <td><label class=" mb-1" for="price"><b>Price (Rs.) </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo htmlentities($result->price);?></td>
												 </tr>
												 <tr>
													 <td><label class=" mb-1" for="warranty"><b>Purchase Date </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo htmlentities($result->date);?> </td>
												 </tr>
												 <tr>
													 <td><label class=" mb-1" for="warranty"><b>Warranty</b></label></td>
													 <td><b>:</b>&nbsp;<?php echo htmlentities($result->warranty);?></td>
												 </tr>
											 </tbody>
											 </table>
												
                                            	
											
                                            </div>
											<?php }}?>
<!---->						

							<div class="card-body">
                                <div class="table-responsive">

								   <table class="table table-bordered" id="" width="75%" cellspacing="0">
                                      <thead>

										<tr class="table-active">
                                            <th>Sr no</th>
                                            <th>Sub Item Serial Number</th>
                                            <th>Sub Item Name</th>
                                        </tr>
                                    </thead>
									<tbody>
<?php 
$item_id=intval($_GET['item_id']);
$sql2 = "SELECT * from inv_sub_item WHERE item_id=:item_id";
$query2 = $dbh -> prepare($sql2);
$query2-> bindParam(':item_id',$item_id, PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query2->rowCount() > 0)
{
foreach($results2 as $result2)
{               ?>  
 <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result2->sub_serial_No);?></td>
                                            <td><?php echo htmlentities($result2->sub_item_name);?></td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
								<?php
								 $remark_status=$result->remark_status;
									if ( $remark_status==0 ){
								?>
								<div class="col-md-12">
									<b>Add Remark : </b><br>
									<input type="radio" id="dispose" name="remark_type" value="1"><label for="dispose">&nbsp;&nbsp;Dispose</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" id="auction" name="remark_type" value="2"><label for="auction">&nbsp;&nbsp;Auction</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" id="transfer" name="remark_type" value="3"><label for="transfer">&nbsp;&nbsp;Transfer to Another Place</label>
									<br>
									<input class="form-control py-4" id="remark" name="remark" type="text" placeholder="Enter Remark"/>
								
								
								</div>
								

                                    </div>
                                                </div></div>

<!---->											
                                            <div class="form-group mt-4 mb-0">
											<button type="submit" name="update" onClick="return valid();" id="update" class="btn btn-primary">Update</button>
											
                                                </div>
								<?php } ?>
    
								<?php 
                                 $remark_status=$result->remark_status;
													
                                  if ($remark_status==1){
                                   ?>
								   <div class="col-md-12">
									<b>Add Remark : </b><br>
									<input type="radio" id="dispose" name="remark_type" value="1"><label for="dispose">&nbsp;&nbsp;Dispose</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" id="auction" name="remark_type" value="2"><label for="auction">&nbsp;&nbsp;Auction</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" id="transfer" name="remark_type" value="3"><label for="transfer">&nbsp;&nbsp;Transfer to Another Place</label>
									<br>
									<input class="form-control py-4" id="remark" name="remark" type="text" placeholder="Enter Remark"/>
								
								</div>
								

                                    </div>
                                                </div></div>

<!---->											
                                            <div class="form-group mt-4 mb-0">
											<button type="submit" name="update" onClick="return valid();" id="update" class="btn btn-primary">Update</button>
											
                                                </div>
											<?php } ?>
                                        </form>
										
                                    </div>
                                </div>
                            </div>
                        </div>
                       
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
<?php } ?> 