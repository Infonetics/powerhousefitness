<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
     Trainers
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
  <style>
    .error {color: #FF0000;} /* validation error style*/
  </style>
</head>

<body class="">
  <?php include("include/sidebar.php");?>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add Trainer</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Add Trainer</h3>
            </div>
            <div class="card-body pt-1">
              <div class="row icon-examples">
                                 <?php
                                  if(isset($_POST["btn_trainer"]))
                                  {
                                        extract($_POST);
                                        
                                    /*    include("image_validation.php");
                                        // echo "<pre>"; print_r($_POST);
                         // print_r($response);
                         if($response['type'] == 'error')
                         {
                          // echo $response['message'];
                          
                           
                         }
                          else
                          {*/
                            // echo $_FILES['image']['name'];
                                        $image = $_FILES['image']['name'];
                                        $target = "../images/".basename($image);
                                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
                                        {
                                          @unlink("../images/".$_POST['old_image']);
                                          $msg = "Image uploaded successfully";
                                        }
                                        else
                                        {
                                          $msg = "Failed to upload image";
                                        }
                                        $image_title=$_POST['image_title'];
                                      /*  $sql="INSERT INTO tbl_trainer (`email`,`fname`,`lname`,`gender`,`dob`,`designation`,`description`,`contact`,`married_status`,`age`,`address`,`feet`,`inches`,`weight`,`image`,`joined_date`,`created_on`) values ('$email','$firstname','$lastname','$gender','$dob','$designation','$description','$contact','$martial_status','$age','$address','$feet','$inches','$weight','$image','$joined_date',NOW())";*/
                                      /* echo $sql;
                                        exit;*/
                                        $sql1="SELECT `trainer_id` FROM `".DB_PREFIX"`.`tbl_trainer` ORDER BY `trainer_id` DESC LIMIT 0,1";
                                        $result1=mysqli_query($con,$sql1);
                                        while($count=mysqli_fetch_array($result1))
                                        {
                                           $count=$count+1;
                                        }
                                        $sql="INSERT INTO `".DB_PREFIX."`.`tbl_trainer` (`email`,`fname`,`lname`,`gender`,`dob`,`designation`,`description`,`contact`,`married_status`,`age`,`address`,`feet`,`inches`,`weight`,`trainer_facebook`,`trainer_watsapp`,`trainer_instagram`,`image`,`joined_date`,`created_on`,`sort_order`) values ('".trim($email)."','".trim($firstname)."','".trim($lastname)."','".trim($gender)."','".trim($dob)."','".trim($designation)."','".trim(addslashes($description))."','".trim($contact)."','".trim($martial_status)."','".trim($age)."','".trim(addslashes($address))."','".trim($feet)."','".trim($inches)."','".trim($weight)."','".trim($trainer_facebook)."','".trim($trainer_watsapp)."','".trim($trainer_instagram)."','".trim($image)."','".trim($joined_date)."',NOW(),'$count')";
                                       /*echo $sql;
                                        exit;*/
                                       
                                        if ($con->query($sql) === TRUE) 
                                        {
                                          $_SESSION['success']='Gallery Successfully Updated';
                                        ?>
                                          <script type="text/javascript">
                                          window.location="view_trainers.php";
                                          </script>
                                        <?php
                                        } 
                                        else 
                                        {
                                            $_SESSION['error']='Something Went Wrong';
                                          ?>
                                          <script type="text/javascript">
                                          window.location="view_trainers.php";
                                          </script>
                                  <?php }
                                  } /* }*/ ?>

                                    <form class="form-horizontal w-100" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label my-auto">Firstname</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="Firstname"  name="firstname" class="form-control" onkeypress="return isAlfa(event)" required>
                                                </div>
                                                <label class="col-sm-2 control-label my-auto">Lastname</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="Lastname" name="lastname" class="form-control"  onkeypress="return isAlfa(event)" required>
                                                </div>
                                            </div>
                                        </div>
                                         <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">Username</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="Username"  name="username" class="form-control" onkeypress="return isAlfa(event)" required>
                                                </div>
                                                <label class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-4">
                                                    <input type="password" placeholder="Password" name="password" class="form-control" required>
                                                </div>
                                            </div>
                                        </div> -->
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label my-auto">Email</label>
                                                <div class="col-sm-4">
                                                    <input type="email" placeholder="Email" name="email" class="form-control" required>
                                                </div>
                                                <label class="col-sm-2 control-label my-auto">Contact no.</label>
                                                <div class="col-sm-4">
                                                    <input type="tel" placeholder="Contact No." name="contact" class="form-control"  maxlength="10" onkeypress="return isNumber(event)" required><!-- pattern="[0-9]{4}-[0-9]{4}-[0-9]{2}" -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label my-auto">Date Of Birth</label>
                                                <div class="col-sm-4">
                                                  <input  class="form-control" type="date" placeholder="DD/MM/YY" name="dob" id="dob" onchange="calculate_age(this.value)" required>
                                                </div>
                                                <label class="col-sm-2 control-label my-auto">Age</label>
                                                <div class="col-sm-4">
                                                  <input type="number" placeholder="Age" name="age" class="form-control" id="age"  readonly required>
                                                </div>
                                            </div>
                                        </div> 
                                         <div class="form-group">
                                            <div class="row mt-3">
                                                <label class="col-sm-2 control-label mt-2">Gender</label>
                                                <div class="col-sm-4 d-flex">
                                                    <!-- <label class="radio-inline">
                                                        <input type="radio"  name="male" class="form-control">Male
                                                    </label> -->
                                                    <div class="custom-control custom-radio mb-3 pr-4">
                                                      <input class="custom-control-input" id="male" name="gender" checked="checked" value="Male" type="radio">
                                                      <label class="custom-control-label p-3px" for="male">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="female" name="gender" value="Female" type="radio">
                                                      <label class="custom-control-label p-3px" for="female">Female</label>
                                                    </div>
                                                </div>
                                                <label class="col-sm-2 control-label mt-2">Martial Status</label>
                                                <div class="col-sm-4 d-flex">
                                                    <div class="custom-control custom-radio mb-3 pr-4">
                                                      <input class="custom-control-input" id="married" name="martial_status" value="Married" type="radio">
                                                      <label class="custom-control-label p-3px" for="married">Married</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mb-3">
                                                      <input class="custom-control-input" id="single" name="martial_status" checked="checked" value="Single" type="radio">
                                                      <label class="custom-control-label p-3px" for="single">Single</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="row">
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                                		<label class="col-sm-4 control-label mt-2">Description</label>
                                                		<div class="col-sm-8">
                                                    <!-- <input type="text" placeholder="Address" name="address" class="form-control"> -->
                                                    		<textarea class="form-control"  rows="3" placeholder="Description" name="description" required></textarea>
                                                		</div>
                                            		</div>
                                           	 	</div>
                                           	 	<div class="col-sm-6">
                                           	 		<div class="row">
                                                <label class="col-sm-4 control-label mt-2">Address</label>
                                                <div class="col-sm-8">
                                                    <!-- <input type="text" placeholder="Address" name="address" class="form-control"> -->
                                                    <textarea class="form-control"  rows="3" placeholder="Address" name="address" required></textarea>
                                                </div>
                                            </div>
                                           	 	</div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                               			<label class="col-sm-4 control-label my-auto">Feet</label>
                                                		<div class="col-sm-4">
                                                      		<input type="text" placeholder="Feet" name="feet" class="form-control" onkeypress="return isNumber(event)" required>
                                               			</div>
                                                		<div class="col-sm-4">
                                                      		<input type="text" placeholder="Inches" name="inches" class="form-control" onkeypress="return isNumber(event)" required>
                                                		</div>
                                                	</div>
                                                </div>
                                                <div class="col-sm-6">
                                                	<div class="row">
                                                		<label class="col-sm-4 control-label my-auto">Weight</label>
                                                		<div class="col-sm-8"> 
                                                      		<input type="text" placeholder="Weight" name="weight" class="form-control" onkeypress="return isNumber(event)" required>
                                                      	</div>
                                                      </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="row">
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                                		<label class="col-sm-4 control-label my-auto">Designation</label>
                                                		<div class="col-sm-8">
                                            <!--  <input type="text" placeholder="Designation" name="designation" class="form-control"> -->
                                                    		<select class="form-control" id="sel1" name="designation" required>
                                                        		<option value="Head Coach">Head Coach</option>
                                                          		<option value="Trainer">Trainer</option>
                                                          		<option value="Facility Head">Facility Head</option>
                                                          		<option value="Fitness Expert">Fitness Expert</option>
                                                    		</select>
                                                    	</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                            		<div class="row">
                                                		<label class="col-sm-4 control-label my-auto">Sort Order</label>
                                                		<div class="col-sm-8">
                                                   			<input type="number" class="form-control"  placeholder="Sort Order" name="sort_order" required>
                                                		</div>
                                                	</div>
                                            	</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-2 control-label my-auto">Date Of Join</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="date" placeholder="DD/MM/YY"  name="joined_date" required>
                                                </div>
                                                <label class="col-sm-2 control-label my-auto">Date Of Relieving</label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="date" placeholder="DD/MM/YY" name="relieved_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                                <label class="col-sm-4 control-label my-auto">Facebook</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="Facebook"  name="trainer_facebook"  id="trainer_facebook" class="form-control"  required>
                                                </div>
                                            	</div>
                                            </div>
                                            <div class="col-sm-6">
                                            	<div class="row">
                                                <label class="col-sm-4 control-label my-auto">Whatsapp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="Whatsapp" name="trainer_watsapp" id="trainer_watsapp" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                            		<label class="col-sm-4 control-label my-auto">Instagram</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="Instagram" name="trainer_instagram" id="trainer_instagram" class="form-control" required>
                                                </div>
                                            </div>
                                            	</div>
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                                <label class="col-sm-4 control-label my-auto">Upload Photo</label>
                                                 <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image" lang="en" required>
                                                    <label class="custom-file-label" for="customFileLang" style="left: 0 !important;">Upload Photo</label>
                                                   <!--  <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?> -->
                                                </div>
                                              </div>
                                            </div>
                                            	</div>
                                        </div>
                                    </div>
                                        <button type="submit" name="btn_trainer" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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
</script>

</body>

</html>
