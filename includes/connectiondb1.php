<?php
/*$servername = "localhost";
$username = "pmsds_matale";
$password = "m@tale#pmsD$";
$database="pmsds";*/

$servername = "localhost";
$username = "rajadhan_welihena";
$password = "Thushari#519";
$database="rajadhan_permit";


 
// Create connection
 $conn= mysqli_connect($servername, $username, $password, $database);
$conn -> set_charset("utf8");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>