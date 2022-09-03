    <?php
	//session_start();
$eid=$_SESSION['alogin'];
$sql = "SELECT * from tblemployees where NIC=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;$Roleid=0;
if($query->rowCount() > 0)
{
foreach($results as $result)
    
{           
     
                            $Emp_Name=$result->FirstName;     
                            $Emp_Id=$result->EmpId;     
                            $Roleid=$result->roleId;     
                            $img=$result->ImgFile;     
                }} ?>
?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">WMS | Matale DS</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
<!--
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
-->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <!--<img src="../assets/profile_images/<?php //echo $img;  ?>"  width="30px" height="30px" style=" border-radius: 50%;"/>-->  Welcome <?php echo $eid;  ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       <!-- <a class="dropdown-item" href="../myprofile.php">My Profile</a>
                        <a class="dropdown-item" href="emp-changepassword.php">Change Password</a>
                        <div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>


