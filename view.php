<?php
session_start();

include('includes/config.php');
include('includes/connectiondb.php');
date_default_timezone_set('Asia/Colombo');





 

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <div style="background-size: cover ;background-image: url('assets/img/2.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
    
</head>
    <body>

	<?php include('includes/header1.php');?>



<?php

$cat = $_GET['catid'];

$sql_cat="SELECT dname,phone,file_name,mobile,email,addr,maplink,cat,subcat from adtbl";

$cat_result = mysqli_query($conn,$sql_cat);
?>

    

  


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
   <!-- <img class="card-img-top" src="images/1.jpg" alt="Card image cap">-->
    <div class="card-body">
      <h5 class="card-title"> <?php echo $row['dname'];?></h5>
		
      <p class="card-text"> <?php $imageURL='photo/'.$row["file_name"];?>
      <br>
      
     
      <img id="scream" width="300" height="300"
src="<?php echo $imageURL; ?>" alt="The Scream"><br>
<?php echo '<span style=width=25%>' .$row['maplink']. '</span>';  ?> 
      <br><b>Contact Details</b> <br>
    Phone:  <?php echo $row['phone'];?>
      <br>
    Mobile:  <?php echo $row['mobile'];?>
      <br>
    Email:  <?php echo $row['email'];?>
    
    </p>
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
