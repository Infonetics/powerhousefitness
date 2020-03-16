<?php
session_start();
include('../connect.php');
 extract($_POST);
echo "<pre>";print_r($_POST);
/*if(isset($_POST["btn_save"]))
{*/
$sql = "select * from tbl_enquiry where email ='$email' AND mobile='$contact'";
$result = $conn->query($sql);
if(mysqli_num_rows($result) > 0){

while($row = $result->fetch_assoc()) {

    $_SESSION['error']='Email Or Contact No. Already Exist';
    //header("location:../view_enquiry.php?rp=1185");
     ?>
<script type="text/javascript">
window.location="../view_enquiry.php";
</script>
<?php
    }

} else {

   $sql = "INSERT INTO  tbl_enquiry (cust_name, mobile, email,  address,    dob,age,gender, height_feet,height_inch,weight,occupation,  reference,  goal,  weight_loss,weight_gain,exercise,type,where_gym,gym_time,package_offer,remark,package_amount,enquiry_date,follow_date)
   VALUES ('$customer_name', '$contact','$email', '$address','$dob','$age','$gender','$feet','$inches','$weight','$occupation','$reference','$goal','$weight_loss','$weight_gain','$exercise','$exercise_type','$gyming','$gyming_time','$package_offer','$remark','$package_amount','$enquiry_date','$follow_date')";

 if ($conn->query($sql) === TRUE) 
 {
  
      $_SESSION['success']=' Record Successfully Added';
       // echo 'sss';exit;
     ?>
  <script type="text/javascript">
  window.location="../view_enquiry.php";
  </script>
  <?php
  }
   else 
  {
    // echo 'saaa';exit;
      $_SESSION['error']='Something Went Wrong';
  ?>
  <script type="text/javascript">
  window.location="../view_enquiry.php";
  </script>
  <?php
  }

}
//$q = $conn->query($sql);

 

//}
?>