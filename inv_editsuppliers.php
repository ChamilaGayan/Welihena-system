<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$sup_id=intval($_GET['sup_id']); 
$sup_Name=$_POST['sup_Name'];
$sup_Address=$_POST['sup_Address'];   
$landphone=$_POST['landphone']; 
$mobile=$_POST['mobile']; 
$email=$_POST['email']; 

$sql="update inv_supplier set sup_Name=:sup_Name,sup_Address=:sup_Address,landphone=:landphone,mobile=:mobile,email=:email where sup_id=:sup_id";
$query = $dbh->prepare($sql);
$query->bindParam(':sup_Name',$sup_Name,PDO::PARAM_STR);
$query->bindParam(':sup_Address',$sup_Address,PDO::PARAM_STR);
$query->bindParam(':landphone',$landphone,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':sup_id',$sup_id,PDO::PARAM_STR);
$query->execute();
$msg="Supplier record updated Successfully";
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
                        <h4 class="mt-4">Update Supplier<a href="inv_managesuppliers.php" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" style="float:right;" >Back</a></h4>
                        <div class="row">

                            <div class=" col-lg-12">

                                    <div class="card-body">
										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$sup_id=intval($_GET['sup_id']);
$sql = "SELECT * from inv_supplier WHERE sup_id=:sup_id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':sup_id',$sup_id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 

                                         <form id="example-form" method="post" name="additems">
                                            <div class="form-row">
											
                                                <div class="col-md-6">
                                                    <div class="form-group">
													<label class="small mb-1" for="sup_Name">Supplier Name</label>
													<input class="form-control py-4" id="sup_Name" readonly name="sup_Name" type="text" required value="<?php echo htmlentities($result->sup_Name);?>"/>
													</div>
                                                </div>
												

												
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="email">Email</label>
													<input class="form-control py-4 validate" id="email" name="email" readonly type="text" value="<?php echo htmlentities($result->email);?>" required/>
													</div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="sup_Address">Supplier Address</label>
													<input class="form-control py-4 validate" id="sup_Address" name="sup_Address" type="text" value="<?php echo htmlentities($result->sup_Address);?>" required/>
													</div>
                                                </div>
												
												<div class="col-md-6">
													<div class="form-group"><label class="small mb-1" for="landphone">Land Phone Number</label>
													<input class="form-control py-4 validate" id="landphone" name="landphone" type="text" value="<?php echo htmlentities($result->landphone);?>" />
													</div>
												</div>
                                            	<div class="col-md-6">
													<div class="form-group"><label class="small mb-1" for="mobile">Mobile Number</label>
													<input class="form-control py-4 validate" id="mobile" name="mobile" type="text" value="<?php echo htmlentities($result->mobile);?>" required />
													</div>
												</div>
                                           <!--<div class="col-md-4">
													<div class="form-group"><label class="small mb-1" for="created_date">Date</label>
													<input class="form-control py-4" id="created_date" type="date" name="created_date" placeholder="Enter Date" required/>
													</div>
												</div>-->
										    
                                            </div>
											<?php }}?>
                                            <div class="form-group mt-4 mb-0">
											<button type="submit" name="update" onClick="return valid();" id="update" class="btn btn-primary btn-block">Update</button>
											
											</div>
											
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