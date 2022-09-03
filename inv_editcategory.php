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
$cat_id=intval($_GET['cat_id']); 
$cat_name=$_POST['cat_name'];
$cat_description=$_POST['cat_description']; 

$sql="update inv_catagory set cat_name=:cat_name,cat_description=:cat_description where cat_id=:cat_id";
$query = $dbh->prepare($sql);
$query->bindParam(':cat_name',$cat_name,PDO::PARAM_STR);
$query->bindParam(':cat_description',$cat_description,PDO::PARAM_STR);
$query->bindParam(':cat_id',$cat_id,PDO::PARAM_STR);
$query->execute();
$msg="Category Record Updated Successfully";
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
                        <h4 class="mt-4">Update Categories <a href="inv_managecategories.php" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" style="float:right;" >Back</a></h4>
                        <div class="row">

                            <div class=" col-lg-12">

                                    <div class="card-body">
										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$cat_id=intval($_GET['cat_id']);
$sql = "SELECT * from inv_catagory WHERE cat_id=:cat_id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':cat_id',$cat_id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 

                                         <form id="example-form" method="post" name="additems">
                                            <div class="form-row  col-md-6">
											
                                                <div class="col-md-12">
                                                    <div class="form-group">
													<label class="small mb-1" for="cat_name">Category Name</label>
													<input class="form-control py-4" id="cat_name"  name="cat_name" type="text" required value="<?php echo htmlentities($result->cat_name);?>"/>
													</div>
                                                </div>
												<div class="col-md-12"></div>
												<div class="col-md-12">
                                                    <div class="form-group">
													<label class="small mb-1" for="cat_description">Category Description</label>
													<input class="form-control py-4" id="cat_description"  name="cat_description" type="text" required value="<?php echo htmlentities($result->cat_description);?>"/>
													</div>
                                                </div>
                                            </div>
											<?php }}?>
                                            <div class="form-group mt-4 mb-0">
											<button type="submit" name="update" onClick="return valid();" id="update" class="btn btn-sm btn-primary">Update</button>
											
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