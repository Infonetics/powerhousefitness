
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    View Reviews
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
  <style> 

  </style>
</head>

<body class="">
  <?php include("include/sidebar.php");?>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View Reviews</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View Reviews</h3>
            </div>
            <div class="card-body">
              
               <!--  ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Name</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Photo</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Position</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Description</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Photo</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Description</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                  <?php
// session_start();
//error_reporting(0);
if(isset($_POST['update']))
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
                     $image = $_POST['testimonials_image'];
                    $target = "../images/".basename($image);
                    echo $image;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }

            $ql= "UPDATE `tbl_testimonials` SET `customer_name`= '".trim($customer_name)."',`customer_position`= '".trim($position)."',`description`='".trim(addslashes($description))."',`image`='".trim($image)."' WHERE `testimonials_id`='$testimonials_id'";
           //echo $ql;exit;

            if ($con->query($ql) === TRUE) {
                $_SESSION['success']='Testimonials Successfully Updated';
                 ?>
                                          <script type="text/javascript">
                                          window.location="view_testimonials.php";
                                          </script>
                                        <?php
            }
          }
  }
?>
                   <?php 
                                         
                                           $sql = "SELECT * FROM tbl_testimonials";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['customer_name']; ?></td>
                                                <td><img  class="rounded-circle" src="../images/<?php  echo $row['image']; ?>" onerror=this.src="images/profile_image.png" style="height:100px;width:100px;"></td>
                                                <td><?php echo $row['customer_position']; ?></td>
                                                <td class="td_desc"><?php echo $row['description']; ?></td>
                                                <td>
                                              <!--  <a class="btn update btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["testimonials_id"]; ?>" data-sfid='"<?php echo $row['testimonials_id'];?>"' ><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['testimonials_id'];?>"' data-toggle="modal"><i class="fa fa-trash"></i></a> -->
                                             
                                                    <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["testimonials_id"]; ?>" data-sfid='"<?php echo $row['testimonials_id'];?>"'><i class="fa fa-pen fa-xs"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['testimonials_id'];?>"' ><i class="fa fa-trash fa-xs"></i></a> 
                                                   
                                              
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
    <div id="add_data_Modal" class="modal">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">Update Testimonials</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body" id="testimonials_update">  
                     <form method="post" id="insert_form" enctype="multipart/form-data" id="insert_form">  
                           
                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label">Customer Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="Customer Name" name="customer_name" id="customer_name" onKeyPress="return isAlfa(event)" class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label">Position</label>
                                                <div class="col-sm-4">
                                                    <input type="text" placeholder="Position" name="position" id="position" onKeyPress="return isAlfa(event)" class="form-control" required>
                                                </div>
                                               
                                            </div>
                                        </div>
                                         
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label">Description</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" rows="6" placeholder="Description" name="description" id="description" style="margin-top: 0px; margin-bottom: 0px; height: 74px;" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                       <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label">Upload Photo</label>
                                                <div class="col-sm-8">
                                                   <input type="file" class="custom-file-input" id="image" name="image" lang="en">
                                                      <img id="preview_testimonials" name="preview_testimonials" src="" height="50" width="100"/>
													                           <input type="hidden" id="testimonials_image" name="testimonials_image" value=""/>
                                                      <label class="custom-file-label" for="customFileLang">Upload Photo</label> -->
                                                    <!-- <input type="file" class="form-control-file" name="image" id="image" class="form-control" > -->
                                                <!-- </div>
                                            </div>
                                        </div> -->
                                         <div class="form-group">
                                                  <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="image" name="image" lang="en">
                                                      <img id="preview_testimonials" name="preview_testimonials" src="" height="50" width="100"/>
                                                      <input type="hidden" id="testimonials_image" name="testimonials_image" value=""/>
                                                      <label class="custom-file-label" for="customFileLang">Upload Photo</label>
                                                        <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?>
                                                  </div>
                                          </div>
                                    <input type="hidden" name="testimonials_id" id="testimonials_id" />  
                                    <input type="submit" name="update" id="update" value="Update" class="btn btn-success" /> 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
    </div>
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
           var testimonials_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{testimonials_id:testimonials_id},  
                dataType:"json",  
                success:function(data){  
                     $('#customer_name').val(data.customer_name);  
                     $('#position').val(data.customer_position); 
                     $('#description').val(data.description);  
                     // $('#image').attr('src',data.image); 
                     $('.custom-file-label').html(data.image); 
					           $('#testimonials_image').val(data.image);
                     $('#preview_testimonials').attr('src', '../images/'+data.image);
					           $('#image').attr('title',data.image);
                     //$('#hidden_input_file').val(data.image);
                     //$( 'data.image' ).insertAfter( "#image" );
                     $('#testimonials_id').val(data.testimonials_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_testimonials_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_testimonials_id:del_testimonials_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            window.location.reload();
      });  
	   $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
			      $('#testimonials_image').val(fileName);
			      $('#image').attr('title',fileName);
            $('#image').attr('src', '../images/'+fileName);
            $('#preview_testimonials').attr('src', '../images/'+fileName);
        });
      
      });
/*$(document).ready(function() {
    var table = $('#datatable-basic').DataTable( {
        destroy:        true,
       scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
       paging:         true,
        columnDefs: [
            { width: '50%', targets: 0 }
        ],
        fixedColumns: true
    } );
} );*/
    </script>
 
</body>

</html>