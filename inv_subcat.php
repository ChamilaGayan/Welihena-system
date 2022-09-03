<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
date_default_timezone_set("Asia/Colombo");
$error="";
$msg="";
$cat_id="";
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

$scat=$_REQUEST['scatid'];

 $sql_cat="SELECT cat_name FROM inv_catagory WHERE cat_id='$scat'";
$ressub=mysqli_query($conn,$sql_cat);

$row_cat = mysqli_fetch_assoc($ressub);
//print_r($row_cat);



if(isset($_GET['del']))
{
$cat_id=$_GET['del'];
$sql = "delete from  inv_catagory  WHERE cat_id=:cat_id";
$query = $dbh->prepare($sql);
$query -> bindParam(':cat_id',$cat_id, PDO::PARAM_STR);
$query -> execute();
$msg="Category record deleted";

}

if(isset($_POST['add']))
{
$cat_name=$_POST['cat_name'];
//$cat_description=$_POST['cat_description']; 
$cat_id=$_POST['scatid'];
  

$sql="INSERT INTO subcat(subcatname,catid) VALUES(:cat_name,:cat_id)";
$query = $dbh->prepare($sql);

$query->bindParam(':cat_name',$cat_name,PDO::PARAM_STR);
//$query->bindParam(':cat_description',$cat_description,PDO::PARAM_STR);
$query->bindParam(':cat_id',$cat_id,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Category added Successfully";
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
                        <h4 class="mt-4"> <?php echo $row_cat['cat_name']?> අංශය</h4>
						
	<!---->					
		                     <div class="row">
			 <div class="card-body">
                 
				  
				 
				  <!--  <button type="button" class="btn btn-primary btn-sm" style="width:100px; height:30px;"><a href="inv_index.php" style=" color:#FFFFFF;">Categories </a></button>
				 <!-- <button type="button" class="btn btn-danger btn-sm" style="width:100px; height:30px;"><a href="inv_managereceiveitems.php" style=" color:#FFFFFF;">Items</a></button>
				  <!--<button type="button" class="btn btn-success btn-sm" style="width:100px; height:30px;"><a href="inv_managesuppliers.php" style=" color:#FFFFFF;">Supplier </a></button>
				   
				  
				   <button type="button" style=" background-color: #9999FF; border: none; width:100px; height:30px;" class="btn btn-primary btn-sm"><a href="inv_issueitems.php" style=" color:#FFFFFF;">Issue Items </a></button>
				   <button type="button" style=" background-color: #AC5959; border: none; height:30px;" class="btn btn-primary btn-sm"><a href="inv_instock_items.php" style=" color:#FFFFFF;">In Stock Items </a></button>
				   
				    <button type="button" style=" background-color: #CC33CC; border: none;  height:30px;" class="btn btn-primary btn-sm"><a href="employee_issued_details.php" style=" color:#FFFFFF;">Employee Inventory Details </a></button>
					<button type="button" style=" background-color: #E67815; border: none;  height:30px;" class="btn btn-primary btn-sm"><a href="inv_removed_item_list.php" style=" color:#FFFFFF;">Removed Inventory Items </a></button>-->
				
				
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
							<button type="button" id="modalbtn" class="btn-sm btn btn-success" style="float: right; " data-toggle="modal">+ Add Sub Categories</button>
							<!-- Modal HTML -->
   <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Sub Categories</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
				
                <div class="modal-body">
										<div class="col">
                                         <form id="example-form" method="post" name="additems">
                                            <div class="form-row col-md-12">
                                              
											  <div class="col-md-12">
                                                  <div class="form-group"><label class="small mb-1" for="cat_name">Sub Category Name</label>
												  <input class="form-control py-4" id="cat_name" name="cat_name" type="text" placeholder="Enter Category Name" required />
												  <input type="hidden" value="<?php echo $scat; ?>" name="scatid" id="scatid">
													</div>
                                                </div>
												
												
												<!--<div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="cat_description">Category Description</label>
													<input class="form-control py-4" id="cat_description" name="cat_description" type="text" placeholder="Enter Category Description" required />
													</div>
                                                </div>-->
												</div>
												<div class="form-group modal-footer ">
										<button style="float: right;"  type="submit" name="add" onClick="return valid();" id="add" class="btn btn-sm btn-primary">ADD</button>
											</div>
												 </form>
											
                                            </div></div></div></div></div>
<!----->

</div>
							</div>
                            <div class="card-body">
                                <div class="table-responsive">

								   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>

										<tr class="table-active">
                                            <th>Sr no</th>
                                            <th>Sub Category Name</th>
                                           <!-- <th>Category Description</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<tbody>
<?php 
$scat=$_REQUEST['scatid'];

$sql_sub="SELECT * FROM subcat WHERE catid='$scat'";
$ressub=mysqli_query($conn,$sql_sub);


/*$sql = "SELECT cat_id,cat_name,cat_description from inv_catagory";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{*/
$cnt=1;
foreach($ressub as $result)
{               ?>  
 <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result['subcatname']);?></td>
                                            <!--<td><?php //echo htmlentities($result->cat_description);?></td>-->
                                            <td><!--<a href="inv_editcategory.php?cat_id=<?php echo htmlentities($result->sid);?>"><i class="material-icons">mode_edit</i></a>-->
											
											</td>
                                        </tr>
                                         <?php $cnt++;} //}?>
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
<?php } ?> 