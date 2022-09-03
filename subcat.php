<?php

session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
	
	$catid=$_POST["catid"];
	$result = mysqli_query($conn,"SELECT * FROM subcat where catid=$catid");
?>
<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["sid"];?>"><?php echo $row["subcatname"];?></option>
<?php
}
?>