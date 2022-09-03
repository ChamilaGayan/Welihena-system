<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['del']))
{
$issue_item_id=$_GET['del'];
$sql = "delete from  tblstores_issue_item  WHERE issue_item_id=:issue_item_id";
$query = $dbh->prepare($sql);
$query -> bindParam(':issue_item_id',$issue_item_id, PDO::PARAM_STR);
$query -> execute();
$msg="Order item record deleted";

}

if(isset($_POST['add']))
{
$DepartmentName=$_POST['DepartmentName'];
$item_id=$_POST['item_id'];
$quantity=$_POST['quantity'];   
$ordered_date=$_POST['ordered_date'];   

$sql="INSERT INTO tblstores_issue_item (DepartmentName,item_id,quantity,ordered_date) VALUES(:DepartmentName,:item_id,:quantity,:ordered_date)";
$query = $dbh->prepare($sql);

$query->bindParam(':DepartmentName',$DepartmentName,PDO::PARAM_STR);
$query->bindParam(':item_id',$item_id,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':ordered_date',$ordered_date,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Order Item added Successfully";
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
		
<!--				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<script>
    $(document).ready(function(){
        $(".btn").click(function(){
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
                        <h4 class="mt-4">Manage Issue Items</h4>
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

</div>
							</div>
                            <div class="card-body">
                                <div class="table-responsive">

								   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr class="table-active">
                                            <th>Sr no</th>
                                            <th>Department Name</th>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Ordered Date</th>
                                            <th>Approved Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<tbody>
<?php $sql = "SELECT issue_item_id,DepartmentName,item_id,quantity,ordered_date,approved_date from tblstores_issue_item";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         

$itemID=$result->item_id ;        
$sql2 = "SELECT * from tblstores_items where item_id=:itemID";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':itemID',$itemID,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
foreach($results2 as $result2)
{
$item = $result2->item_name;
}
      ?>  
<tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->DepartmentName)?></td>
                                            <td><?php echo $item;?></td>
                                            <td ><?php echo htmlentities($result->quantity);?></td>
                                            <td><?php echo htmlentities($result->ordered_date);?></td>
                                            <td><?php echo htmlentities($result->approved_date);?></td>
                                            <td><a href="editissueitems.php?issue_item_id=<?php echo htmlentities($result->issue_item_id);?>"><i class="material-icons">mode_edit</i></a>
                                                <a  href="manageissueitems.php?del=<?php echo htmlentities($result->issue_item_id);?>" onClick="return confirm('Do you want to delete?');"> <i class="material-icons btn-danger">delete_forever</i></a></td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                </main></div></div></div>
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