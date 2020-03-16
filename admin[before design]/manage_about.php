<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Manage About Us
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Manage About Us</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0"> Manage About Us</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
              	<?php

            if(isset($_POST["btn_manage_about"]))
            {
               
                    extract($_POST);
                    //echo "df<pre>";print_r($_POST);
                  //echo "df<pre>";print_r($_FILES); exit;
                   

                   include("image_validation.php");

            // echo "<pre>";print_r($response);exit;
               if($response['type'] == 'error')
               {
                // echo $response['message'];
                
                 
               }
               else
               {
                    $video_bg_image = $_POST['video_bg_img'];
                    $target = "../images/".basename($video_bg_image);
                    if (move_uploaded_file($_FILES['video_bg_image']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }

                     
                      
                    $video = $_POST['upload_video'];
                    $target = "../images/".basename($video);
                    if (move_uploaded_file($_FILES['video']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }



                    $image1 = $_POST['img1'];
                    $target = "../images/".basename($image1);

                    if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }


                    $image2 = $_POST['img2'];
                    $target = "../images/".basename($image2);

                    if (move_uploaded_file($_FILES['image2']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }



                    $image3 = $_POST['img3'];
                    $target = "../images/".basename($image3);

                    if (move_uploaded_file( $_FILES['image3']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }
                   

                    

                    $sql="UPDATE `tbl_manage_about`  SET `aboutus_content` ='$aboutus_content',`video_bg_image`='$video_bg_image',`video`='$video',`image1`='$image1',`image2`='$image2',`image3`='$image3' WHERE `manage_about_id`=1";
                   //echo  $sql;exit;
                    if ($con->query($sql) === TRUE) {
                            $_SESSION['success']='About US Successfully Updated';
                          ?>
                         <script type="text/javascript">
                          window.location="manage_about.php";
                          </script>
                      <?php
                    } else {
                      $_SESSION['error']='Something Went Wrong';
                    ?>
                     <script type="text/javascript">
                    window.location="manage_about.php";
                    </script> 
                    <?php
                    }
                }  
              }

$que="select * from tbl_manage_about";
$query=$con->query($que);
while($row1=mysqli_fetch_array($query))
{
 
  extract($row1);
 
}

?> 
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;">
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">  Content</label>
                                                <div class="col-md-8">
                                                    <textarea placeholder="About Us Content" name="aboutus_content" rows="8" class="form-control" required><?php echo $aboutus_content;?></textarea>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Video Background Image</label>
                                                <div class="col-md-8">
                                                    <input type="file" class="custom-file-input" name="video_bg_image" id="video_bg_image" title="<?=$video_bg_image?>" accept="video">
                                    
                                                     <img id="preview_video_bg_image" name="preview_video_bg_image" src="../images/<?=$video_bg_image?>" height="50" width="100"/>
                                                        <input type="hidden" id="video_bg_img" name="video_bg_img" value="<?=$video_bg_image?>"/>
                                                      <label class="custom-file-label" id="label_video_bg_image" for="customFileLang">
                                                        <?php if(isset($video_bg_image)){ echo $video_bg_image;}else { echo "Upload Photo";} ?></label>
                                                    <?php if(isset($response["video_bg_image"])){ ?>    <p style="color: red;font-size: 13px;"> <?php   echo $response["video_bg_image"]["message"]; }?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Video</label>
                                                <div class="col-md-8">
                                                    <input type="file" class="custom-file-input" name="video" id="video" title="<?=$video?>">
                                                   <video width="200" height="100" controls>
                                                      <source src="../images/<?=$video; ?>" type="video/mp4" style="height:100px;width:100px;">
                                                    </video>
                                                    <input type="hidden" id="upload_video" name="upload_video" value="<?=$video?>"/>
                                                      <label class="custom-file-label" id="label_video" for="customFileLang">
                                                        <?php if(isset($video)){ echo $video; }else { echo "Upload Photo";} ?></label>
                                                       <?php if(isset($response["video"])){ ?> <p style="color: red;font-size: 13px;"> <?php   echo $response["video"]["message"]; }?></p>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Image1</label>
                                                <div class="col-md-8">
                                                   
                                                     <input type="file" class="custom-file-input" name="image1" id="image1" title="<?=$image1?>">
                                    
                                                     <img id="preview_image1" name="preview_image1" src="../images/<?=$image1?>" height="50" width="100"/>
                                                      <input type="hidden" id="img1" name="img1" value="<?=$image1?>"/>
                                                      <label class="custom-file-label" id="label_image1" for="customFileLang">
                                                        <?php if(isset($image1)){ echo $image1; }else { echo "Upload Photo";} ?></label>
                                                        <?php if(isset($response["image1"])){ ?> <p style="color: red;font-size: 13px;"> <?php   echo $response["image1"]["message"]; } ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Image2</label>
                                                <div class="col-md-8">
                                                    <input type="file" class="custom-file-input" name="image2" id="image2" title="<?=$image2?>">
                                    
                                                     <img id="preview_image2" name="preview_image2" src="../images/<?=$image2?>" height="50" width="100"/>
                                                      <input type="hidden" id="img2" name="img2" value="<?=$image2?>"/>
                                                      <label class="custom-file-label" for="customFileLang">
                                                        <?php if(isset($image2)){ echo $image2;}else { echo "Upload Photo";} ?></label>
                                                       <?php if(isset($response["image2"])){ ?> <p style="color: red;font-size: 13px;"> <?php   echo $response["image2"]["message"]; }?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Image3</label>
                                                <div class="col-md-8">
                                                  <input type="file" class="custom-file-input" name="image3"  id="image3" title="<?=$image3?>">
                                    
                                                    <img id="preview_image3" name="preview_image3" src="../images/<?=$image3?>" height="50" width="100"/>
                                                      <input type="hidden" id="img3" name="img3" value="<?=$image3?>"/>
                                                      <label class="custom-file-label" for="customFileLang">
                                                        <?php if(isset($image3)){ echo $image3;}else { echo "Upload Photo";} ?></label>
                                                        <?php if(isset($response["image3"])){ ?><p style="color: red;font-size: 13px;"> <?php   echo $response["image3"]["message"];} ?></p>
                                                </div> 
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_manage_about" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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
    $('input[type="file"][name="video_bg_image"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#label_video_bg_image').html(fileName); 
            $('#video_bg_img').val(fileName);
            $('#image').attr('title',fileName);
            $('#preview_video_bg_image').attr('src', '../images/'+fileName);
        });
     $('input[type="file"][name="video"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#label_video').html(fileName); 
            $('#upload_video').val(fileName);
            $('#video').attr('title',fileName);
            $('source').attr('src', '../images/'+fileName);
            //$("#div Video video")[0].load();
        });
     $('input[type="file"][name="image1"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#label_image1').html(fileName); 
            $('#img1').val(fileName);
            $('#image1').attr('title',fileName);
            $('#preview_image1').attr('src', '../images/'+fileName);
        });
      $('input[type="file"][name="image2"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#label_image2').html(fileName); 
            $('#img2').val(fileName);
            $('#image2').attr('title',fileName);
            $('#preview_image2').attr('src', '../images/'+fileName);
        });
       $('input[type="file"][name="image3"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#label_image3').html(fileName); 
            $('#img3').val(fileName);
            $('#image3').attr('title',fileName);
            $('#preview_image3').attr('src', '../images/'+fileName);
        });
  </script>

</body>

</html>