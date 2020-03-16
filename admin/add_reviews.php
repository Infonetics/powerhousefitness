<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Add Testimonials
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add Reviews</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Add Reviews</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
              	<?php

            if(isset($_POST["btn_customer"]))
            {
               
                    extract($_POST);
                    include("image_validation.php");
               // print_r($response);
               if($response['type'] == 'error')
               {
                // echo $response['message'];
                
                 
               }
               else
               {
                    $image = $_FILES['image']['name'];
                    $target = "../images/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }


                    $customer_name=$_POST['customer_name'];
                    $position=$_POST['position'];
                    $desc=trim(addslashes($_POST['description']));

                    $sql="INSERT INTO `".DB_PREFIX."`.`tbl_testimonials` (`customer_name`, `customer_position`, `description`,`image`,`created_on`) values ('".trim($customer_name)."','".trim($position)."','".trim(addslashes($desc))."','".trim($image)."',NOW())";
                    //echo $sql;exit;
                    if ($con->query($sql) === TRUE) {
                      $_SESSION['success']='Testimonials Successfully Updated';
                    ?>
                 <script type="text/javascript">
                window.location="view_testimonials.php";
                </script> 
                <?php
                } else {
                      $_SESSION['error']='Something Went Wrong';
                ?>
                 <script type="text/javascript">
                window.location="view_testimonials.php";
                </script>
                <?php
                }
            }
              }
            ?>
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Customer Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Customer Name" name="customer_name" onkeypress="return isAlfa(event)" class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Position</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Position" name="position" onkeypress="return isAlfa(event)" class="form-control" required>
                                                </div>
                                               
                                            </div>
                                        </div>
                                         
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Description</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" rows="6" placeholder="Description" name="description" style="margin-top: 0px; margin-bottom: 0px; height: 74px;" required=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Photo</label>
                                                <div class="col-md-8">
                                                     <input type="file" class="custom-file-input" id="image" name="image" lang="en" required>
                                                    <label class="custom-file-label" for="customFileLang">Upload Photo</label>
                                                     <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_customer" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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