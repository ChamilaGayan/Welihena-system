<?php
session_start();

include('includes/config.php');
include('includes/connectiondb.php');
date_default_timezone_set('Asia/Colombo');

$sql_cat="SELECT cat_id,cat_name from inv_catagory";
$cat_result = mysqli_query($conn,$sql_cat);

?>
<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <meta charset="utf-8" />
       
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Welihena Webportal</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/bg.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>


  <div style="background-size: cover ;background-image: url('assets/img/c.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
  <br>
  <a style="float: right;" class="dasho" href="login.php">Add New Contact</a>
  <center> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<img src="assets/img/a.png" alt="b" style="width:90px;"></center>
<center><h3 style="font-size:20px;color:solver;font-weight: bold;" >Work Management System <br>  දිස්ත්‍රික් ලේකම් කාර්යාලය මාතලේ </h3></center><br>


   <center> <form><input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="color:black;width:220px">
   <button type="submit" class="btn btn-outline-warning my-2 my-sm-0" style="color:black;width:200px ">Search</button> </form>  </center>
<br>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container1">
                        <div class="row">
						<div class="card-group">
						<?php  
						$i=0;
						while($row = mysqli_fetch_array($cat_result) ){
						
							if($i ==4){?>  <div class="card-group">  <?php $i=0; } ?>
							
                            
   
  <div class="card">
    

    <div class="card-body">
      <h5 class="card-title"> <?php echo $row['cat_name'];?></h5>
      <img class="card-img-top" src="assets/img/6.jpg" alt="Card image cap" width="100" height="100">
		<?php 
		$curcat=$row['cat_id'];
  
		$sql_subcat="SELECT sid,subcatname FROM subcat WHERE catid='$curcat' ";
		$subcat_result = mysqli_query($conn,$sql_subcat);
		while($rows = mysqli_fetch_array($subcat_result) ){?>
			
    	<?php  echo  "<a href='view.php?catid=".$row["cat_id"]."'>" ?>	
			<?php echo $rows['subcatname']. ", ";?></a>
	<?php	}
		
		
		?>
		
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  
  
 <?php 
 if($i ==4){?>  </div>  <?php  } 
 	++$i;
 }?>
  </div>
				
							
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
               <?php
    include('includes/footer.php');
    
    ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
