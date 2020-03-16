<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Manage Admin Panel
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Admin Panel</a>
    <!-- Header -->
<?php
if(isset($_POST["btn_web"]))
{
          extract($_POST);
          $_FILES["image"]=$_FILES["website_image"];
          include("image_validation.php");
          if($response['type'] == 'error'){
          } else {
              $website_logo = basename($_POST["website_img"]);
              $target = "./images/".basename($website_img);
              $image = $target . basename($_POST["website_img"]);
                   if (move_uploaded_file($_FILES['website_image']['tmp_name'], $target))    { 
                   }  else  {
                      echo "Sorry, there was an error uploading your file.";
                   }
              $q1="UPDATE `admin_panel` SET `title`='$title',`short_title`='$short_title',`logo`='$website_logo',`currency_code`= '$currency_code'";
              if($con->query($q1) === TRUE) {
                   $_SESSION['success']='Record Successfully Updated';
                ?>
              <script type="text/javascript">
                  window.location = "admin_panel.php";
              </script>
              <?php 
                } else {
                      $_SESSION['error']='Something Went Wrong';
                }
            }
}
$que="select * from admin_panel";
$query=$con->query($que);
while($row=mysqli_fetch_array($query))
{
  extract($row);
  $title = $row['title'];
  $short_title = $row['short_title'];
  $currency_code = $row['currency_code'];
  $website_logo = $row['logo'];
  $login_logo = $row['login_logo'];
} ?> 
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Admin Panel</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
              
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="width: 100%;">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Title</label>
                                                <div class="col-md-9">
                                                    <input type="text"  value="<?php echo $title;?>"  name="title"  class="form-control" onkeypress="return isAlfa(event)" required>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Short Title</label>
                                                <div class="col-md-9">
                                                    <input type="text"  value="<?php echo $short_title;?>"  name="short_title" onkeypress="return isAlfa(event)"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Currency Code</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $currency_code;?>"  name="currency_code" onkeypress="return isAlfa(event)" required >
                                                </div>
                                            </div>
                                        </div>
 
                                           <div class="form-group">
                                            <div class="row" style="margin:auto;">
                                                <label class="col-md-3 control-label">Website Logo</label>
                                                <div class="col-md-9">
                                                <input type="file" class="custom-file-input" id="website_image" name="website_image" lang="en" title="<?=$logo?>" >
                                                <img id="preview_website" name="preview_website" src="./images/<?=$logo?>" height="50" width="100"/>
                                                <input type="hidden" id="website_img" name="website_img" value="<?=$logo?>"/>
                                                <label class="custom-file-label" for="customFileLang"><?php if($logo){ echo $logo;}else { echo "Upload Photo";} ?></label>
                                                 <?php if(isset($response["image"])){ ?><p style="color: red;font-size: 13px;"> <?php   echo $response["message"]; }?><?php if(isset($existing)){ ?><br><?php echo $existing; }?></p>
                                                </div>
                                            </div>
                                        </div>  
                                        <button type="submit" name="btn_web" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
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
   <script>
    $(document).ready(function(){         
       $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
            $('#website_img').val(fileName);
            $('#website_image').attr('title',fileName);
            $('#website_image').attr('src', '../images/'+fileName);
            $('#preview_website').attr('src', '../images/'+fileName);
        });
  });
  </script>
</body>
</html>