<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Add Customer
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add Customer</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Add Customer</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <?php

            if(isset($_POST["btn_customer"]))
            {
                extract($_POST);
                //echo "<pre>";print_r($_POST);
                //echo "<pre>";print_r($_FILES);
                $_SESSION['img_val']='customer';
                include("image_validation.php");
               // print_r($response);
               if($response['type'] == 'error')
               {
                // echo $response['message'];
               }
               else
               {
                   $image = $_FILES['image']['name'];
                   $target = "../images/customers/".basename($image);

                   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                   @unlink("../images/customers/".$_POST['old_image']);
                     $msg = "Image uploaded successfully";
                   }else{
                     $msg = "Failed to upload image";
                   }

                   $query = "SELECT `customer_id` FROM `".DB_PREFIX."`.`tbl_customer` ORDER BY customer_id DESC LIMIT 0,1";
                            $result1 = $con->query($query);
                            if($result1){
                            $row1=mysqli_fetch_array($result1);
                            $count=str_replace("PHF",'', $row1['customer_id']);
                            $count=(int)$count+1;
                            }else
                            {
                              $count=1000;
                            }
                                         
                  $customer_id="PHF".$count;
                  $sql="INSERT INTO `".DB_PREFIX."`.`tbl_customer`(`customer_id`, `fname`, `lname`, `email`, `contact`, `dob`, `age`,`blood_group`,
                     `gender`,`married_status`, `feet`, `inches`, `weight`, `address`,`guardian_name`, `relation`, `guardian_contact`,
                     `organization`, `joined_date`,`image`, `created_on`) 
                   VALUES ('".trim($customer_id)."','".trim($first_name)."','".trim($last_name)."','".trim($email)."','".trim($contact)."','".trim($dob)."','".trim($age)."','".trim($blood_group)."','".trim($gender)."','".trim($married_status)."','".trim($feet)."','".trim($inches)."','".trim($weight)."','".trim($address)."', '".trim($guardian_name)."','".trim($relation)."','".trim($guardian_contact)."',  '".trim($organization)."','".trim($joined_date)."','".trim($image)."',NOW())";
                   // echo $sql; exit;
                    if ($con->query($sql) === TRUE) {
                      $_SESSION['success']=' Record Successfully Updated';
                    ?>
                <script type="text/javascript">
                window.location="view_customers.php";
                </script>
                <?php
                } else {
                      $_SESSION['error']='Something Went Wrong';
                ?>
                <script type="text/javascript">
                window.location="view_customers.php";
                </script>
                <?php
                }
            }
              }
            ?>
                <form class="form-horizontal w-100"  method="POST" name="userform" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row">
                          <label class="col-md-4 control-label my-auto">Customer Name</label>
                          <div class="col-md-4">
                            <input type="text" name="first_name"  id="first_name" placeholder="First Name" onkeypress="return isAlfa(event)"  class="form-control"  required>
                          </div>
                          <div class="col-md-4">
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name" onkeypress="return isAlfa(event)"  class="form-control"  required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                      <label class="col-md-4 control-label my-auto">Email</label>
                      <div class="col-md-8">
                        <input type="text" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
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
                            <input type="text" name="contact"  class="form-control" placeholder="Contact Number" id="contact" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                      <label class="col-md-4 control-label my-auto">Date Of Birth</label>
                      <div class="col-md-8">
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Birth Date" required="" onchange="calculate_age(this.value)">
                      </div>
                    </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row">
                          <label class="col-md-4 control-label my-auto">Age</label>
                          <div class="col-md-8">
                            <input type="text" id="age" name="age" class="form-control" placeholder="Age" required="" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                      <label class="col-md-4 control-label my-auto">Blood Group</label>
                      <div class="col-md-8">
                        <select name="blood_group" id="blood_group" class="form-control" required>
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
                    </div>
                  </div>                            
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row">
                          <label class="col-md-4 control-label my-auto">Gender</label>
                          <div class="col-md-8">
                            <select name="gender" id="gender" class="form-control" required>
                              <option value=" ">--Select Gender--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                      <label class="col-md-4 control-label my-auto">Marital Status</label>
                      <div class="col-md-8">
                        <select name="married_status" id="married_status" class="form-control">
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
                            <input type="number" name="feet" id="feet" class="form-control" placeholder="Feet"  required>
                          </div>
                          <div class="col-md-4">
                            <input type="number" name="inches" id="inches" class="form-control" placeholder="Inches" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                      <label class="col-md-4 control-label my-auto">Weight</label>
                      <div class="col-md-8">
                        <input type="number" name="weight" id="weight" class="form-control" placeholder="Weight" required>
                      </div>
                    </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row">
                            <label class="col-md-4 control-label mt-2">Address</label>
                            <div class="col-md-8">
                              <textarea class="form-control" rows="2" name="address" id="address" placeholder="Address"></textarea>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                      <label class="col-md-4 control-label my-auto">Organization</label>
                      <div class="col-md-8">
                        <input type="text" name="organization" id="organization" placeholder="Organization" onkeypress="return isAlfa(event)"  class="form-control">
                      </div>
                    </div>
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
                            <input type="text" name="guardian_name" id="guardian_name" placeholder="Guardian Name" onkeypress="return isAlfa(event)"  class="form-control"  required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                      <label class="col-md-4 control-label my-auto">Relation</label>
                      <div class="col-md-8">
                        <select name="relation" id="relation" class="form-control">
                          <option value=" ">--Select Relationship--</option>
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
                      <div class="col-sm-6">
                        <div class="row">
                          <label class="col-md-4 control-label my-auto">Guardian Contact</label>
                          <div class="col-md-8">
                            <input type="text" name="guardian_contact" id="guardian_contact" class="form-control" placeholder="Guardian Contact Number" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                      <label class="col-md-4 control-label my-auto">Date of Joining</label>
                      <div class="col-md-8">
                        <input type="date" name="joined_date" id="joined_date" placeholder="Date of Joining"   class="form-control" >
                      </div>
                    </div>
                      </div>
                    </div>
                  </div>
                  <hr> 
                                       <!--  <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Plan</label>
                                                <div class="col-md-8">
                                                    <select name="plan" id="plan" class="form-control">
                                                    <option value=" ">--Plan--</option>
                                                    <?php          
                                                      // $sql = "SELECT * FROM tbl_membership";
                                                      // $result = $con->query($sql);
                                                      // while($row = $result->fetch_assoc()) 
                                                      { ?>
                                                        <option value="<?php //echo $row['membership_id']; ?>"><?php //echo $row['name']; ?></option>
                                                <?php } ?>
                                                     
                                                   </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Mode of Payment</label>
                                                <div class="col-md-8">
                                                    <select name="payment_mode" id="payment_mode" class="form-control">
                                                    <option value=" ">--Select Mode of Payment--</option>
                                                     <option value="Cash">Cash</option>
                                                      <option value="Card">Card</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Starting Date</label>
                                                <div class="col-md-8">
                                                    <input type="date" name="starting_date" id="starting_date" class="form-control" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Expiry Date</label>
                                                <div class="col-md-8">
                                                  <input type="date" name="expiry_date" id="expiry_date" class="form-control" readonly="">
                                                </div>
                                            </div>
                                        </div> -->
                                      

                                        <div class="form-group">
                                                <div class="row">
                                                <label class="col-sm-2 control-label  my-auto">Upload Photo</label>
                                                 <div class="col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image" lang="en" >
                                                    <label class="custom-file-label" for="customFileLang" style="left: 0 !important;">Upload Photo</label>
                                                    <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="btn_customer" id="btn_customer"  class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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
   <script >
function calculate_age(val)
{
   var dob = val;
   dob = new Date(dob);
  var today = new Date();
  var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
  $('#age').val(age);
}

$(document).ready(function()
{ 
  /*....setting starting date from joinig date ...... */
 /* $("#joined_date").change(function()
  {  
    var starting_date = $('#joined_date').val();  
    $("#starting_date").val(starting_date);         
  });*/
  /*....setting starting date from joinig date ...... */

  /*.......expiry date finding start......*/
  $("#plan").change(function()
  {  
    var membership_plan_id = $('#plan').val();  
    var joined_date =$('#joined_date').val();
    alert(joined_date);
       $.ajax({  
              url:"fetch.php",  
              method:"POST",  
              data:{membership_plan_id:membership_plan_id,joined_date:joined_date},  
              dataType:"html",  
              success:function(data){ alert(data);
                  $('#expiry_date').val(data); 
            
             /* $next_week = date('d/m/Y', strtotime('19-05-2014 +1 week')); // 26/05/2014
              $next_week = strtotime('19-05-2014 +7 days');
              $difference = $next_week - time();*/
            }  
          });   
  });
  /*.......expiry date finding end......*/
   $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
            // $('#gallery_img').val(fileName);
            /*$('#website_image').attr('title',fileName);
            $('#website_image').attr('src', '../images/'+fileName);
            $('#preview_website').attr('src', '../images/'+fileName);*/
        });
}); 
</script>
</body>

</html>