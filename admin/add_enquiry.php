<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Add Enquiry
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.ico" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <?php include("include/sidebar.php");?>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add Enquiry</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Add Enquiry</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
              	<?php

            if(isset($_POST["btn_enquir"]))
            {
               
                    extract($_POST);
                    /*$image = $_FILES['image']['name'];
                    $target = "uploadImage/Profile/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("uploadImage/Profile/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }


                    $image_title=$_POST['image_title'];*/
                  

                    // $sql="INSERT INTO tbl_gallery (`image_title`,`image`,`created_on`) values ('$image_title','$image',NOW())";
        $sql = "INSERT INTO  `".DB_PREFIX."`.`tbl_enquiry` (cust_name, mobile, email,  address,dob,age,gender, height_feet,height_inch,weight,occupation,  reference,  goal,  weight_loss,weight_gain,exercise,type,where_gym,gym_time,package_offer,remark,package_amount,enquiry_date,follow_date,created_on)
   VALUES ('$customer_name', '$contact','$email', '$address','$dob','$age','$gender','$feet','$inches','$weight','$occupation','$reference','$goal','$weight_loss','$weight_gain','$exercise','$exercise_type','$gyming','$gyming_time','$package_offer','$remark','$package_amount',NOW(),'$follow_date',NOW())";
   /*echo $sql;
   exit;*/
                   
                    if ($con->query($sql) === TRUE) {
                      $_SESSION['success']='Gallery Successfully Updated';
                    ?>
                <script type="text/javascript">
                window.location="view_enquiry.php";
                </script>
                <?php
                } else {
                      $_SESSION['error']='Something Went Wrong';
                ?>
                <script type="text/javascript">
                window.location="view_enquiry.php";
                </script>
                <?php
                }
            }

            ?>
                <form class="form-horizontal w-100"  method="POST" name="userform">
                                       <!--  <div class="form-group">
                                            <div class="row">
                                              <label class="col-md-3 control-label">Enquiry Date</label>
                                                <div class="col-md-8">
                                                  <input type="text" value="<?php echo $enquiry_date;?>" name="enquiry_date" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Customer Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="customer_name" placeholder="Customer Name" onkeypress="return isAlfa(event)"  class="form-control"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Address</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="4" name="address" placeholder="Address" style="height: 120px;" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Contact</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="contact" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>
                                        

                                         <div class="form-group">
                                              <div class="row">
                                                <label class="col-md-3 control-label">Date Of Birth</label>
                                                <div class="col-md-8">
                                                  <input type="date" name="dob" class="form-control" placeholder="Birth Date" required="">
                                                </div>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Age</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="age" class="form-control" placeholder="Age" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Gender</label>
                                                <div class="col-md-8">
                                                   <select name="gender" id="gender" class="form-control" required>
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Height</label>
                                                <div class="col-md-4">
                                                    <input type="number" name="feet" class="form-control" placeholder="Feet"  required>
                                                </div>

                                                 <div class="col-md-4">
                                                    <input type="number" name="inches" class="form-control" placeholder="Inches" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Weight</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="weight" class="form-control" placeholder="Weight" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Occupation</label>
                                                <!-- <div class="col-sm-9"> -->
                                                    <div class="custom-control custom-radio mb-3 mr-4 ml-3">
                                                      <input class="custom-control-input" id="test1" name="occupation" value="Professional" type="radio" checked="checked">
                                                      <label class="custom-control-label p-3px" for="test1">Professional</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3 mr-4 ml-2">
                                                      <input class="custom-control-input" id="test2" name="occupation" value="Business" type="radio">
                                                      <label class="custom-control-label p-3px" for="test2">Business</label>
                                                    </div>
                                                     <div class="custom-control custom-radio mb-3 mr-4 ml-2">
                                                      <input class="custom-control-input" id="test3" name="occupation" value="Service" type="radio" checked="checked">
                                                      <label class="custom-control-label p-3px" for="test3">Service</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3 mr-4 ml-2">
                                                      <input class="custom-control-input" id="test4" name="occupation" value="Homemaker" type="radio">
                                                      <label class="custom-control-label p-3px" for="test4">Homemaker</label>
                                                    </div>
                                                      <div class="custom-control custom-radio mb-3 mr-4 ml-2">
                                                      <input class="custom-control-input" id="test5" name="occupation" value="Student" type="radio">
                                                      <label class="custom-control-label p-3px" for="test5">Student</label>
                                                    </div>
                                                      <div class="custom-control custom-radio mb-3 mr-4 ml-2">
                                                      <input class="custom-control-input" id="test6" name="occupation"  value="Other" type="radio">
                                                      <label class="custom-control-label p-3px" for="test6">Other</label>
                                                    </div>
                                               
                                               <!--  </div> -->
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label white-space">How did you get to know about us?</label>
                                                <div class="col-md-5">
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test7" name="reference" value="News paper" type="radio" checked="checked">
                                                      <label class="custom-control-label p-3px" for="test7">News paper</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test8" name="reference" value="Hoarding" type="radio">
                                                    <label class="custom-control-label p-3px" for="test8">Hoarding</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test9" name="reference" value="Existing Member" type="radio" checked="checked">
                                                    <label class="custom-control-label p-3px" for="test9">Existing Member</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test10" name="reference" value="Family" type="radio">
                                                    <label class="custom-control-label p-3px" for="test10">Family</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test11" name="reference" value="Friends" type="radio">
                                                    <label class="custom-control-label p-3px" for="test11">Friends</label>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test12" name="reference"  value="Doctor" type="radio">
                                                    <label class="custom-control-label p-3px" for="test12">Doctor</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test13" name="reference" value="Old Member" type="radio">
                                                    <label class="custom-control-label p-3px" for="test13">Old Member</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test14" name="reference" value="Just Dial" type="radio">
                                                    <label class="custom-control-label p-3px" for="test14">Just Dial</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test15" name="reference" value="Huntplex.com" type="radio">
                                                    <label class="custom-control-label p-3px" for="test15">Huntplex.com</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test16" name="reference" value="Others" type="radio">
                                                    <label class="custom-control-label p-3px" for="test16">Others</label>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-4">
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Goal</label>
                                                <!-- <div class="col-md-3"> -->
                                                 <!-- <p> -->
                                                   <!--  <div class="row">
                                                      <div class="col-md-4">
                                                        <input type="radio" id="test17" name="goal" checked value="">
                                                        <label for="test17">Weight Loss</label>
                                                       </div>
                                                        <div class="col-md-2">
                                                          <input type="number" name="weight_loss" class="form-control" placeholder="Feet" style="border: 0;border-bottom: 1px solid #c2cad8;">
                                                       </div> -->  <!-- </div><br> -->

                                                    <!--  <div class="row"> -->
                                               <!--      <div class="col-md-4">
                                                      <input type="radio" id="test17" name="goal"  value="">
                                                      <label for="test17">Weight Gain</label>
                                                       </div>
                                                        <div class="col-md-2">
                                                          <input type="number" name="weight_gain" class="form-control" placeholder="Feet" style="border: 0;border-bottom: 1px solid #c2cad8;">
                                                       </div> 
                                                    </div><br> -->
                                               
                                                  
                                                  <!--   <input type="radio" id="test18" name="goal" value="Flexibility">
                                                    <label for="test18">Flexibility</label>
                                                  
                                                    <input type="radio" id="test19" name="goal" value="Injury Rehabilitation">
                                                    <label for="test19">Injury Rehabilitation</label>

                                                     <input type="radio" id="test20" name="goal"  value="Yoga">
                                                    <label for="test20">Yoga</label>
                                                  
                                                    <input type="radio" id="test21" name="goal" value="Toning">
                                                    <label for="test21">Toning</label>
                                                  
                                                    <input type="radio" id="test22" name="goal" value="Stress Management">
                                                    <label for="test22">Stress Management</label>

                                                    <input type="radio" id="test23" name="goal" value="Cardio Vascular Endurance">
                                                    <label for="test23">Cardio Vascular Endurance</label>

                                                    <input type="radio" id="test24" name="goal" value="Strength Endurance">
                                                    <label for="test24">Strength Endurance</label>
                                                  </p> -->

                                                    <div class="col-md-2 custom-control custom-radio mb-3 ml-3">
                                                      <input class="custom-control-input" id="test17" name="goal"  value="Weight Loss" type="radio" checked="checked">
                                                      <label class="custom-control-label p-3px" for="test17">Weight Loss</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                          <input type="number" name="weight_loss" class="form-control" placeholder="Kg" style="border: 0;border-bottom: 1px solid #c2cad8;">
                                                    </div> 

                                                    <div class="col-md-2 custom-control custom-radio mb-3 ml-3">
                                                      <input class="custom-control-input" id="test18" name="goal"  value="Weight Gain" type="radio">
                                                      <label class="custom-control-label p-3px" for="test18">Weight Gain</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                          <input type="number" name="weight_loss" class="form-control" placeholder="Kg" style="border: 0;border-bottom: 1px solid #c2cad8;">
                                                    </div> 
                                                  <!-- </div> -->
                                                </div>
                                               <br>
                                                    <div class="row">
                                                      <div class="col-md-4"></div>
                                                      <div class="col-md-4">

                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test19" name="goal" value="Flexibility" type="radio">
                                                          <label class="custom-control-label p-3px" for="test19">Flexibility</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test37" name="goal" value="Injury Rehabilitation" type="radio">
                                                          <label class="custom-control-label p-3px" for="test37">Injury Rehabilitation</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test20" name="goal" value="Yoga" type="radio">
                                                          <label class="custom-control-label p-3px" for="test20">Yoga</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test21" name="goal" value="Toning" type="radio">
                                                          <label class="custom-control-label p-3px" for="test21">Toning</label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test22" name="goal" value="Stress Management" type="radio">
                                                          <label class="custom-control-label p-3px" for="test22">Stress Management</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test23" name="goal" value="Cardio Vascular Endurance" type="radio">
                                                          <label class="custom-control-label p-3px" for="test23">Cardio Vascular Endurance</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test24" name="goal" value="Strength Endurance" type="radio">
                                                          <label class="custom-control-label p-3px" for="test24">Strength Endurance</label>
                                                        </div>
                                                      </div>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        <!-- </div> -->
                                          <hr>
                                           <div class="form-group">
                                            <div class="row">
                                               <label class="col-md-3 control-label white-space">Do you exercise regularly?</label>
                                                <!--  <div class="col-sm-9">
                                                 <p>
                                                <input type="radio" id="test25" name="exercise" checked value="Yes">
                                                <label for="test25">Yes</label>
                                                
                                                  <input type="radio" id="test26" name="exercise" value="No">
                                                  <label for="test26">No</label>
                                                  </p>
                                                </div> -->
                                                <div class="custom-control custom-radio mb-3 mr-4 ml-3">
                                                          <input class="custom-control-input" id="test25" name="exercise" value="Yes" type="radio" checked="checked">
                                                          <label class="custom-control-label p-3px" for="test25">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3 mr-4">
                                                          <input class="custom-control-input" id="test26" name="exercise" value="No" type="radio">
                                                          <label class="custom-control-label p-3px" for="test26">No</label>
                                                        </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">If yes what type?</label>
                                                <!-- <div class="col-sm-9"> -->
                                              <!--    <p>
                                                <input type="radio" id="test27" name="exercise_type" checked value="Gym">
                                                <label for="test27">Gym</label>
                                                
                                                  <input type="radio" id="test28" name="exercise_type" value="Yoga">
                                                  <label for="test28">Yoga</label>

                                                   <input type="radio" id="test29" name="exercise_type" value="Walking">
                                                  <label for="test29">Walking</label>

                                                   <input type="radio" id="test30" name="exercise_type" value="Jogging">
                                                  <label for="test30">Jogging</label>

                                                   <input type="radio" id="test31" name="exercise_type" value="Spinning">
                                                  <label for="test31">Spinning</label>
                                                  </p> -->
                                                    <div class="custom-control custom-radio mb-3 ml-3">
                                                          <input class="custom-control-input" id="test27" name="exercise_type" value="Gym" type="radio" checked="checked">
                                                          <label class="custom-control-label p-3px" for="test27">Gym</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3 ml-3">
                                                          <input class="custom-control-input" id="test28" name="exercise_type" value="Yoga" type="radio">
                                                          <label class="custom-control-label p-3px" for="test28">Yoga</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3 ml-3">
                                                          <input class="custom-control-input" id="test29" name="exercise_type" value="Walking" type="radio">
                                                          <label class="custom-control-label p-3px" for="test29">Walking</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3 ml-3">
                                                          <input class="custom-control-input" id="test30" name="exercise_type" value="Jogging" type="radio">
                                                          <label class="custom-control-label p-3px" for="test30">Jogging</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3 ml-3">
                                                          <input class="custom-control-input" id="test38" name="exercise_type" value="Spinning" type="radio">
                                                          <label class="custom-control-label p-3px" for="test38">Spinning</label>
                                                        </div>

                                            <!--     </div> -->
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">If gyming where?</label>
                                                <div class="col-sm-9">
                                                     <div class="row">
                                                 <p>
                                                     <div class="col-sm-6">
                                                   <input type="text" name="gyming" class="form-control" onkeypress="return isAlfa(event)" placeholder="If gyming where?" required >
                                                   </div>

                                                  <div class="col-sm-6">
                                                  <input type="text" name="gyming_time" class="form-control"  placeholder="How much time ?" required>
                                                  </div>

                                                  </p>
                                                </div> </div>
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Package offered</label>
                                                <div class="col-md-3">
                                                <!--  <p>
                                                <input type="radio" id="test32" name="package_offer" checked value="Monthly">
                                                <label for="test32">Monthly</label>
                                                
                                                  <input type="radio" id="test33" name="package_offer" value="Quarterly">
                                                  <label for="test33">Quarterly</label>

                                                   <input type="radio" id="test34" name="package_offer" value="Half Yearly">
                                                  <label for="test34">Half Yearly</label>

                                                   <input type="radio" id="test35" name="package_offer" value="Yearly">
                                                  <label for="test35">Yearly</label>

                                                   <input type="radio" id="test36" name="package_offer" value="Personal Training">
                                                  <label for="test36">Personal Training</label>

                                                   <input type="radio" id="test37" name="package_offer" value="Any Other">
                                                  <label for="test37">Any Other</label>
                                                  </p> -->
                                                    <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test31" name="package_offer" value="Monthly" type="radio" checked="">
                                                          <label class="custom-control-label p-3px" for="test31">Monthly</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test32" name="package_offer" value="Quarterly" type="radio">
                                                          <label class="custom-control-label p-3px" for="test32">Quarterly</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test33" name="package_offer" value="Half Yearly" type="radio">
                                                          <label class="custom-control-label p-3px" for="test33">Half Yearly</label>
                                                        </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test34" name="package_offer" value="Yearly" type="radio">
                                                          <label class="custom-control-label p-3px" for="test34">Yearly</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test35" name="package_offer" value="Personal Training" type="radio">
                                                          <label class="custom-control-label p-3px" for="test35">Personal Training</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test36" name="package_offer" value="Any Other" type="radio">
                                                          <label class="custom-control-label p-3px" for="test36">Any Other</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>


                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Remark</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="text" name="remark" class="form-control"  placeholder="Remark" required >
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Package Amount</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="number" name="package_amount" class="form-control"  placeholder="Package Amount"  onkeypress="return isNumber(event)" required >
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label white-space">Name Of the Counsellor</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="text" name="counsellor_name" class="form-control" onkeypress="return isAlfa(event)"   placeholder="Counsellor name" required>
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Next Follow up on</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="date" name="follow_date" class="form-control" value=""  placeholder="Follow Date" required>
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_enquir" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>




              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <!-- Footer -->
       <?php include("include/footer.php");?>
    </div>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/clipboard/dist/clipboard.min.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="assets/js/main.js"></script>
  
</body>

</html>