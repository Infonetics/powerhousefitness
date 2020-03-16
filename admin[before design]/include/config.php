<?php

	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASS' ,'');
	define('DB_NAME', 'powerhousefitness');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if ($con->connect_error) {
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}
define('DB_PREFIX', 'powerhousefitness');
?>