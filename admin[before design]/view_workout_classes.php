
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    View Workout Classes
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View Workout Classes</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View Workout Classes</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Title</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Description</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 137px;">Image</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Title</th><th rowspan="1" colspan="1">Description</th><th rowspan="1" colspan="1">Image</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                  <?php

//error_reporting(0);
if(isset($_POST['update']))
      {
      extract($_POST);
 //echo "<pre>";print_r($_POST); exit;
        // include("image_validation.php");
               // print_r($response);
               // if($response['type'] == 'error')
               // {
               //  // echo $response['message'];
                
                 
               // }
               // else
               // {
                    $image = $_POST['workout_image'];
                    $target = "../images/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }
            $ql= "UPDATE `tbl_workout_classes` SET `title`= '".trim($title)."',`short_desc`= '".trim(addslashes($short_description))."',`image`='".trim($image)."',`last_modified`=NOW() WHERE `workout_classes_id`='$workout_classes_id'";
            //echo $ql;exit;

            if ($con->query($ql) === TRUE) {
                $_SESSION['success']='Workout Classes Successfully Updated';
                ?>
                                          <script type="text/javascript">
                                          window.location="view_workout_classes.php";
                                          </script>
                                        <?php
            }
          // }
  }
?>
                   <?php 
                                         
                                          $sql = "SELECT * FROM tbl_workout_classes";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['title']; ?></td>
                                                <td class="td_desc"><?php echo $row['short_desc']; ?></td>
                                               
                                                <td><img  src="../images/<?php echo $row['image']; ?>" onerror=this.src="images/profile_image.png" style="height:100px;width:100px;"></td>
                                             
                                                 <td>
                                                    <!-- <button onclick="myFunction()" type="button" class="btn btn-xs btn-primary" >
                                                      <i class="fa fa-pen"></i>
                                                    </button>
                                                    <button onclick="myFunction()" type="button" class="btn btn-xs btn-danger" >
                                                          <i class="fa fa-trash"></i>
                                                    </button> 
                                                    <button onclick="myFunction()" type="button" class="btn btn-xs btn-success" >
                                                      <i class="fa fa-eye"></i>
                                                    </button> -->
                                                    <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["workout_classes_id"]; ?>" data-sfid='"<?php echo $row['workout_classes_id'];?>"'><i class="fa fa-pen fa-xs"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['workout_classes_id'];?>"' ><i class="fa fa-trash fa-xs"></i></a> 
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
                       <h4 class="modal-title">Update Workout Classes</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="trainer_update">  
                                     <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-6 control-label">Title</label>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Title" name="title" id="title" class="form-control" onKeyPress="return isAlfa(event)" required>
                                                </div>
                                                
                                            </div>
                                        </div>

                                     
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-6 control-label">Short Description</label>
                                                <div class="col-md-6">
                                                    <!-- <input type="text" placeholder="Address" name="address" class="form-control"> -->
                                                    <textarea class="form-control" rows="6" placeholder="Short Description" name="short_description" id="short_description" style="margin-top: 0px; margin-bottom: 0px; height: 74px;" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-6 control-label">Upload Photo</label>
                                                <div class="col-md-6">
                                                    <input type="file" class="custom-file-input" id="image" name="image" lang="en" >
                                                     <img id="preview_workout" name="preview_workout" src="" height="50" width="100"/>
													                          <input type="hidden" id="workout_image" name="workout_image" value=""/>
                                                    <label  class="custom-file-label" for="customFileLang">Upload Photo</label>
                                                    <!--  <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?> -->
                                                </div>
                                            </div>
                                        </div>
                                       
                                      <input type="hidden" name="workout_classes_id" id="workout_classes_id" />  
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
           var workout_classes_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{workout_classes_id:workout_classes_id},  
                dataType:"json",  
                success:function(data){  
                     $('#title').val(data.title);  
                     $('#short_description').val(data.short_desc); 
                     // $('#description').val(data.description);  
                     //$('#image').attr('src',data.image); 
                     $('.custom-file-label').html(data.image); 
					 $('#workout_image').val(data.image);
                     $('#preview_workout').attr('src', '../images/'+data.image);
					 $('#image').attr('title',data.image);
                     //$('#hidden_input_file').val(data.image);
                     //$( 'data.image' ).insertAfter( "#image" );
                     $('#workout_classes_id').val(data.workout_classes_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_workout_classes_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_workout_classes_id:del_workout_classes_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            window.location.reload();
      });  
	      $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
			$('#workout_image').val(fileName);
			$('#image').attr('title',fileName);
            $('#preview_workout').attr('src', '../images/'+fileName);
        });
      
      });
    </script>
 
</body>

</html>