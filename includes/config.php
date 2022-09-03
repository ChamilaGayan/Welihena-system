<?php 
// DB credentials.
/*define('DB_HOST','localhost');
define('DB_USER','pmsds_matale');
define('DB_PASS','m@tale#pmsD$');
define('DB_NAME','pmsds');*/


define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','welihena');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>