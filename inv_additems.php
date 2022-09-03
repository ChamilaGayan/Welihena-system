<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
$statusMsg = '';

$targetDir = "photo/";

if(isset($_POST["submit"])){

    if(!empty($_FILES["file"]["name"])){

        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $dn= $_POST['dn'];
        $pNO =  $_POST["pNo"] ;
        $mNo = $_POST["mNo"];
        $emailId=$_POST["emailId"];
        $add=$_POST["add"];
        $mapId=$_POST["mapId"]; 
        $cat=$_POST["category"]; 
        $subcat=$_POST["sub_category"]; 

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
      
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

         $sql="INSERT into adtbl (file_name, dname,phone,mobile,email,addr,maplink,cat,subcat) 
            VALUES ('".$fileName."','".$dn."','". $pNO."','". $mNo."','".$emailId."','".$add."','". $mapId."','". $cat."','". $subcat."')";

        $insert = $conn->query($sql)  ;

            if($insert){
              echo '<script language="javascript">';
              echo 'alert("successfully")';
              echo '</script>';
                
                
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{ 
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
}

echo $statusMsg;


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
        <div style="background-size: cover ;background-image: url('assets/img/indexBG.jpg') ; background-repeat: no-repeat;background-attachment: fixed">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   

		<style>
        
            .card{
            border: #ffffff;
                        }
        
            .form-row {
                    padding-bottom:10px;
                     }
            .add-more , .remove-add-more { padding: 0;}
            
            .pb-4, .py-4 {
        padding-bottom : 0rem !important;
                padding-top : 0rem !important;}
            
            
                .form-control {font-size: 0.8rem;}
            
            
        </style>
	<!---->
		
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
                        <h4 class="mt-4">Add Items<a href="inv_managereceiveitems.php" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" style="float:right;" >Back</a></h4>
                        <div class="row">

                            <div class=" col-lg-12">

                                    <div class="card-body bg-light" style="background-color:LightGray;">
										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }
										
										else if($error1){?>
										<div class="succWrap btn-sm btn btn-danger"><strong>ERROR </strong>:<?php echo $error1; ?> </div><?php }?>








<div class="container">
	
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"> 
  
<?php
$result = mysqli_query($conn,"SELECT * FROM inv_catagory");
?>
		<div class="form-group">
		  <label for="sel1">Category</label>
		  <select class="form-control" id="category" name="category">
		  <option value="">Select Category</option>
		    <?php
			while($row = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $row["cat_id"];?>"><?php echo $row["cat_name"];?></option>
			<?php
			}
			?>
		  </select>
      </div>

      
		<div class="form-group">
		  <label for="sel1">Sub Category</label>
		  <select class="form-control" id="sub_category" name="sub_category">
			
		  </select>
		</div>

</div>




<script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var catid = this.value;
			$.ajax({
				url: "subcat.php",
				type: "POST",
				data: {
					catid:catid
				},
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
				}
			});
		
		
	});
});
</script>


<!--
<div class="form-group "><label class="" for="inputEmailAddress">Catagory</label>
<select id="catn" name="catn" class="form-control" required>
<option value="">- Select -</option>
<?php 
// Fetch Department
//$sql_department = "SELECT * FROM inv_catagory";
//$department_data = mysqli_query($conn,$sql_department);
//while($row = mysqli_fetch_assoc($department_data) ){

//$catname = $row['cat_name'];

// Option
//echo "<option value='".$catname."' >".$catname."</option>";
//}
?>
</select>

<div>Sub Catagory</div>
<select id="subcatn" name="subcatn" class="form-control">
   <option value="">- Select -</option>
</select>
-->



  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Display Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="dn" placeholder="Display Name">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Phone No</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="pNo" placeholder="Your land phone no">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Mobile No</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="mNo" placeholder="Mobile No">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="emailId" placeholder="Email Address">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="add" placeholder="Address">
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="file">

    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Map Link</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="mapId" placeholder="Map Link">
    </div>
  </div>
  
  
  <div class="form-group row">
    <div class="col-sm-10">
    
      <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br>

    </div>
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
		 
		
		
    </body>
</html>
