<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Add Membership Plans
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add Membership</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Add Membership</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">

              	<?php
                // include("include/config.php");
                if(isset($_POST["btn_member"]))
                {
                    extract($_POST);
                    $m_name=$_POST['membership_name'];
                    $price=$_POST['Price'];
                    $duration=$_POST['duration'];
                    $plan=$_POST['plan'];
                    // if($_POST['plan'] == "Membership"){  $plan=1;}else{  $plan=2;}
                    
                    $sql="INSERT INTO `".DB_PREFIX."`.`tbl_membership` (`name`,`price`,`duration`,`plan`,`applicable_for`,`short_desc`,`created_on`) values ('".trim($m_name)."','".trim($price)."','".trim($duration)."','".trim($plan)."','".trim($applicable_for)."','".trim($short_desc)."',NOW())";
                    // echo $sql;exit;
                    if ($con->query($sql) === TRUE) {
                      $_SESSION['success']=' Record Successfully Updated';
                    ?>
                    <script type="text/javascript">
                    window.location="view_membership.php";
                    </script>
                    <?php
                    } else {
                          $_SESSION['error']='Something Went Wrong';
                    ?>
                    <script type="text/javascript">
                    window.location="view_membership.php";
                    </script>
                    <?php
                  }
                }?>

                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;">
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Membership Name</label>
                      <div class="col-md-8">
                        <input type="text" placeholder="Membership Name" name="membership_name" id="membership_name" class="form-control" onkeypress="return isAlfa(event)" required>
                        <span class="error"><!-- <?php echo $membership_nameErr;?> --></span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Price</label>
                      <div class="col-md-8">
                        <input type="text" placeholder="Price" name="Price" onkeypress="return isNumber(event)" class="form-control" max="5" required>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Plan</label>
                      <div class="custom-control custom-radio mb-3">
                        <input type="radio" class="custom-control-input col-md-2 plan" name="plan" id="membership" value="1" required="">
                        <label class="custom-control-label" for="membership">Membership</label>
                      </div>

                       <div class="custom-control custom-radio mb-3">
                        <input type="radio" class="custom-control-input col-md-2 plan" name="plan" id="pt" value="2">
                        <label class="custom-control-label" for="pt">Personal Training</label>
                      </div>                       
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Duration</label>
                      <div class="col-md-8">
                        <input type="text" placeholder="Number  Day/Week/Month/Year" name="duration" onkeypress="return isAlphaNumeric(event)" class="form-control" required>Eg: 1 Month
                      </div>
                    </div>
                  </div>

                 
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Applicable For</label>

                      <div class="custom-control custom-radio mb-3">
                        <input type="radio" class="custom-control-input col-md-2" name="applicable_for" id="all" value="1" checked="">
                        <label class="custom-control-label" for="all">All</label>
                      </div>  

                      <div class="custom-control custom-radio mb-3">
                        <input type="radio" class="custom-control-input col-md-2" name="applicable_for" id="ladies" value="2">
                        <label class="custom-control-label" for="ladies">Ladies</label>
                      </div>

                      <div class="custom-control custom-radio mb-3">
                        <input type="radio" class="custom-control-input col-md-2" name="applicable_for" id="gents" value="3">
                        <label class="custom-control-label" for="gents">Gents</label>
                      </div>
                        
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Short Description</label>
                      <div class="col-md-8">
                        <!-- <input type="text" placeholder="Number  Day/Week/Month/Year" name="duration" onkeypress="return isAlphaNumeric(event)" class="form-control" required> -->
                        <textarea name="short_desc" id="short_desc" placeholder="Short Description" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>

                  <button type="submit" name="btn_member" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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
    i = 0;
    $(document).ready(function(){  
       $("#Price").keypress(function(){
           i += 1;
           if(i>5){
              return false;
           }
        });

    /*   $(document).on('click', '.plan', function(){  
           var del_membership_id = $(this).attr("data-delid");  
           if($(this).checked)
          
            
      });*/  

    });
 
  </script>
</body>
</html>