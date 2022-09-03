<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
date_default_timezone_set("Asia/Colombo");
$error="";
$msg="";
$DID=0;
$cat_name="";

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
                        <h4 class="mt-4">Item Details 
						<a class="btn btn-danger btn-sm active" role="button" aria-pressed="true" style="float:right;" onClick="history.back()" >Back</a></h4>
						<!--<a href="inv_issueitems.php" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" style="float:right;" >Back</a></h4>-->
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


      
$sql2 = "SELECT * from inv_issue_item where item_id=:item_id";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':item_id',$item_id,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($results2 as $result2)
{
$DID = $result2->dept_id;
}

      
      
$sql3 = "SELECT * from tbldepartments where id=:DID";
$query3 = $dbh -> prepare($sql3);
$query3->bindParam(':DID',$DID,PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
foreach($results3 as $result3)
{
$department = $result3->DepartmentName;
}


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
													 <td width="50%;"><label class=" mb-1" for="dept_id"><b>Department </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo $department;?></td>
												 </tr>
												 <tr>
													 <td><label class=" mb-1" for="cat_id"><b>Category </b></label></td>
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

<!---->											
<!----view history----->
								<hr style=" display: block; height: 1px; border: 0; border-top: 1px solid #000; margin: 1em 0; padding: 10px;" />
   <?php 
$item_id=intval($_GET['item_id']);  

$sql3 = "SELECT * from inv_repair WHERE item_id=:item_id";
$query3 = $dbh -> prepare($sql3);
$query3-> bindParam(':item_id',$item_id, PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
foreach($results3 as $result3)
{             
  
$fault=$result3->fault; 
$rep_status=$result3->rep_status; 
$rep_id=$result3->rep_id; 
$status_type=$result3->status_type;
$solution=$result3->solution;
$cost=$result3->cost;
$com_date=$result3->com_date;
}

$sql4 = "SELECT * from inv_item where item_id=:item_id";
$query4 = $dbh -> prepare($sql4);
$query4->bindParam(':item_id',$item_id,PDO::PARAM_STR);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
foreach($results4 as $result4)
{
$item = $result4->item_name;
}

$sql8 = "SELECT * from inv_issue_item WHERE item_id=:item_id";
$query8 = $dbh -> prepare($sql8);
$query8-> bindParam(':item_id',$item_id, PDO::PARAM_STR);
$query8->execute();
$results8=$query8->fetchAll(PDO::FETCH_OBJ);
foreach($results8 as $result8)
{             
  
$EmpId=$result8->EmpId;   

}

 $sql6 = "SELECT * from inv_rep_item where item_id=:item_id";
$query6 = $dbh -> prepare($sql6);
$query6->bindParam(':item_id',$item_id,PDO::PARAM_STR);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
foreach($results6 as $result6)
{
$rep_serial_No= $result6->rep_serial_No;
$rep_Item_Name= $result6->rep_Item_Name;
$cost_r = $result6->item_cost;

}
//$total_cost=total_cost+($cost+$cost_r);
			
                                 
													
                                  if ($rep_status>=1){
                                   ?>
								<div class="col-md-12">
									<b>Repaired History : </b>	
									 <table class="table table-bordered" id="" width="75%" cellspacing="0">
                                      <thead>

										<tr class="table-active">
                                            <th>Sr no</th>
                                            <th>Date</th>
                                            <th>Fault</th>
											<th>Repaired Item Name</th>
											<!--<th>Repaired Item cost</th>-->
											<th>Cost</th>
											
                                        </tr>
                                    </thead>
									<tbody>
									
<?php 
//$item_id=intval($_GET['item_id']);
$total_cost=0;
$sql_h = "SELECT * from inv_rep_history WHERE item_id=:item_id";
$query_h = $dbh -> prepare($sql_h);
$query_h-> bindParam(':item_id',$item_id, PDO::PARAM_STR);
$query_h->execute();
$results_h=$query_h->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query_h->rowCount() > 0)
{
foreach($results_h as $result_h)
{             
$date= $result_h->date;
$rep_Item_Name= $result_h->rep_Item_Name;
$cost= $result_h->cost;
$total_cost=$total_cost+$cost;
$rep_history_id	= $result_h->rep_history_id;						
	?>								
									
									
									
									
									<tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo $date;?></td>
											
											<td><?php echo htmlentities($result_h->fault);?></td>
											
											<td><?php echo htmlentities($result_h->rep_Item_Name);?></td>
											
											
                                            
											<td align="right"><?php echo number_format( $cost, 2 );?></td>
											
											
											
                                        </tr>
                                         
										 <?php 
										 $cnt++;
										 } ?>
										 <tr>
										 <td colspan="4"><b>Total Cost</b></td>
										 <td align="right"><b><?php echo number_format( $total_cost, 2 );?></b></td>
										 </tr>
                                    </tbody>
                                </table>
									
									
								</div>
								<?php }} ?>



<!----end view history---->





</div>
                                </div>

                                       <!--<div class="form-group mt-4 mb-0">
											<button type="submit" name="update" onClick="return valid();" id="update" class="btn btn-primary">Update</button>
											
											</div>-->
											
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
<?php //} ?> 