<?php
if($_SERVER['SERVER_NAME']=="www.infoneticstechnologies.com" || $_SERVER['SERVER_NAME']=="www.emperorgym.ae"){
	define('DB_SERVER','localhost');
	define('DB_USER','infonetics_mygym');
	define('DB_PASS' ,'EWa&;Wlf*.}t');
	define('DB_NAME', 'infonetics_mygym');
}
else{
	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'powerhousefitness');
}
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if ($con->connect_error) {
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}
define("DB_PREFIX", "powerhousefitness");
?>