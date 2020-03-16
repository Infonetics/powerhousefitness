<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    View Enquiry
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.ico" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/css/select.bootstrap4.min.css">
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <?php include("include/sidebar.php");?>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View Enquiry</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View Enquiry</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Name</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Email</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">Mobile Number</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">Gender</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">DOB</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">Occupation</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Mobile</th><th rowspan="1" colspan="1">Gender</th><th rowspan="1" colspan="1">DOB</th><th rowspan="1" colspan="1">Occupation</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                   <?php 
                                         
                                           $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_enquiry`";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                               <td><?php echo $row['cust_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td><?php echo $row['dob']; ?></td>
                                                <td><?php echo $row['occupation']; ?></td>
                                                <!--  <td><?php echo $row['last_follow_date']; ?></td>
                                                  <td><?php echo $row['follow_date']; ?></td> -->
                                                <td>
                                                  <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["enquiry_id"]; ?>" data-sfid='"<?php echo $row['enquiry_id'];?>"'><i class="fa fa-pen fa-xs"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['enquiry_id'];?>"' ><i class="fa fa-trash fa-xs"></i></a> 
                                              
                                              
                                                </td>
                                            </tr>
                                          <?php } ?></tbody>
              </table></div></div></div>
            </div>
          </div>

                <!-- -------- -->
              
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <!-- Footer -->
      <?php include("include/footer.php");?>
       <!-- ....modal start... -->
      <div id="add_data_Modal" class="modal">  
        <div class="modal-dialog">  
             <div class="modal-content">  
                  <div class="modal-header">  
                       <h4 class="modal-title">Update Trainer</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="trainer_update">  
                                      <form class="form-horizontal"  method="POST" name="userform"  id="insert_form">
                                        <!-- <div class="form-group">
                                            <div class="row">
                                              <label class="col-md-3 control-label">Enquiry Date</label>
                                                <div class="col-md-8">
                                                  <input type="text" value="<?php echo $current_date;?>" name="enquiry_date" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Customer Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="customer_name" id="customer_name" placeholder="Customer Name"  class="form-control" onkeypress="return isAlfa(event)"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Address</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="4" name="address" id="address" placeholder="Address" style="height: 120px;" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Contact</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>
                                        

                                         <div class="form-group">
                                              <div class="row">
                                                <label class="col-md-3 control-label">Date Of Birth</label>
                                                <div class="col-md-8">
                                                  <input type="date" name="dob" id="dob" class="form-control" placeholder="Birth Date" required="">
                                                </div>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Age</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="age" id="age" class="form-control" placeholder="Age" required="">
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
                                                    <input type="number" name="feet" id="feet" class="form-control" placeholder="Feet" required>
                                                </div>

                                                 <div class="col-md-4">
                                                    <input type="number" name="inches" id="inches" class="form-control" placeholder="Inches" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Weight</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="weight" id="weight" class="form-control" placeholder="Weight" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Occupation</label>
                                                <!-- <div class="col-sm-9"> -->
                                                    <div class="custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="test1" name="occupation" value="Professional" type="radio" checked="checked">
                                                      <label class="custom-control-label" for="test1">Professional</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="test2" name="occupation" value="Business" type="radio">
                                                      <label class="custom-control-label" for="test2">Business</label>
                                                    </div>
                                                     <div class="custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="test3" name="occupation" value="Service" type="radio" checked="checked">
                                                      <label class="custom-control-label" for="test3">Service</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="test4" name="occupation" value="Homemaker" type="radio">
                                                      <label class="custom-control-label" for="test4">Homemaker</label>
                                                    </div>
                                                      <div class="custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="test5" name="occupation" value="Student" type="radio">
                                                      <label class="custom-control-label" for="test5">Student</label>
                                                    </div>
                                                      <div class="custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="test6" name="occupation"  value="Other" type="radio">
                                                      <label class="custom-control-label" for="test6">Other</label>
                                                    </div>
                                               
                                               <!--  </div> -->
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">How did you get to know about us?</label>
                                                <div class="col-md-5">
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test7" name="reference" value="News paper" type="radio" checked="checked">
                                                      <label class="custom-control-label" for="test7">News paper</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test8" name="reference" value="Hoarding" type="radio">
                                                    <label class="custom-control-label" for="test8">Hoarding</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test9" name="reference" value="Existing Member" type="radio" checked="checked">
                                                    <label class="custom-control-label" for="test9">Existing Member</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test10" name="reference" value="Family" type="radio">
                                                    <label class="custom-control-label" for="test10">Family</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test11" name="reference" value="Friends" type="radio">
                                                    <label class="custom-control-label" for="test11">Friends</label>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test12" name="reference"  value="Doctor" type="radio">
                                                    <label class="custom-control-label" for="test12">Doctor</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test13" name="reference" value="Old Member" type="radio">
                                                    <label class="custom-control-label" for="test13">Old Member</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test14" name="reference" value="Just Dial" type="radio">
                                                    <label class="custom-control-label" for="test14">Just Dial</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test15" name="reference" value="Huntplex.com" type="radio">
                                                    <label class="custom-control-label" for="test15">Huntplex.com</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3">
                                                    <input class="custom-control-input" id="test16" name="reference" value="Others" type="radio">
                                                    <label class="custom-control-label" for="test16">Others</label>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Goal</label>

                                                    <div class="col-md-2 custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="test17" name="goal"  value="Weight Loss" type="radio" checked="checked">
                                                      <label class="custom-control-label" for="test17">Weight Loss</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                          <input type="number" name="weight_loss" id="weight_loss" class="form-control" placeholder="Feet" style="border: 0;border-bottom: 1px solid #c2cad8;">
                                                    </div> 

                                                    <div class="col-md-2 custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="test18" name="goal"  value="Weight Gain" type="radio">
                                                      <label class="custom-control-label" for="test18">Weight Gain</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                          <input type="number" name="weight_gain" id="weight_gain" class="form-control" placeholder="Feet" style="border: 0;border-bottom: 1px solid #c2cad8;">
                                                    </div> 
                                                </div>
                                               <br>
                                                    <div class="row">
                                                      <div class="col-md-4"></div>
                                                      <div class="col-md-4">

                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test19" name="goal" value="Flexibility" type="radio">
                                                          <label class="custom-control-label" for="test19">Flexibility</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test25" name="goal" value="Injury Rehabilitation" type="radio">
                                                          <label class="custom-control-label" for="test25">Injury Rehabilitation</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test20" name="goal" value="Yoga" type="radio">
                                                          <label class="custom-control-label" for="test20">Yoga</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test21" name="goal" value="Toning" type="radio">
                                                          <label class="custom-control-label" for="test21">Toning</label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test22" name="goal" value="Stress Management" type="radio">
                                                          <label class="custom-control-label" for="test22">Stress Management</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test23" name="goal" value="Cardio Vascular Endurance" type="radio">
                                                          <label class="custom-control-label" for="test23">Cardio Vascular Endurance</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test24" name="goal" value="Strength Endurance" type="radio">
                                                          <label class="custom-control-label" for="test24">Strength Endurance</label>
                                                        </div>
                                                      </div>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        <!-- </div> -->
                                          <hr>
                                           <div class="form-group">
                                            <div class="row">
                                               <label class="col-md-3 control-label">Do you exercise regularly?</label>
                                                <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test25" name="exercise" value="Yes" type="radio" checked="checked">
                                                          <label class="custom-control-label" for="test25">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test26" name="exercise" value="No" type="radio">
                                                          <label class="custom-control-label" for="test26">No</label>
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
                                                    <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test27" name="exercise_type" value="Gym" type="radio" checked="checked">
                                                          <label class="custom-control-label" for="test27">Gym</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test28" name="exercise_type" value="Yoga" type="radio">
                                                          <label class="custom-control-label" for="test28">Yoga</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test29" name="exercise_type" value="Walking" type="radio">
                                                          <label class="custom-control-label" for="test29">Walking</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test30" name="exercise_type" value="Jogging" type="radio">
                                                          <label class="custom-control-label" for="test30">Jogging</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test31" name="exercise_type" value="Spinning" type="radio">
                                                          <label class="custom-control-label" for="test31">Spinning</label>
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
                                                   <input type="text" name="gyming" id="gyming" class="form-control"  placeholder="If gyming where?" onkeypress="return isAlfa(event)" >
                                                   </div>

                                                  <div class="col-sm-6">
                                                  <input type="text" name="gyming_time" id="gyming_time" class="form-control"  placeholder="How much time ?">
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
                                                          <input class="custom-control-input" id="test31" name="package_offer" value="Monthly" type="radio" checked="checked">
                                                          <label class="custom-control-label" for="test31">Monthly</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test32" name="package_offer" value="Quarterly" type="radio">
                                                          <label class="custom-control-label" for="test32">Quarterly</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test33" name="package_offer" value="Half Yearly" type="radio">
                                                          <label class="custom-control-label" for="test33">Half Yearly</label>
                                                        </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test34" name="package_offer" value="Yearly" type="radio">
                                                          <label class="custom-control-label" for="test34">Yearly</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test35" name="package_offer" value="Personal Training" type="radio">
                                                          <label class="custom-control-label" for="test35">Personal Training</label>
                                                        </div>
                                                        <div class="custom-control custom-radio mb-3">
                                                          <input class="custom-control-input" id="test36" name="package_offer" value="Any Other" type="radio">
                                                          <label class="custom-control-label" for="test36">Any Other</label>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>


                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Remark</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="text" name="remark" id="remark" class="form-control"  placeholder="Remark" required>
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Package Amount</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="number" name="package_amount" id="package_amount" onkeypress="return isNumber(event)" class="form-control"  placeholder="Package Amount" required >
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Name Of the Counsellor</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="text" name="counsellor_name" id="counsellor_name" class="form-control"  onkeypress="return isAlfa(event)" placeholder="Counsellor name" required>
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Next Follow up on</label>
                                                <div class="col-sm-9">
                                                 <p>
                                                   <input type="date" name="follow_date" id="follow_date" class="form-control" value="<?php echo $current_date;?>"  placeholder="Follow Date" required="">
                                                 </p>
                                                 </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="enquiry_id" id="enquiry_id" />  
                                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                                    </form>
                  </div>  
                  <div class="modal-footer">  
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                  </div>  
             </div>  
        </div>  
      </div>
    <!-- ..modal end... -->
    </div>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/js/js.cookie.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/clipboard/dist/clipboard.min.js"></script>
   <script src="assets/vendor/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/vendor/js/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/vendor/js/buttons.html5.min.js"></script>
  <script src="assets/vendor/js/buttons.flash.min.js"></script>
  <script src="assets/vendor/js/buttons.print.min.js"></script>
  <script src="assets/vendor/js/dataTables.select.min.js"></script>
   <script src="assets/vendor/js/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/js/jquery-scrollLock.min.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="assets/vendor/js/argon.min.js"></script>
   <script src="assets/js/main.js"></script>
  <script>
      
$(document).ready(function(){  
   
      $(document).on('click', '.edit_data', function(){  
           var enquiry_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{enquiry_id:enquiry_id},  
                dataType:"json",  
                success:function(data){  
                     $('#customer_name').val(data.cust_name);  
                     $('#email').val(data.email); 
                     $('#address').val(data.address); 
                     $('#contact').val(data.mobile); 
                     $('#dob').val(data.dob); 
                     $('#age').val(data.age); 
                     $("#gender").val(data.gender);
                     $('#feet').val(data.height_feet); 
                     $('#inches').val(data.height_inch); 
                     $('#weight').val(data.weight);
                     $("#"+data. occupation).attr("checked");
                     $("#"+data. reference).attr("checked");  
                     $("#"+data. goal).attr("checked");
                     $('#weight_loss').val(data.weight_loss);
                     $('#weight_gain').val(data.weight_gain);
                     $("#"+data.exercise).attr("checked");
                     $("#"+data.exercise_type).attr("checked");
                     $('#gyming').val(data.where_gym);
                     $('#gyming_time').val(data.gym_time);
                     $("#"+data.package_offer).attr("checked");
                     $('#remark').val(data.remark);
                     $('#package_amount').val(data.package_amount);
                     $('#counsellor_name').val(data.counsellor_name);
                     $('#follow_date').val(data.follow_date);
                     $('#description').val(data.description);  
                     // $('#image').attr('src',data.image); 

                     //$('#hidden_input_file').val(data.image);
                     //$( 'data.image' ).insertAfter( "#image" );
                     $('#enquiry_id').val(data.enquiry_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_enquiry_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_enquiry_id:del_enquiry_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            window.location.reload();
      });  
      
      });
    </script>
 
</body>

</html>