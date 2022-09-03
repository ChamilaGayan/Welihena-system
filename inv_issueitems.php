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

if(isset($_POST['add']))
{
$item_id=$_POST['item_id'];
$EmpId=$_POST['EmpId'];
$dept_id=$_POST['dept_id'];   
$date=date("Y/m/d"); 
 

$sql="INSERT INTO inv_issue_item(item_id,EmpId,dept_id) VALUES(:item_id,:EmpId,:dept_id)";
$query = $dbh->prepare($sql);

$query->bindParam(':item_id',$item_id,PDO::PARAM_STR);
$query->bindParam(':EmpId',$EmpId,PDO::PARAM_STR);
$query->bindParam(':dept_id',$dept_id,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

$sql2 = "SELECT * from inv_issue_item where item_id=:item_id";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':item_id',$item_id,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($results2 as $result2)
{
$item_id = $result2->item_id;
   
}      
   
  $sql_d=mysqli_query($conn,"UPDATE inv_item SET remark_status='1' where item_id='$item_id'");   






if($lastInsertId)
{


$msg="Item Issued Successfully";
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
		        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		
<!--		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!--		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
		
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
					
                        <h4 class="mt-4">Issue Items</h4>
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
                         <div>
<!---------->
							<button type="button" id="modalbtn" class="btn-sm btn btn-success" style="float: right; " data-toggle="modal">+ Add Issue Items</button>
							<!-- Modal HTML -->
   <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Issue Items</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
				
                <div class="modal-body">
										<div class="col">
                                         <form id="example-form" method="post" name="additems">
                                            <div class="form-row col-md-12">
                                              
                                                <div class="input-field col-md-12">
												   <div class="form-group"><label class="small mb-1" for="item_id">Item Name</label><br>
												<select  name="item_id" autocomplete="off"  class="form-control" required>
													<option value="">Item Name</option>
													<?php $sql = "SELECT item_id, item_name,serial_No,remark_status from inv_item";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results=$query->fetchAll(PDO::FETCH_OBJ);
													$cnt=1;
													if($query->rowCount() > 0)
													{
													foreach($results as $result)
													{  
													 $remark_status=$result->remark_status;
													if ( $remark_status==0 ){

													
													
													 ?>   
                                         
													<option value="<?php echo htmlentities($result->item_id);?>"><?php echo htmlentities($result->item_name);?>&nbsp;(<?php echo htmlentities($result->serial_No);?>)</option>
													<?php  }} }?>
													</select>
												</div></div>
												
												
                                                <div class="input-field col-md-12">
												   <div class="form-group"><label class="small mb-1" for="EmpId">Employee Name</label><br>
												<select  name="EmpId" autocomplete="off"  class="form-control" required>
													<option value="">Employee Name</option>
													<?php $sql = "SELECT EmpId, FirstName from tblemployees";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results=$query->fetchAll(PDO::FETCH_OBJ);
													$cnt=1;
													if($query->rowCount() > 0)
													{
													foreach($results as $result)
													{   ?>                                            
													<option value="<?php echo htmlentities($result->EmpId);?>"><?php echo htmlentities($result->FirstName);?></option>
													<?php  }} ?>
													</select>
												</div></div>
												
												
												<div class="input-field col-md-12">
												   <div class="form-group"><label class="small mb-1" for="dept_id">Department Name</label><br>
												<select  name="dept_id" autocomplete="off"  class="form-control" required>
													<option value="">Department Name</option>
													<?php $sql = "SELECT id, DepartmentName from tbldepartments";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results=$query->fetchAll(PDO::FETCH_OBJ);
													$cnt=1;
													if($query->rowCount() > 0)
													{
													foreach($results as $result)
													{   ?>                                            
													<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->DepartmentName);?></option>
													<?php  }} ?>
													</select>
												</div></div>
												
												
                                            	</div>
                                             
                                             <div class="form-group modal-footer">
											
										<button   type="submit" name="add" onClick="return valid();" id="add" class="btn btn-sm btn-primary">ADD</button>
											</div>
											</form>
											<!--<div class="form-group modal-footer">
											
										<button   type="submit" name="add" onClick="return valid();" id="add" class="btn btn-sm btn-primary">ADD</button>
											</div>-->
                    
                    </div>
											</div></div> </div></div>
<!----->
</div>
							</div>
                            <div class="card-body">
                                <div class="table-responsive">

								   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>

										<tr class="table-active">
                                            <th>Sr no</th>
                                            <th>Item Name</th>
                                            <th>Employee Name</th>
                                            <th>Department Name</th>
											<th>Issued Date</th>
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>
									<tbody>
<?php 
$sql = "SELECT * from inv_issue_item";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
 
$itemID=$result->item_id ;        
$sql2 = "SELECT * from inv_item where item_id=:itemID";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':itemID',$itemID,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($results2 as $result2)
{
$item = $result2->item_name;
$serial_No = $result2->serial_No;
}

$DID=$result->dept_id;        
$sql3 = "SELECT * from tbldepartments where id=:DID";
$query3 = $dbh -> prepare($sql3);
$query3->bindParam(':DID',$DID,PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
foreach($results3 as $result3)
{
$department = $result3->DepartmentName;
}

$EId=$result->EmpId;        
$sql4 = "SELECT * from tblemployees where EmpId=:EId";
$query4 = $dbh -> prepare($sql4);
$query4->bindParam(':EId',$EId,PDO::PARAM_STR);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
foreach($results4 as $result4)
{
$emp = $result4->FirstName;

}

$remark_status=$result2->remark_status;       
if ( $remark_status==1 ){

     ?>  
 <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
											<td><a href="inv_view_item_details.php?item_id=<?php echo htmlentities($result->item_id);?>"><?php echo $item;?>&nbsp;(<?php echo $serial_No;?>)</a></td>
											<td><?php echo $emp;?></td>
											<td><?php echo $department;?></td>
											
                                            <!--<td><a href="#.php?item_id=<?php //echo htmlentities($result->item_id);?>"><?php //echo htmlentities($result->item_name);?></a></td>-->
                                            <td><?php echo htmlentities($result->issue_date);?></td>
                                            <!--<td><a href="inv_editsuppliers.php?sup_id=<?php //echo htmlentities($result->sup_id);?>"><i class="material-icons">mode_edit</i></a></td>-->
                                        </tr>
                                         <?php $cnt++;}} }?>
                                    </tbody>
                                </table>

                                    </div>
                                </div>
                            </div>
                                </div></div></div></div>
                </main>
				
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