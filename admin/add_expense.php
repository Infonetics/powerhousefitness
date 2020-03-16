<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Add Expense
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add Expense</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Add Expense</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
              	<?php

                      if(isset($_POST["btn_save"]))
                      {
                        extract($_POST);   
                         // include("image_validation.php"); 
                          // $_FILES["image"]=$_FILES["bill_file"];
                         // print_r($response);
                         // if($response['type'] == 'error')
                         // {
                         //  // echo $response['message'];
                         // }
                         // else
                         // {    


                          $image = $_FILES['bill_file']['name'];
                          $target = "../images/".basename($image);
                          if (move_uploaded_file($_FILES['bill_file']['tmp_name'], $target)) 
                          {
                            @unlink("../images/".$_POST['old_image']);
                            $msg = "Image uploaded successfully";
                          }
                          else
                          {
                            $msg = "Failed to upload image";
                          }
                          // $image_title=$_POST['image_title'];



                           /*$image = $_FILES['image']['name'];
                           $target = "../images/".basename($image);*/
                          /* $image = $_FILES['bill_file']['name'];
                           // $target_dir = "../images/";
                           $image_file = basename($_FILES["bill_file"]["name"]);
                         
                          if(!empty($image_file))
                          {
                             $target_file = $target_dir . basename($_FILES["bill_file"]["name"]);
                            if (move_uploaded_file($_FILES["bill_file"]["tmp_name"], $target_file))
                            { } 
                          else {
                             //echo "Sorry, there was an error uploading your image file.";
                          }
                        }*/

                         $sql = "INSERT INTO `".DB_PREFIX."`.`tbl_expense` (item_name, purchase_shop_name, purchase_date,price,bill,created_on)
                         VALUES ('$item_name', '$purchase_shop_name','$purchase_date', '$price','$image',NOW())";
                       if ($con->query($sql) === TRUE) {
                         
                            $_SESSION['success']='Record Successfully Added';
                            
                           ?>
                      <script type="text/javascript">
                      window.location="view_expense.php";
                      </script>
                      <?php
                      } else {
                         
                            $_SESSION['error']='Something Went Wrong';
                      ?>
                      <script type="text/javascript">
                      window.location="view_expense.php";
                      </script>
                      <?php
                      }
                    // }
                      }

                      ?>
                <form class="form-horizontal"  method="POST" name="userform" enctype="multipart/form-data" style="margin:auto;width:60%;">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Item Name</label>
                                                <div class="col-md-8">
                                                  <input type="text" name="item_name" class="form-control" onkeypress="return isAlfa(event)"  placeholder="Item Name"  required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Purchase From</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="purchase_shop_name" placeholder="Purchase Shop Name"  onkeypress="return isAlfa(event)"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Purchase Date</label>
                                                <div class="col-md-8">
                                                    <input type="date" name="purchase_date" placeholder="Purchase Date"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Price</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="price" placeholder="Price"  class="form-control" onkeypress="return isNumber(event)" required>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Bill</label>
                                                <div class="col-md-8">
                                                    <input type="file" name="bill_file" id="bill_file" class="form-control" required>
                                                     
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
   <script src="assets/js/main.js"></script>
</body>

</html>