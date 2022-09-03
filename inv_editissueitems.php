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
$issue_item_id=intval($_GET['issue_item_id']); 
$item_id=$_POST['item_id'];
$quantity=$_POST['quantity'];   
$approved_date=$_POST['approved_date'];   

$sql="update tblstores_issue_item set item_id=:item_id,quantity=:quantity,approved_date=:approved_date where issue_item_id=:issue_item_id";
$query = $dbh->prepare($sql);

$query->bindParam(':item_id',$item_id,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':approved_date',$approved_date,PDO::PARAM_STR);
$query->bindParam(':issue_item_id',$issue_item_id,PDO::PARAM_STR);
$query->execute();
$msg="Item details updated Successfully";
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
                        <h4 class="mt-4">Update Items <a href="manageissueitems.php" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" style="float:right;" >Back</a></h4>
                        <div class="row">

                            <div class=" col-lg-12">

                                    <div class="card-body">
										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$issue_item_id=intval($_GET['issue_item_id']);
$sql = "SELECT * from tblstores_issue_item WHERE issue_item_id=:issue_item_id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':issue_item_id',$issue_item_id, PDO::PARAM_STR);
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
                                         <form id="example-form" method="post" name="additems">
                                            <div class="form-row">
											
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="item_id">Item Name</label>
													<input class="form-control py-4" id="item_id" readonly name="item_id" type="text" value="<?php echo $item; ?>" />
													</div>
                                                </div>
												<div class="col-md-12"></div>

												<div class="input-field col-md-3">
												   <div class="form-group"><label class="small mb-1" for="quantity">Quantity</label><br>
													<input class="form-control py-4" id="quantity"  name="quantity" type="text" value="<?php echo htmlentities($result->quantity);?>" />
												</div></div>

												<div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="approved_date">Approved Date</label>
													<input class="form-control py-4" id="approved_date" name="approved_date" type="date" value="<?php echo htmlentities($result->approved_date);?>" />
													</div>
												</div>
												

                                            </div>
											<?php }}?>
                                            <div class="form-group mt-4 mb-0">
											<button type="submit" name="update" onClick="return valid();" id="update" class="btn btn-primary">Update</button>
											
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