<?php
if(isset($_POST["update_admin"]))
{
  extract($_POST);
                    $image = $_FILES['image']['name'];
                    $target = "./images/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("./images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }               
           $q1="UPDATE `admin` SET `username`='$username',`email`='$email',`fname`= '$fname',`lname`= '$lname',`gender`='$gender',`dob`='$dob',`contact`='$contact',`address`='$address',`image`='$image',`city`='$city',`country`='$country',`postal_code`='$postal_code',`about_me`='$about_me' where id=1 ";
           
            if ($con->query($q1) === TRUE) {
             
                $_SESSION['success']='Record Successfully Updated';
                ?>
                <script type="text/javascript">
                  window.location = "profile.php";
                </script> 
                <?php 

          } else {
                $_SESSION['error']='Something Went Wrong';
          }
}

if(isset($_POST["update_password"])){
        extract($_POST);
        //echo $password;
        $passw = hash('sha256', $password);
        function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);
                        
        $q1="UPDATE `admin` SET `password`='$pass',`pass`='$password' where id=1 ";
        //echo $q1;exit;
         if ($con->query($q1) === TRUE) {
            $_SESSION['success']='Password Successfully Updated';
          ?>
            <script type="text/javascript">
              window.location = "profile.php";
            </script>   
               <?php 
          } else {
          $_SESSION['error']='Something Went Wrong';
          }
}?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    My Profile
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
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">My Profile</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                   <?php    
                                          $sql = "SELECT * FROM admin where id=1";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc())  {   ?>
                  <img alt="Image placeholder" src="./images/<?php  echo $row['image']; ?>"/>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="profile.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello Admin</h1> 
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
           <!--  <a href="#!" class="btn btn-info">Edit profile</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <!-- <img src="assets/img/theme/team-4-800x800.jpg" class="rounded-circle"> -->
                    <img  src="./images/<?php  echo $row['image']; ?>" onerror=this.src="uploadImage/profile/profile_image.png" class="rounded-circle" /></td>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <!-- <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div> -->
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <?php    
                                          $sql = "SELECT * FROM manage_website";
                                           $result = $con->query($sql);

                                           while($row1 = $result->fetch_assoc()) 
                                            { 
                                                // $id=$row['id'];

                              ?>
                      <span class="heading"><?php echo $row1['happy_customers'];?></span>
                      <span class="description">Happy Customers</span>
                    </div>
                    <div>
                      <span class="heading"><?php echo $row1['perfect_bodies'];?></span>
                      <span class="description">Perfect Bodies</span>
                    </div>
                    <div>
                      <span class="heading"><?php echo $row1['success_stories'];?></span>
                      <span class="description">Success Stories</span>
                    </div>
                  <?php } ?>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                <?php echo $row['fname'];?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Kottarakara, Kollam
                </div>
                <!-- <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div> -->
                <hr class="my-4" />
                <p><?php echo $row['about_me'];?></p>
                <!-- <a href="#">Show more</a> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <!-- <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div> -->
              </div>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="username" name="username" class="form-control form-control-alternative"  value="<?php echo $row['username'];?>" onkeypress="return isAlfa(event)" required>
                      </div>
                    </div>
                    <!-- <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-alternative" value="<?php echo $row['email'];?>" readonly>
                      </div>
                    </div> -->
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="fname" name="fname" class="form-control form-control-alternative" onkeypress="return isAlfa(event)"  placeholder="First name" value="<?php echo $row['fname'];?>" required >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="lname" name="lname" class="form-control form-control-alternative" onkeypress="return isAlfa(event)"  placeholder="Last name" value="<?php echo $row['lname'];?>" required>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control form-control-alternative" value="<?php echo $row['email'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Contact</label>
                        <input type="tel" id="contact" name="contact" class="form-control form-control-alternative" onkeypress="return isNumber(event)"  value="<?php echo $row['contact'];?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="address" name="address" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $row['address'];?>" type="text" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="city" name="city" class="form-control form-control-alternative" onkeypress="return isAlfa(event)"  placeholder="City" value="<?php echo $row['city'];?>" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="country" name="country" onkeypress="return isAlfa(event)"  class="form-control form-control-alternative" placeholder="Country" value="<?php echo $row['country'];?>" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="text" id="postal_code" name="postal_code" class="form-control form-control-alternative" placeholder="Postal code" value="<?php echo $row['postal_code'];?>" required>
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Date Of Birth</label>
                        <input type="date" id="dob" name="dob" class="form-control form-control-alternative" value="<?php echo $row['dob'];?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Gender</label>
                        <!-- <input type="tel" id="contact" name="contact" class="form-control form-control-alternative"  value="<?php echo $row['contact'];?>"> -->
                         <select class="form-control" id="gender" name="gender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                          </select>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group ">
                       <!--  <input type="file" class="custom-file-input" id="image" name="image" lang="en">
                        <label class="form-control-label" for="input-username">Upload Photo</label>
                         <input type="text" id="username" name="username" class="form-control form-control-alternative"  value="<?php echo $row['username'];?>"> --> 
                          <div class="custom-file">
                            <!-- <input type="hidden"  name="old_image">
                            <input type="file" name="image" class="custom-file-input" id="image"  lang="en" required>
                            <label class="custom-file-label" for="customFileLang">Upload Photo</label> -->

                            <input type="file" class="custom-file-input" id="image" name="image" lang="en" required>
                            <img id="preview_profile" name="preview_profile" src="./images/<?= $row['image']?>" height="50" width="100"/>
                            <label class="custom-file-label" id="profile_photo" for="customFileLang">Upload Photo</label>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group ">
                         <label>About Me</label>
                          <textarea rows="4" class="form-control form-control-alternative" name="about_me" placeholder="A few words about you ..." required><?php echo $row['about_me'];?></textarea>
                      </div>
                    </div>
                </div>
                 <button class="btn btn-primary pt-2 pb-2" name="update_admin">Update</button> 
               </form>
              
                 <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Change Password</h6>
              <form method="POST" enctype="multipart/form-data" >
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-alternative" required>
                  </div>
                </div> 
                <button class="btn btn-primary pt-2 pb-2" name="update_password">Change Password</button>
             </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include("include/footer.php");?>
    </div>
    <?php    
    break;}?>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="assets/js/main.js"></script>
   <script>
    $(document).ready(function(){  
    /* $(document).load( function(){  
      
          
           $('.custom-file-label').html(data.logo); 
                     $('#preview_website').attr('src', '../images/'+data.logo);
   
      });*/
       $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
            $('#preview_profile').attr('src', './images/'+fileName);
            $('#preview_profile').attr('src', './images/'+data.image);
        });

      
     

       });

    </script>
</body>

</html>