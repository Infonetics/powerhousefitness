<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Add User
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add User</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Add User</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
              	<?php

                if(isset($_POST["btn_save"]))
                      {
                            

                $passw = hash('sha256', $_POST['password']);
                function createSalt()
                {
                    return '2123293dsj2hu2nikhiljdsd';
                }
                $salt = createSalt();
                $pass = hash('sha256', $salt . $passw);

                $image = $_FILES['image']['name'];
                $target = "../uploadImage/Profile/".basename($image);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                 // @unlink("uploadImage/Profile/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }
                extract($_POST);
                   $sql = "INSERT INTO admin (username, email,password, fname, lname, gender,  dob,contact,    address,created_on,image,group_id)VALUES ('user', '$email','$pass', '$fname', '$lname', '$gender', '$dob', '$contact', '$address','$current_date','$image','$group_id')";
                 if ($con->query($sql) === TRUE) {
                      $_SESSION['success']=' Record Successfully Added';
                     ?>
                <script type="text/javascript">
                window.location="../view_user.php";
                </script>
                <?php
                } else {
                      $_SESSION['error']='Something Went Wrong';
                ?>
                <script type="text/javascript">
                window.location="../view_user.php";
                </script>
                <?php } } ?>
                <form class="form-horizontal" method="POST" action="pages/save_person.php" name="userform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">First Name</label>
                                                <div class="col-md-9">
                                                  <input type="text" name="fname" class="form-control" placeholder="First Name" id="event" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Last Name</label>
                                                <div class="col-md-9">
                                                    <input type="text"  name="lname" id="lname" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="Last Name" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password" placeholder="Password"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Gender</label>
                                                <div class="col-md-9">
                                                   <select name="gender" id="gender" class="form-control" required="">
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-md-3 control-label">Date Of Birth</label>
                                                <div class="col-md-9">
                                                  <input type="date" name="dob" class="form-control" placeholder="Birth Date">
                                                </div>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Contact</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="contact" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Address</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" rows="4" name="address" placeholder="Address" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Group</label>
                                                <div class="col-md-9">
                                                   <select name="group_id" id="group_id" class="form-control" required="">
                                                    <option value=" ">--Select Group--</option>
                                                     <?php  
                          $sql2 = "SELECT * FROM tbl_group where id!=1";
                          $result2 = $con->query($sql2); 
                          while($row2= mysqli_fetch_array($result2)){
                        ?>
                        <option value ="<?php echo $row2['id'];?>"><?php echo $row2['name'];?> </option>
                      <?php } ?>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Image</label>
                                                <div class="col-md-9 image">
                          <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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
  
</body>

</html>