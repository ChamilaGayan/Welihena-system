<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
date_default_timezone_set("Asia/Colombo");
$error="";
$msg="";
$item_id=0;
$remark_status="";

if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
//$item_id=intval($_GET['item_id']); 
//$remark_status=$_POST['remark_status'];
$item_id=$_POST['item_id'];

	$sql="UPDATE inv_item SET remark_status='0' WHERE item_id='$item_id'";
	if($remark_status == 0){
	$res= mysqli_query($conn, $sql) or die(mysqli_error());
	}

//$sql2 = "SELECT * from inv_item where item_id=:item_id";
//$query2 = $dbh -> prepare($sql2);
//$query2->bindParam(':item_id',$item_id,PDO::PARAM_STR);
//$query2->execute();
//$results2=$query2->fetchAll(PDO::FETCH_OBJ);
//foreach($results2 as $result2)
//{
//$item_id = $result2->item_id;
//   
//}      
if (isset ($res)){ 
$sql_d=mysqli_query($conn,"DELETE FROM `inv_issue_item` WHERE item_id='$item_id'"); 
//$sql_r=mysqli_query($conn,"UPDATE inv_repair SET rep_status='0' WHERE item_id='$item_id'");  
$msg="Item Returned Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}



//if($res)
//{
//  //$sql_d="DELETE FROM `inv_issue_item` WHERE item_id='$item_id'";
//$msg="Item Returned Successfully";
//}
//else 
//{
//$error="Something went wrong. Please try again";
//}


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
                        <h4 class="mt-4">Employee Inventory Details
						<a href="employee_issued_details.php" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" style="float:right;" >Back</a></h4>
                        <div class="row">

                            <div class=" col-lg-12">

                                    <div class="card-body">
										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$EmpId=intval($_GET['EmpId']);
$sql = "SELECT * from tblemployees where EmpId=:EmpId";
$query = $dbh -> prepare($sql);
$query->bindParam(':EmpId',$EmpId,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
$employee = $result->FirstName;
$EmpId = $result->EmpId;
$Department = $result->Department;


$sql1 = "SELECT * from inv_issue_item WHERE EmpId=:EmpId";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':EmpId',$EmpId, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
foreach($results1 as $result1)
{     
$item_id = $result1->item_id;
$dept_id = $result1->dept_id;
}

$sql2 = "SELECT * from tbldepartments where DepartmentCode=:Department";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':Department',$Department,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($results2 as $result2)
{
$department = $result2->DepartmentName;
}

     ?> 


                                         <form id="example-form" method="post" name="additems">
                                            <div class="form-row">
											 <div class="col-md-12">
											 <table>
											 <tbody style="font-size: small;">
												 
												 <tr>
													 <td><label class=" mb-1" for="EmpId"><b>Employee Name </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo $employee;?></td>
												 </tr>
												 <tr>
													 <td width="50%;"><label class=" mb-1" for="dept_id"><b>Department </b></label></td>
													 <td><b>:</b>&nbsp;<?php echo $department;?></td>
												 </tr>
											 </tbody>
											 </table>
												
                                            	</div>
											
                                            </div>
											<?php }}?>
<!---->						
<div class=" card mb-4" >
							<div class="card-body">
                                <div class="table-responsive">

								   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>

										<tr class="table-active">
                                            <th>Sr no</th>
                                            <th>Item Name</th>
											<th>Serial Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<tbody>
<?php 
$EmpId=intval($_GET['EmpId']);


$sql5 = "SELECT * from inv_issue_item WHERE EmpId=:EmpId";
$query5 = $dbh -> prepare($sql5);
$query5-> bindParam(':EmpId',$EmpId, PDO::PARAM_STR);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
foreach($results5 as $result5)
{     
$item_id = $result5->item_id;


$sql3 = "SELECT * from inv_item where item_id=:item_id";
$query3 = $dbh -> prepare($sql3);
$query3->bindParam(':item_id',$item_id,PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
foreach($results3 as $result3)
{
$item_name = $result3->item_name;
$serial_No = $result3->serial_No;
}
$remark_status=$result3->remark_status;       
if ( $remark_status==1 ){

          ?>  
 <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><a href="inv_view_item_details.php?item_id=<?php echo htmlentities($result5->item_id);?>"><?php echo $item_name;?>
											<input id="item_name" type="text" name="item_id[]" value="<?php echo htmlentities($result3->item_id);?>" hidden/>
											 </a></td>
                                            <td><?php echo $serial_No;?>
											<input id="serial_No" type="text" name="serial_No[]" value="<?php echo htmlentities($result3->serial_No);?>" hidden/>
											</td>
											<td align="center">
											<button type="submit" name="update" onClick="return valid();" id="update" class="btn btn-sm" style="background-color: #249348; font-size:13px; padding:inherit; color:#FFFFFF;" >Return</button>
											<input id="item_name" type="text" name="item_id" value="<?php echo htmlentities($result3->item_id);?>" hidden/>
											</td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>

                                    </div>
                                </div>
</div>
<!---->											
                                            <!--<div class="form-group mt-4 mb-0">
											<button type="submit" name="update" onClick="return valid();" id="update" class="btn btn-sm" style="background-color: #249348; font-size:13px; padding:inherit; color:#FFFFFF;" >Return</button>
											
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
<?php } ?> 