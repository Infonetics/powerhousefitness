<?php
include("config.php"); 
$curdate=date('Y-m-d');
echo $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_customer_membership` WHERE `customer_membership_expiry_date`<=CURDATE() AND `customer_membership_status`='1'";
$query=$con->query($sql);
echo "<br>";
while($row=mysqli_fetch_array($query)){
  extract($row);
 	echo $sql="UPDATE  `".DB_PREFIX."`.`tbl_customer_membership`  SET `membership_paid_status`='4', `customer_membership_status`='0' WHERE `customer_membership_id`='$customer_membership_id' AND `customer_membership_expiry_date` <= CURDATE()";
	$query=$con->query($sql);
	echo "<br>";
	echo $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_mp_payment` SET `mp_payment_customer_membership_id`='".$customer_membership_id."',`mp_payment_paid_status`='4',`mp_payment_date`=NOW()";
   	$con->query($query);
	echo "<br>";

echo "Successfully Updated";
}


echo $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_customer_pt` WHERE `customer_pt_expiry_date`<=CURDATE() AND `customer_pt_status`='1'";
$query=$con->query($sql);
echo "<br>";
while($row=mysqli_fetch_array($query)){
  extract($row);
 	echo $sql="UPDATE  `".DB_PREFIX."`.`tbl_customer_pt`  SET `pt_paid_status`='4', `customer_pt_status`='0' WHERE `customer_pt_id`='$customer_pt_id' AND `customer_pt_expiry_date` <= CURDATE()";
	$query=$con->query($sql);
	echo "<br>";
	echo $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_pt_payment` SET `pt_payment_customer_pt_id`='".$customer_pt_id."',`pt_payment_paid_status`='4',`pt_payment_date`=NOW()";
   	$con->query($query);
	echo "<br>";

echo "Successfully Updated";
}
?>