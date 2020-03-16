
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    View Customers
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View Customers</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View Customers</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
                <div class="table-responsive py-4">
                  <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12">
                        <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                          <thead class="thead-light">
                            <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Customer Id</th>
                              <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Name</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Email</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Contact</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">Membership plan</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">Membership</br> paid</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">PT plan</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">PT paid</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr><th rowspan="1" colspan="1">Customer Id</th><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Contact</th><th rowspan="1" colspan="1">Membership plan</th><th rowspan="1" colspan="1">Membership paid</th><th rowspan="1" colspan="1">PT plan</th><th rowspan="1" colspan="1">PT paid</th><th rowspan="1" colspan="1">Action</th></tr>
                          </tfoot>
                          <tbody>
                            <?php
                            //error_reporting(0);
                            if(isset($_POST['update']))
                            {
                              extract($_POST);
                              //echo "<pre>";print_r($_POST); exit;
                              include("image_validation.php");    
                               if($response['type'] == 'error')
                               {// echo $response['message'];
                               }
                               else
                               {
                                  $image = $_POST['customer_image'];
                                  $target = "../images/".basename($image);

                                 if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                                 @unlink("../images/customers/".$_POST['old_image']);
                                   $msg = "Image uploaded successfully";
                                 }else{
                                   $msg = "Failed to upload image";
                                 }
                                  $ql= "UPDATE `".DB_PREFIX."`.`tbl_customer` SET `fname`='".trim($first_name)."',`lname`='".trim($last_name)."',`email`='".trim($email)."', `contact`='".trim($contact)."', `dob`='".trim($dob)."', `blood_group`='".trim($blood_group)."',`gender`='".trim($gender)."',`married_status`='".trim($married_status)."', `feet`='".trim($feet)."', `inches`='".trim($inches)."', `weight`='".trim($weight)."', `address`='".trim($address)."',`guardian_name`='".trim($guardian_name)."', `relation`='".trim($relation)."', `guardian_contact`='".trim($guardian_contact)."',`organization`='".trim($organization)."', `joined_date`='".trim($joined_date)."',`image`='".trim($image)."'  WHERE `customer_id` = '$update_customer_id'";
                                    // echo $ql;exit;
                                  if ($con->query($ql) === TRUE) {
                                  $_SESSION['success']='Customer Successfully Updated';
                                  ?>
                                    <script type="text/javascript">
                                      window.location="view_customers.php";
                                    </script>
                                  <?php }
                               }
                            }
                                  $sql = "SELECT c.*,m.*,c.`customer_id`,cm.`cm_plan`,cm.`customer_membership_starting_date`,cm.`customer_membership_expiry_date`,cpt.`pt_cm_plan`,cm.`membership_id`,cm.`membership_paid_status`,cpt.`customer_pt_starting_date`,cpt.`customer_pt_expiry_date`,cpt.`pt_membership_id`,cpt.`pt_paid_status`,mpt.`name` as ptname FROM `".DB_PREFIX."`.`tbl_customer` c
                                  left join `".DB_PREFIX."`.`tbl_customer_membership` cm on(cm.`customer_id`=c.`customer_id`)
                                  left join `".DB_PREFIX."`.`tbl_customer_pt` cpt on(cpt.`customer_id`=c.`customer_id`)
                                  left join `".DB_PREFIX."`.`tbl_membership` m on(m.`membership_id`=cm.`membership_id`) 
                                  left join `".DB_PREFIX."`.`tbl_membership` mpt on(mpt.`membership_id`=cpt.`pt_membership_id`) ";
                                  // echo $sql;exit;
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc()) { ?>
                                 <tr>
                                      <td><?php echo $row['customer_id']; ?></td>
                                      <td><img  src="../images/customers/<?php echo $row['image'];?>" onerror=this.src="images/customers/profile_image.png" style="height:50px;width:50px; border-radius: 50px;"><?php echo ' '.$row['fname'].' '.$row['lname']; ?></td>
                                      <td class="td_desc"><?php echo $row['email']; ?></td>
                                      <td class="td_desc"><?php echo $row['contact']; ?></td>
                                      <td> <?php   echo $row['name'];
                                        if($row['cm_plan'] == 1)
                                          { 
                                            echo '</br><span class="badge badge-default" style="font-size:13px;background-color:#ffeac4;color:#541414;">From :'.$row["customer_membership_starting_date"].'<br> To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:'.$row["customer_membership_expiry_date"].'</span>';
                                          }else{echo "Nill";} ?> 
                                      <td> <?php 
                                        if($row['membership_paid_status'] == 3)
                                          { echo '<span class="badge badge-success btn-lg" >Paid</span> </br>'; }
                                            else if( $row['membership_paid_status'] == 1)
                                                {echo '<span class="badge badge-danger btn-lg">Unpaid</span>'; }
                                            else if($row['membership_paid_status'] == 4){echo '<span class="badge badge-warning btn-lg">Expired</span>';} 
                                            else if($row['membership_paid_status'] == 2){echo '<span class="badge badge-info btn-lg">Pending</span>';} 
                                            ?>  
                                      </td>
                                      <td><?php echo $row['ptname'];
                                        if($row['pt_cm_plan'] == 2)
                                          { 
                                            echo '</br><span class="badge badge-default" style="font-size:13px;background-color:#ffeac4;color:#541414;">From :'.$row["customer_pt_starting_date"].'<br> To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:'.$row["customer_pt_expiry_date"].'</span>';
                                          }else{echo "Nill";}?> 
                                      </td>
                                      <td> <?php 
                                        if($row['pt_paid_status'] == 3)
                                          { echo '<span class="badge badge-success btn-lg">Paid</span> </br>';}
                                        else if( $row['pt_paid_status'] == 1)
                                          {echo '<span class="badge badge-danger btn-lg">Unpaid</span>';}
                                        else if( $row['pt_paid_status'] == 4)
                                          {echo '<span class="badge badge-warning btn-lg">Expired</span>'; }
                                        else if($row['pt_paid_status'] == 2)
                                          {echo '<span class="badge badge-info btn-lg">Pending</span>';} ?> 
                                      </td>
                                      <td>
                                        <a class="view_data " data-target="#customerview_Modal" data-toggle="modal" data-paymentid='"<?php echo $row['customer_id'];?>"' id="<?php echo $row["customer_id"]; ?>" title="View"><i class="fa fa-eye fa-md text-primary pr-2"></i></a>
                                        <a class="edit_data" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"' data-target="#customer_Modal" data-toggle="modal" title="Edit" data-target="#customer_Modal"><i class="fa fa-pen fa-md text-info pr-2"></i></a>
                                        <a title="Make Payment" href="manage_payment.php?c-id=<?php echo $row['customer_id']; ?>" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"'><i class="fa fa-rupee-sign fa-md text-muted"></i></a>
                                        <div style="margin-top: 5px;">
                                        <a title="Hold" href="#editModal" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"'><i class="fa fa-pause fa-md text-dark pr-2"></i></a> 

                                         <a name="adjustment" class="adjustment" title="Adjustment" data-toggle="modal" data-target="#calender_Modal" id="<?php echo $row["customer_id"]; ?>" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"'><i class="fa fa-calendar fa-md text-success pr-2"></i></a>

                                        <?php if($row['cm_plan'] == Null)
                                      { ?>
                                        <a class="del_data" name='del' data-delid='"<?php echo $row['customer_id'];?>"' title="Delete"><i class="fa fa-trash fa-md text-danger pr-2"></i></a></br>
                                      <?php } ?>
                                         
                                        </div>
                                      </td>   
                                 </tr>
                               <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
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

      <!-- ....adjustment modal start... -->
      <div id="calender_Modal" class="modal">  
        <div class="modal-dialog">  
            <div class="modal-content">  
                <div class="modal-header p-1 pt-3 bg-secondary">  
                  <h4 class="modal-title pl-4">Adjustment</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body p-2 pl-4" id="customer_update">  
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="row">
                            <label class="col-md-6 control-label  label2">Id</label>
                            <label class="col-md-6 font-weight-bold label2" id="cu_id" name="cu_id"></label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label  label2">Name</label>
                        <label name="cu_name" id="cu_name" class="control-label col-md-8 font-weight-bold label2"></label>
                      </div>
                    </div>             
                                        
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label  label2">Pt Plan</label>
                        <label name="cu_pt_plan" id="cu_pt_plan" class="col-md-8 control-label font-weight-bold label2"></label>
                      </div>
                    </div>
                          
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Start Date</label>
                        <label class="col-md-8 control-label label2 font-weight-bold " name="cu_start_dt" id="cu_start_dt"></label>                             
                      </div>
                    </div>
                                           
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Expiry Date</label>
                        <label class="col-md-4 control-label label2 font-weight-bold" name="cu_expiry_dt" id="cu_expiry_dt"></label>
                        <input type="date" name="adjust_date" id="adjust_date" class="col-md-4">
                        <i class="fa fa-calendar  fa-md text-success " name="calender_icon" id="calender_icon"></i>
                        <button  type="button" class="col-md-4 btn btn-xs" id="calen_cancel">Cancel</button>
                      </div>
                    </div>

                    <!-- <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Trainer</label>
                        <label class=" control-label label2 font-weight-bold col-md-4" name="cu_trainer" id="cu_trainer"></label>
                         <button type="button" class="btn btn-xs" id="trainer_change">Change</button>
                        
                        <select name="cu_trainer_sel" id="cu_trainer_sel" class="form-control col-md-4">
                          <option value="null">Select Trainer</option>
                          <?php          
                              $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_trainer`";
                              $result = $con->query($sql);
                              while($row = $result->fetch_assoc()) 
                              { ?>
                               <option value="<?php echo $row['trainer_id'];?>"><?php echo $row['fname'].' '.$row['lname'];?></option>
                            <?php } ?>
                        </select>
                       <button type="button" class=" btn btn-xs col-md-4" id="trainer_cancel">Cancel</button>
                      </div>
                    </div> -->

                      </div> 
                      <div class="modal-footer">  
                        <button type="button" name="update_date" id="update_date" class="btn btn-danger">UPdate</button>  
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                      </div> 
                  </form>
                </div>   
            </div>  
        </div>  
      </div>
    <!-- .. adjustment modal end... -->

      <!-- ....edit modal start... -->
      <div id="customer_Modal" class="modal">  
        <div class="modal-dialog modal-lg">  
             <div class="modal-content">  
                  <div class="modal-header p-1 pt-2 bg-secondary">  
                       <h4 class="modal-title">Update Customer</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body p-2" id="customer_update">  
                                     <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <div class="row">
                                                  <label class="col-md-4 control-label my-auto white-space">Customer Name</label>
                                                  <div class="col-md-4">
                                                    <input type="text" name="first_name"  id="first_name" placeholder="First Name" onkeypress="return isAlfa(event)"  class="form-control h-30"  required>
                                                  </div>
                                                    <div class="col-md-4">
                                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" onkeypress="return isAlfa(event)"  class="form-control h-30"  required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="row">
                                                <label class="col-md-3 control-label my-auto">Email</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="email" id="email" class="form-control h-30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <div class="row">
                                                  <label class="col-md-4 control-label my-auto">Contact</label>
                                                  <div class="col-md-8">
                                                    <input type="text" name="contact"  class="form-control h-30 " placeholder="Contact Number" id="contact" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                  <div class="row">
                                                    <div class="col-sm-8">
                                                      <div class="row">
                                                        <label class="col-md-4 control-label my-auto white-space">Date Of Birth</label>
                                                        <div class="col-md-8">
                                                          <input type="date" name="dob" id="dob" class="form-control h-30 pt-1 pb-1" placeholder="Birth Date" required="" onchange="calculate_age(this.value)">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                      <div class="row">
                                                <label class="col-md-4 control-label my-auto">Age</label>
                                                <div class="col-md-8">
                                                  <input type="text" id="age" name="age" class="form-control h-30" placeholder="Age" required="" readonly>
                                                </div>
                                            </div>
                                                    </div>
                                            </div>
                                              </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                              <div class="row">
                                                <div class="col-sm-6">
                                                  <div class="row">
                                                    <div class="col-sm-7">
                                                      <div class="row">
                                                        <label class="col-md-7 control-label my-auto">Blood Group</label>
                                                        <div class="col-md-5">
                                                          <select name="blood_group" id="blood_group" class="form-control h-30 p-0" required>
                                                            <option value=" ">--Select Blood Group--</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                          </select>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-sm-5">
                                                  <div class="row">
                                                <label class="col-md-4 control-label my-auto">Gender</label>
                                                <div class="col-md-8">
                                                   <select name="gender" id="gender" class="form-control h-30 p-0 " required>
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                   </select>
                                                </div>
                                              </div>
                                            </div>
                                            </div>
                                                </div>
                                                <div class="col-sm-6">
                                                  <div class="row">
                                                <label class="col-md-4 control-label my-auto">Marital Status</label>
                                                <div class="col-md-8">
                                                   <select name="married_status" id="married_status" class="form-control h-30 p-0 " >
                                                    <option value=" ">--Select--</option>
                                                     <option value="Single">Single</option>
                                                      <option value="Married">Married</option>
                                                   </select>
                                                </div>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                  <div class="row">
                                                  <label class="col-md-4 control-label my-auto">Height</label>
                                                  <div class="col-md-4">
                                                      <input type="number" name="feet" id="feet" class="form-control h-30 " placeholder="Feet"  required>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <input type="number" name="inches" id="inches" class="form-control h-30" placeholder="Inches" required>
                                                </div>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                  <div class="row">
                                                <label class="col-md-4 control-label my-auto">Weight</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="weight" id="weight" class="form-control h-30" placeholder="Weight" required>
                                                </div>
                                            </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-2 control-label my-auto">Address</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" rows="1" name="address" id="address" placeholder="Address" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <div class="row">
                                                  <label class="col-md-4 control-label my-auto">Guardian Name</label>
                                                  <div class="col-md-8">
                                                    <input type="text" name="guardian_name" id="guardian_name" placeholder="Guardian Name" onkeypress="return isAlfa(event)"  class="form-control h-30"  required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="row">
                                                <label class="col-md-4 control-label my-auto">Relation</label>
                                                <div class="col-md-8">
                                                   <select name="relation" id="relation" class="form-control h-30 p-0" >
                                                    <?php $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_relationships`";
                                                       $result = mysqli_query($con,$sql);
                                                   while($row = $result->fetch_assoc()) { ?>                        
                                                    <option value="<?php echo $row['relationships_name']?>"><?php echo $row['relationships_name']?></option>
                                                  <?php } ?>
                                                   </select>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-2 control-label my-auto">Guardian Contact</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="guardian_contact" id="guardian_contact" class="form-control h-30" placeholder="Guardian Contact Number" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                         <div class="form-group">
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <div class="row">
                                                  <label class="col-md-4 control-label my-auto">Organization</label>
                                                  <div class="col-md-8">
                                                    <input type="text" name="organization" id="organization" placeholder="Organization" onkeypress="return isAlfa(event)"  class="form-control h-30" >
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="row">
                                                <label class="col-md-4 control-label my-auto">Date of Joining</label>
                                                <div class="col-md-8">
                                                    <input type="date" name="joined_date" id="joined_date" placeholder="Date of Joining"   class="form-control h-30">
                                                </div>
                                            </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="row">
                                                <label class="col-sm-2 control-label my-auto">Upload Photo</label>
                                                 <div class="col-sm-8 pl-0">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image" lang="en" >
                                                    <input type="hidden" id="customer_image" name="customer_image" value=""/>
                                                    <label  class="custom-file-label " for="customFileLang">Upload Photo</label>
                                                    <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?>
                                                </div>
                                              </div>
                                              <div class="col-sm-2">
                                                <img id="preview_customer" name="preview_customer" src="" height="50" width="100"/>
                                              </div>
                                            </div>
                                        </div>
                                       
                                      <input type="hidden" name="update_customer_id" id="update_customer_id"  />  
                                      <input type="submit" name="update" id="update" value="Update" class="btn btn-success" /> 
                </form>
                  </div>  
                  <div class="modal-footer">  
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                  </div>  
             </div>  
        </div>  
      </div>
    <!-- .. edit modal end... -->

    <!-- ....view modal start... -->
    <div id="customerview_Modal" class="modal">  
        <div class="modal-dialog modal-lg">  
            <div class="modal-content">  
                <div class="modal-header p-1 pt-3 bg-secondary">  
                  <h4 class="modal-title pl-4">View Customer</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body p-2 pl-4" id="customer_update">  
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                    <div class="form-group">
                        <!-- <img id="vpreview_customer" name="vpreview_customer" src="images/profile_image.png" class="btn-width pro-pic mx-auto d-block border border-warning rounded"/>
                        <hr> -->
                      <div class="row">
                        <div class="col-sm-7">
                          <div class="row">
                            <label class="col-md-4 control-label label2 white-space">Customer Name</label>
                            <label name="vname"  id="vname" class="label2 font-weight-bold control-label col-md-8"></label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="row">
                            <label class="col-md-4 control-label label2">Contact</label>
                            <label class="col-md-8 label2 font-weight-bold" id="vcontact" name="vcontact"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-7">
                          <div class="row">
                            <label class="col-md-4 control-label label2">Email</label>
                            <label name="vemail" id="vemail" class="font-weight-bold control-label col-md-8 label2 white-space" style="word-break: break-all;"></label>
                          </div>
                        </div> 
                        <div class="col-sm-5">
                          <div class="row">
                        <label class="col-md-4 control-label label2 white-space">DOB & Age</label>
                        <label name="vdob_age" id="vdob_age" class="col-md-8 font-weight-bold control-label label2"></label>
                      </div>
                        </div>
                      </div> 
                    </div>           
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-7">
                          <div class="row">
                        <label class="col-md-4 control-label label2">Blood Group</label>
                        <label class="col-md-8 control-label label2 font-weight-bold" name="vblood_group" id="vblood_group"></label>   
                        </div>
                        </div>
                        <div class="col-sm-5">
                          <img id="vpreview_customer" name="vpreview_customer" src="images/profile_image.png" class="pro-pic pro-pic1 mx-auto d-block border border-warning rounded"/>
                        </div>                          
                      </div>
                    </div>
                                           
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Gender & Civil Status</label>
                        <label class="col-md-8 control-label label2 font-weight-bold" name="vgender_marital" id="vgender_marital"></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Height & weight</label>
                        <label class="col-md-8 control-label label2 font-weight-bold" name="vfitness" id="vfitness"></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Address</label>
                        <label class="col-md-3 control-label label2 font-weight-bold white-space" name="vaddress" id="vaddress"></label> 
                      </div>
                    </div>

                      <hr>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Guardian(Relation)</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vguardian_name_relation" id="vguardian_name_relation"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Guardian Contact</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vguardian_contact" id="vguardian_contact"></label>
                        </div>
                      </div>

                      <hr>
                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Organization</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vorganization" id="vorganization"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Date of Joining</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vjoined_date" id="vjoined_date"></label>
                        </div>
                      </div>     
                  </form>
                </div>  
                <div class="modal-footer">  
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times p-1"></i>Close</button>  
                </div>  
            </div>  
        </div>  
      </div>
    <!-- .. view modal end... -->
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
 
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="assets/vendor/js/argon.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script>
      
$(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var customer_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{customer_id:customer_id},  
                dataType:"json",  
                success:function(data){  
                     $('#first_name').val(data.fname);  
                     $('#last_name').val(data.lname);  
                     $('#email').val(data.email);  
                     $('#contact').val(data.contact);
                     $('#dob').val(data.dob);  
                     $('#age').val(data.age);  
                     $('#blood_group').val(data.blood_group); 
                     $('#gender').val(data.gender);  
                     $('#married_status').val(data.married_status); 
                     $('#feet').val(data.feet); 
                     $('#inches').val(data.inches);  
                     $('#weight').val(data.weight);
                     $('#address').val(data.address); 
                     $('#guardian_name').val(data.guardian_name);  
                     $('#relation').val(data.relation); 
                     $('#guardian_contact').val(data.guardian_contact);
                     $('#organization').val(data.organization); 
                     $('#joined_date').val(data.joined_date);
                     $('#plan').val(data.plan);
                     $('#payment_mode').val(data.payment_mode);
                     $('#expiry_date').val(data.expiry_date);
                     if(data.personal_training==1){
                        $( "#customCheck2" ).prop( "checked", true );
                     }
                     $('#personal_trainer').val(data.personal_trainer);
                     $('#personal_plan').val(data.personal_plan);
                     $('#personal_payment_mode').val(data.personal_payment_mode);
                     $('#personal_expiry_date').val(data.personal_expiry_date);
                     $('#starting_date').val(data.starting_date);
                     $('#personal_starting_date').val(data.personal_starting_date);

                     $('.custom-file-label').html(data.image); 
					           $('#customer_image').val(data.image);
                     $('#preview_customer').attr('src', '../images/customers/'+data.image);
					           $('#image').attr('title',data.image);
                     $('#update_customer_id').val(data.customer_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 

     /*........view button starts ...........*/
       $(document).on('click', '.view_data', function(){  
           var customer_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{customer_id:customer_id},  
                dataType:"json",  
                success:function(data){  
                     $('#vname').html(data.fname+' '+data.lname);  
                     $('#vemail').html(data.email);  
                     $('#vcontact').html(data.contact);
                     $('#vdob_age').html(data.dob+" , "+data.age);
                     $('#vblood_group').html(data.blood_group); 
                     $('#vgender_marital').html(data.gender+","+data.married_status); 
                     $('#vfitness').html(data.feet+"' "+data.inches+'" ,'+data.weight+"kg"); 
                     $('#vaddress').html(data.address); 
                     $('#vguardian_name_relation').html(data.guardian_name+"("+data.relation+")");  
                     $('#vguardian_contact').html(data.guardian_contact);
                     $('#vorganization').html(data.organization); 
                     $('#vjoined_date').html(data.joined_date);
                     $('#vpreview_customer').attr('src', '../images/customers/'+data.image);
                     $('#customerview_Modal').modal('show');  

                }  
           });  
      }); 

        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#vcustomer_image').val(fileName);
            $('#image').attr('title',fileName);
            $('#vpreview_customer').attr('src', '../images/customer'+fileName);
        });
       /*........view button end......*/

      $(document).on('click', '.del_data', function(){  
           var del_customer_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_customer_id:del_customer_id},  
                dataType:"json",  
                success:function(data){  
                }  
           });  
            window.location.reload();
      });  
	      $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
			      $('#customer_image').val(fileName);
			      $('#image').attr('title',fileName);
            $('#preview_customer').attr('src', '../images/customer'+fileName);
        });

        /*.....adjust date model view starts......*/ 
      
      $(document).on('click','.adjustment', function()
      { 
         var adjust_customer_id_mb = $(this).attr("id");  
         // alert(adjust_customer_id_mb);
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{adjust_customer_id_mb:adjust_customer_id_mb},  
                dataType:"json",  
                success:function(data){  
                  // alert(data.fname);
                  $('#cu_id').html(data.customer_id);
                  $('#cu_name').html(data.fname+' '+data.lname);
                  $('#cu_pt_plan').html(data.name);
                  $('#cu_start_dt').html(data.customer_membership_starting_date);
                  $('#cu_expiry_dt').html(data.customer_membership_expiry_date);
                }  
           });  
      });  
      /*.....adjust date model view ends......*/

      /*.....adjust date  update starts......*/
      $(document).on('click', '#update_date', function()
      {   
          var cm_adj_date= $('#adjust_date').val();
          // alert(cm_adj_date);
          var cm_customer_id = $('#cu_id').html();  
          // alert(cm_customer_id);
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{cm_customer_id:cm_customer_id,cm_adj_date:cm_adj_date},  
                dataType:"json",  
                success:function(data){ 
                  if(data==1)
                  { alert('Date Successfully Updated'); }
                  else
                  { alert('Date Not Deleted');} 
                }  
           });  
      }); 
      /*.....adjust date update ends......*/ 

    /*....expiry date hide show starts...*/
       $('#adjust_date').hide();
       $('#calen_cancel').hide();
       // var adj_date=$('#adjust_date').html();
       $(document).on('click', '#calender_icon', function()
      { 
        $('#calender_icon').hide();
        $('#adjust_date').show();
        $('#cu_expiry_dt').hide();
         $('#calen_cancel').show();
      });

          /*....expiry date cancel btn code...*/
          $(document).on('click', '#calen_cancel', function()
          { 
             $('#calen_cancel').hide();
             $('#cu_expiry_dt').show();
             $('#adjust_date').hide();
              $('#calender_icon').show();
          });
      /*....expiry date hide show ends...*/

     
      });
    </script>
 <script >
function calculate_age(val)
{
   var dob = val;
   dob = new Date(dob);
  var today = new Date();
  var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
  $('#age').val(age);
}
</script>
</body>

</html>