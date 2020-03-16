<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Add Gallery
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Add Gallery</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Add Gallery</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
          <?php
            if(isset($_POST["btn_customer"])){
                    extract($_POST);                   
                    $image = $_FILES['image']['name'];
                    $target = "../images/".basename($image);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
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
                    if($video =='' && $image==''){
                          $msg = "Please Upload image or video";
                      }
                    $sql="INSERT INTO `".DB_PREFIX."`.`tbl_gallery` (`image_title`,`image`,`gallery_video`,`created_on`) values ('".trim($image_title)."','".trim($image)."','".trim($video)."',NOW())";
                   //echo $sql;exit;
                    if ($con->query($sql) === TRUE) {
                      $_SESSION['success']='Gallery Successfully Updated';
                    ?>
                <script type="text/javascript">
                window.location="view_gallery.php";
                </script>
                <?php
                } else {
                      $_SESSION['error']='Something Went Wrong';
                ?>
                <script type="text/javascript">
                window.location="view_gallery.php";
                </script>
                <?php
                }
              }
            ?>
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Image Title</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Image Title" name="image_title" onkeypress="return isAlfa(event)" class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Photo</label>
                                                <div class="col-md-8">
                                                    <input type="file" class="custom-file-input" id="image" name="image" lang="en" >
                                                    <label class="custom-file-label" id="label_image" for="customFileLang">Upload Photo</label>
                                                      <input type="hidden" id="gallery_img" name="gallery_img" value="<?=$logo?>"/>
                                                   <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="text-danger text-center font-weight-bold" >OR</div> 
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Video</label>
                                                <div class="col-md-8">
                                                    <input type="file" class="custom-file-input" name="video" id="video" title="<?=$video?>">
                                                   <video width="200" height="100" controls>
                                                      <source src="../images/<?=$video; ?>" type="video/mp4" style="height:100px;width:100px;">
                                                    </video>
                                                    <input type="hidden" id="upload_video" name="upload_video" value=""/>
                                                      <label class="custom-file-label" id="label_video" for="customFileLang">
                                                        </label>
                                                       <?php if(isset($response["video"])){ ?> <p style="color: red;font-size: 13px;"> <?php   echo $response["video"]["message"]; }?></p>
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
   <script>
   $(document).ready(function(){  
      $('input[type="file"][name="video"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#label_video').html(fileName); 
            $('#upload_video').val(fileName);
            $('#video').attr('title',fileName);
            $('source').attr('src', '../images/'+fileName);
            $('input[type="file"][name="image"]').val('');
            $('#label_image').html(''); 
            $('#gallery_img').val('');
        });
       $('input[type="file"][name="image"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#label_image').html(fileName); 
            $('#gallery_img').val(fileName);
            $('input[type="file"][name="video"]').val('');
            $('#label_video').html('');
            $('#upload_video').val('');
            $('#video').attr('title','');
            $('source').attr('src', '');
        });
       });
</script>
</body>
</html>