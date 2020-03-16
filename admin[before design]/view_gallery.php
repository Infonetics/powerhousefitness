<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    View Gallery
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.ico" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/css/select.bootstrap4.min.css">
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <?php include("include/sidebar.php");?>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View Gallery</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View Gallery</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Name</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Photo</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Photo</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                  <?php
// session_start();
//error_reporting(0);
if(isset($_POST['update']))
      {
      extract($_POST);
 //echo "<pre>";print_r($_POST); 
 // include("image_validation.php");  
               /*  if($response['type'] == 'error')
               {
                // echo $response['message'];
                
                 
               }
                 else
               {   */
                    $image = $_POST['gallery_image'];
                    $target = "../images/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }
            $ql= "UPDATE `tbl_gallery` SET `image_title`= '".trim($image_title)."',`image`= '".trim($image)."' WHERE `gallery_id`='$gallery_id'";
            //echo $ql;exit;

            if ($con->query($ql) === TRUE) {
                $_SESSION['success']='Gallery Image Successfully Updated';
                 ?>
                                          <script type="text/javascript">
                                          window.location="view_gallery.php";
                                          </script>
                                        <?php
               
            }
          // }
  }
?>
                   <?php 
                                         
                                           $sql = "SELECT * FROM tbl_gallery";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['image_title']; ?></td>
                                                <td><img  src="../images/<?php  echo $row['image']; ?>" onerror=this.src="images/profile_image.png" style="height:100px;width:100px;"></td>
                                                <td>
                                                    
                                                    <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["gallery_id"]; ?>" data-sfid='"<?php echo $row['gallery_id'];?>"'><i class="fa fa-pen fa-xs"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['gallery_id'];?>"' ><i class="fa fa-trash fa-xs"></i></a> 
                                             
                                               <!--   <a class="btn update btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["gallery_id"]; ?>" data-sfid='"<?php echo $row['gallery_id'];?>"' ><i class="fa fa-pencil"></i></a>
                                                
                                                <a class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['gallery_id'];?>"' data-toggle="modal"><i class="fa fa-trash"></i></a> -->
                                                
                                               <!-- <div id="snackbar">for Full sourcecode visit <a href="https://www.instamojo.com/minfospace/">Visit my Online Store</a><br>Thanks !</div> -->
                                              
                                                </td>
                                            </tr>
                                          <?php } ?></tbody>
              </table></div></div></div>
            </div>
          </div>

                <!-- -------- -->
              
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <!-- Footer -->
      <?php include("include/footer.php");?>
       <!-- ....modal start... -->
      <div id="add_data_Modal" class="modal">  
        <div class="modal-dialog">  
             <div class="modal-content">  
                  <div class="modal-header">  
                       <h4 class="modal-title">Update Gallery</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="trainer_update">  
                                      <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-5 control-label">Image Title</label>
                                                <div class="col-md-7">
                                                    <input type="text" placeholder="Image Title" name="image_title" id="image_title" onkeypress="return isAlfa(event)" class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-5 control-label">Upload Photo</label>
                                                <div class="col-sm-7">
                                                    <!-- <input type="file" class="form-control-file" name="image" id="image" class="form-control"> -->
                                                    <input type="file" class="custom-file-input" id="image" name="image" lang="en">
                                                      <img id="preview_gallery" name="preview_gallery" src="" height="50" width="100"/>
                                                      <input type="hidden" id="gallery_image" name="gallery_image" value=""/>
                                                      <label class="custom-file-label" for="customFileLang">Upload Photo</label>
                                                       <!--  <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?> -->
                                                </div>
                                            </div>
                                        </div>

                                         <input type="hidden" name="gallery_id" id="gallery_id" />  
                                        <input type="submit" name="update" id="update" value="Update" class="btn btn-success" /> 
                                    </form>

                  </div>  
                  <div class="modal-footer">  
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                  </div>  
             </div>  
        </div>  
      </div>
    <!-- ..modal end... -->
    </div>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/js/js.cookie.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/clipboard/dist/clipboard.min.js"></script>
  <script src="assets/vendor/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/vendor/js/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/vendor/js/buttons.html5.min.js"></script>
  <script src="assets/vendor/js/buttons.flash.min.js"></script>
  <script src="assets/vendor/js/buttons.print.min.js"></script>
  <script src="assets/vendor/js/dataTables.select.min.js"></script>
  <script src="assets/vendor/js/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/js/jquery-scrollLock.min.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="assets/vendor/js/argon.min.js"></script>
  <script src="assets/js/main.js"></script>
   <script>
      
$(document).ready(function(){  
   
      $(document).on('click', '.edit_data', function(){  
           var gallery_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{gallery_id:gallery_id},  
                dataType:"json",  
                success:function(data){  
                     $('#image_title').val(data.image_title);  
                     // $('#position').val(data.customer_position); 
                     // $('#description').val(data.description);

                     // $('#image').attr('src',data.image); 
                     $('.custom-file-label').html(data.image); 
                     $('#gallery_image').val(data.image);
                     $('#image').attr('title',data.image);
                     $('#preview_gallery').attr('src', '../images/'+data.image);
                     //$('#hidden_input_file').val(data.image);
                     //$( 'data.image' ).insertAfter( "#image" );
                     $('#gallery_id').val(data.gallery_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_gallery_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_gallery_id:del_gallery_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            window.location.reload();
      });
            $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
            $('#gallery_image').val(fileName);
            $('#image').attr('title',fileName);
            $('#image').attr('src', '../images/'+fileName);
            $('#preview_gallery').attr('src', '../images/'+fileName);
        // });

      
      });  
      
      });
    </script>
 
</body>

</html>