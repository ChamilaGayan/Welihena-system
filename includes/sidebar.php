<?php
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
                }} ?>

                    
     <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="inv_index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                             <?php
                            
                            // if($Roleid!=1){
                                 ?>
                              <a class="nav-link " href="inv_index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-digital-tachograph"></i></div>
                                Category
                            </a>   
                           
                       
                           
                            <a class="nav-link " href="inv_additems.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                                Add Contact
                                  
                            </a>
                          
              
  
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $eid;?>
                    </div>
                </nav>