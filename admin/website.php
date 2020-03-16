<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Manage Website
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Manage Website</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <?php
      if(isset($_POST["btn_web"])) {
        extract($_POST);
        $_FILES["image"]= $_FILES["website_image"];
         include("image_validation.php");
         if($response['type'] == 'error')   {   
         }  else {
              $website_logo = basename($_POST["website_img"]);
              $target = "../images/".basename($website_logo);
              $image = $target . basename($_POST["website_img"]);
              if (move_uploaded_file($_POST["website_img"], $target)) {
                  @unlink("../images/".$_POST['old_website_image']);
              } else {
                  echo "Sorry, there was an error uploading your file.";
              }
              $q1="UPDATE `".DB_PREFIX."`.`manage_website` SET `title`='".trim($title)."',`website_name`='".trim($website_name)."',`logo`='".trim($website_logo)."',`currency_code`= '".trim($currency_code)."',`contact`= '".trim($contact)."',`email`='".trim($email)."',`whatsapp_no`='".trim($whatsapp_no)."',`facebook_link`='".trim($facebook_link)."',`instagram_link`='".trim($instagram_link)."',`open_hours`='".trim($open_hours)."',`open_hours1`='".trim($open_hours1)."',`address`='".trim($address)."',`happy_customers`='".trim($happy_customers)."',`perfect_bodies`='".trim($perfect_bodies)."',`working_hours`='".trim($working_hours)."',`success_stories`='".trim($success_stories)."'";
              if ($con->query($q1) === TRUE) {
                    $_SESSION['success']='Record Successfully Updated'; ?>
                    <script type="text/javascript">
                      window.location = "website.php";
                    </script>
                    <?php 
              } else {
                $_SESSION['error']='Something Went Wrong';
              }
         }
      }
      $que="select * from `".DB_PREFIX."`.`manage_website";
      $query=$con->query($que);
      while($row=mysqli_fetch_array($query))
      {
        extract($row);
      }
      ?> 
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Manage Website</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="width: 80%;margin:auto;">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  value="<?php echo $title;?>"  name="title" class="form-control" onkeypress="return isAlfa(event)" >
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Website Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  value="<?php echo $website_name;?>"  name="website_name" class="form-control" onkeypress="return isAlfa(event)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Email_id</label>
                                                <div class="col-sm-9">
                                                    <input type="email"  value="<?php echo $email;?>"  name="email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Contact Number</label>
                                                <div class="col-sm-9">
                                                    <input type="tel" name="contact"  maxlength="12" value="<?php echo $contact;?>" class="form-control" onkeypress="return isNumber(event)" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Whatsapp Number</label>
                                                <div class="col-sm-9">
                                                    <input type="number"  value="<?php echo $whatsapp_no;?>"  name="whatsapp_no" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Facebook Link</label>
                                                <div class="col-sm-9">
                                                    <input type="link"  value="<?php echo $facebook_link;?>"  name="facebook_link" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Instagram Link</label>
                                                <div class="col-sm-9">
                                                    <input type="link"  value="<?php echo $instagram_link;?>"  name="instagram_link" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Open Hours</label>
                                                <div class="col-sm-5">
                                                    <input type="text"  value="<?php echo $open_hours;?>"  name="open_hours" class="form-control" required>
                                                 </div>
                                                   <div class="col-sm-4">
                                                    <input type="text"  value="<?php echo $open_hours1;?>"  name="open_hours1" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Happy Customers</label>
                                                <div class="col-sm-9">
                                                    <input type="number"  value="<?php echo $happy_customers;?>"  name="happy_customers" class="form-control" maxlength="7" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Perfect Bodies</label>
                                                <div class="col-sm-9">
                                                     <input type="number"  value="<?php echo $perfect_bodies;?>"  name="perfect_bodies" class="form-control"  maxlength="7" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Working Hours</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  value="<?php echo $working_hours;?>"  name="working_hours" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Success Stories</label>
                                                <div class="col-sm-9">
                                                    <input type="number"  value="<?php echo $success_stories;?>"  name="success_stories" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                           <label class="col-sm-3 control-label">Address</label>
                                            <div class="col-sm-9">
                                       		 <textarea class="textarea_editor form-control" name="address" <?php echo $address;?> rows="3" placeholder="Enter text ..."  required><?php echo $address;?></textarea>
                                      		</div>
                                        </div>
                                    	</div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Currency Code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $currency_code;?>"  name="currency_code" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Website Logo</label>
                                                <div class="col-sm-9">
				                                  <!-- <image class="profile-img" src="uploadImage/Logo/<?=$logo?>" style="height:35%;width:25%;" required> -->
				                                  <!-- <input type="hidden" value="<?=$website_logo?>" name="old_website_image">
				                                  <input type="file" class="form-control" name="website_image" required>
 -->
				                                   <input type="file" class="custom-file-input" id="website_image" name="website_image" lang="en" title="<?=$logo?>" >
                                                      <img id="preview_website" name="preview_website" src="../images/<?=$logo?>" height="50" width="100"/>
                                                      <input type="hidden" id="website_img" name="website_img" value="<?=$logo?>"/>
                                                      <label class="custom-file-label" for="customFileLang"><?php if($logo){ echo $logo;}else { echo "Upload Photo";} ?></label>
                                                       <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?>
                                                </div>
                                            </div>
                                        </div>  
                                        <button type="submit" name="btn_web" id="btn_web" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
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
  	/* $(document).load( function(){  
      
					
					 $('.custom-file-label').html(data.logo); 
                     $('#preview_website').attr('src', '../images/'+data.logo);
   
      });*/
      
       
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