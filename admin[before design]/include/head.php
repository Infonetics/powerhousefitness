<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<?php include("include/config.php");?>
<?php include("include/checklogin.php");
check_login();
?>