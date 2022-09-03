<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
date_default_timezone_set('Asia/Colombo');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT * FROM login WHERE email=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);  

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->type;
    $_SESSION['eid']=$result->uname;
    $_SESSION['utype']=$result->type;
   
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
        <title>Login - WMS</title>
        <link href="css/styles.css" rel="stylesheet" />
        <div style="background-size: cover ;background-image: url('assets/img/indexBG.jpg') ; background-repeat: no-repeat;background-attachment: fixed">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body  style="background-image:url(assets/img/workbackground.jpg);">
	<?php include('includes/header1.php');?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-primary text-white" style="background-color:"><h3 class="text-center font-weight-light my-4"><b>WELIHENA WEBPORTAL</b><br>LOGIN</h3></div>
                                    <div class="card-body bg-warning1" style="background-color:">
                                        <form method="post" action="">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">User ID</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="username" type="Username" placeholder="Enter your email" />
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="forgot-password.php">Forgot Password?</a>
                                             <a href="register.php">New User</a>   
                                            <input type="submit" name="signin" value="Sign in" class="btn btn-primary">
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
