<?php
session_start();
//error_reporting(0);
//include('includes/config.php');
include('includes/connectiondb.php');
date_default_timezone_set('Asia/Colombo');
//$res="";
if(isset($_POST['register']))
{
$uname=$_POST['fname'];
$umail=$_POST['emailadd'];
$password=md5($_POST['pwd1']);
$sql="INSERT INTO login (uname,email,Password,status,type) VALUES('$uname','$umail','$password',1,'N')";
$res=mysqli_query($conn,$sql);
if ($res=1){
	echo "<script type='text/javascript'>alert('Account successfully created, Please login now...');</script>";
	echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
/*$sql ="SELECT userName,Password,roleId,id FROM login WHERE userName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);  */
/*
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->roleId;
    $_SESSION['eid']=$result->userName;
    $_SESSION['roleId']=$result->roleId;
   
  }
if($status==0)
{
$msg="Your account is Inactive. Please contact admin";
    
}
else if($status>0){
$_SESSION['emplogin']=$_POST['username'];
    $_SESSION['alogin']=$_POST['username'];
    $log=mysqli_query($conn,"INSERT INTO log_file(loginID) VALUES('$uname')");
    if($log){
        $last_id =mysqli_query($conn,"SELECT MAX(id) AS ID FROM log_file WHERE loginID='$uname'");
        $fech_logout=mysqli_fetch_array($last_id);
        $_SESSION['logID']=$fech_logout['ID'];
    }
     
echo "<script type='text/javascript'> document.location = 'inv_index.php'; </script>";
//echo $uname;
//echo $password;
}

else{
 
  echo "<script>alert('Invalid Details');</script>";

}
}*/
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
        <title>User Registration</title>
        <link href="css/styles.css" rel="stylesheet" />
        <div style="background-size: cover ;background-image: url('assets/img/indexBG.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    
	
	<script type="text/javascript" language="javascript">
function validateForm()
{
	 
	var name1 = document.getElementById("fname").value;
	var emailad = document.getElementById("emailadd").value;
	var pw1 = document.getElementById("pwd1").value;  
    var pw2 = document.getElementById("pwd2").value; 
	
	  
 if(name1 == "") {  
      document.getElementById("blankMsg").innerHTML = "**Please enter your name";  
      return false;  
    }else{
		document.getElementById("blankMsg").innerHTML = "";  
	}		
 if(emailad == "") {  
      document.getElementById("blankemail").innerHTML = "**Please enter valid email address";  
      return false;  
    } else{
		document.getElementById("blankemail").innerHTML = "";
	}
if(pw1 == "") {  
      document.getElementById("message1").innerHTML = "**Please enter password";  
      return false;  
    } else{
		document.getElementById("message1").innerHTML = "";
	}
if(pw1.length < 8) {  
      document.getElementById("message1").innerHTML = "**Password length must be at least 8 Character";  
      return false;  
    }	else{
		document.getElementById("message1").innerHTML = "";  
	}

if(pw1!=pw2)
	{
	 document.getElementById("message2").innerHTML = "**Passwords are not same";  
      return false;  
	}else{
	document.getElementById("message2").innerHTML = "";	
	}

}
</script>


	
	
	
	
	
	
	</head>
    <body  style="background-image:url(assets/img/workbackground.jpg);">
	<?php //include('includes/header1.php');?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-success text-white" style="background-color:"><h3 class="text-center font-weight-light my-4"><b>WELIHENA WEBPORTAL</b><br>User registration</h3></div>
                                    <div class="card-body bg-warning1" style="background-color:">
                                        <form method="post" name="register" onsubmit ="return validateForm()"  action="">
                                            <div class="form-group"><label class="small mb-2" for="myname">Your name</label>
                                                <input class="form-control py-4" id="fname" name="fname" type="text" value="" placeholder="Your name" />
												<span id = "blankMsg" style="color:red"> </span>
											</div>
											<div class="form-group"><label class="small mb-2" for="emailadd">E-mail</label>
                                                <input class="form-control py-4" type="email" id="emailadd" name="emailadd"  placeholder="Your email" />
                                                <span id = "blankemail" style="color:red"> </span>
											</div>
                                            <div class="form-group"><label class="small mb-2" for="pwd1">Password</label>
                                                <input class="form-control py-4" id="pwd1" name="pwd1" type="password" placeholder="Password" />
                                            <span id = "message1" style="color:red"> </span>
											</div>
											<div class="form-group"><label class="small mb-2" for="pwd2">Re-type Password</label>
                                                <input class="form-control py-4" id="pwd2" name="pwd2" type="password" placeholder="Re-type password" />
												<span id = "message2" style="color:red"> </span>
											</div>
                                            <!--<div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>-->
                                            <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0"><a class="small" href="forgot-password.php"></a>
                                             <!--<a href="login.php" class="btn btn-success">Login</a>  
											 <input type="reset"  class="btn btn-outline-success">--> 
                                            <input type="submit" name="register" value="Register" class="btn  btn-outline-success">
                                            </div>
                                        </form>
                                    </div>
<!--
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="forgot-password.php">Need an account? Sign up!</a></div>
                                    </div>
-->
                                </div>
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
