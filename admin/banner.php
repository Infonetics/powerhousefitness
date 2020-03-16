<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Banner
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Manage Banner</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Manage Banner</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
              	<?php

      if(isset($_POST['update']))
       {
      extract($_POST);
/* // echo "<pre>";print_r($_POST); 
include("image_validation.php");
               // print_r($response);
               if($response['type'] == 'error')
               {
                // echo $response['message'];
                
                 
               }
               else
               {
*/
                    $image = $_FILES['image']['name'];
                    $target = "../images/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }
            $ql= "UPDATE `".DB_PREFIX."`.`tbl_banner` SET `banner_title`= '$banner_title',`text1`= '$text1',`text2`='$text2',`text3`='$text3',`image`='$image' WHERE `banner_id`='$banner_id'";
            // echo $ql;exit;

            if ($con->query($ql) === TRUE) {
                $_SESSION['success']='Trainer Successfully Updated';
                // header('Location: banner.php');
            }
          // }
  }


            if(isset($_POST["btn_banner"]))
            {
               
                    extract($_POST);
                    /*include("image_validation.php");
               // print_r($response);
               if($response['type'] == 'error')
               {
                // echo $response['message'];
                
                 
               }
               else
               {*/
                    $image = $_FILES['image']['name'];
                    $target = "../images/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }


                    $image_title=$_POST['image_title'];
                  

                    $sql="INSERT INTO `".DB_PREFIX."`.`tbl_banner` (`banner_title`,`text1`,`text2`,`text3`,`image`,`created_on`) values ('$banner_title','$text1','$text2','$text3','$image',NOW())";
                   
                    if ($con->query($sql) === TRUE) {
                      $_SESSION['success']='Banner Successfully Updated';
                    ?>
                <script type="text/javascript">
                window.location="banner.php";
                </script>
                <?php
                } else {
                      $_SESSION['error']='Something Went Wrong';
                ?>
                <script type="text/javascript">
                window.location="banner.php";
                </script>
                <?php
                }
            // }
}
            ?>
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Banner Title</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Banner Title" name="banner_title" onkeypress="return isAlfa(event)"  class="form-control">
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Text 1</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Banner Text 1" name="text1" onkeypress="return isAlfa(event)"  class="form-control">
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Text 2</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Banner Text 2" name="text2"  onkeypress="return isAlfa(event)"  class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Text 3</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Banner Text 3" name="text3" onkeypress="return isAlfa(event)"  class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Photo</label>
                                                <div class="col-md-8">
                                                    <!-- <input type="file" class="form-control-file" name="image" class="form-control" required=> -->

                                                    <input type="file" class="custom-file-input" id="image" name="image" lang="en">
                                                    <!-- <img id="preview_banner" name="preview_banner" src="" height="50" width="100"/> -->
                                                    <label class="custom-file-label" for="customFileLang">Upload Photo</label>
                                                    <!-- <?php if(isset($response["image"])){ ?><p style="color: red;font-size: 13px;"> <?php   echo $response["message"]; }?><?php if(isset($existing)){ ?><br><?php echo $existing; }?></p> -->
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_banner" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>

              </div>
            </div>
                       <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Title</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Image</th><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 112px;">Text1</th><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 112px;">Text2</th><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 112px;">Text3</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Title</th><th rowspan="1" colspan="1">Image</th><th rowspan="1" colspan="1">Text1</th><th rowspan="1" colspan="1">Text2</th><th rowspan="1" colspan="1">Text3</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                   <?php 
                                         
                                           $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_banner`";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['banner_title']; ?></td>
                                                <td><img  src="../images/<?php  echo $row['image']; ?>" onerror=this.src="images/profile_image.png" style="height:100px;width:100px;"></td>
                                                <td><?php echo $row['text1']; ?></td>
                                                <td><?php echo $row['text2']; ?></td>
                                                <td><?php echo $row['text3']; ?></td>
                                                <td>
                                                    
                                                    <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["banner_id"]; ?>" data-sfid='"<?php echo $row['banner_id'];?>"'><i class="fa fa-pen"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['banner_id'];?>"' ><i class="fa fa-trash"></i></a> 
                                             
                                               
                                              
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
                       <h4 class="modal-title">Update Banner</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="trainer_update">  
                                       <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;" id="insert_form">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Banner Title</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Banner Title" name="banner_title" id="banner_title" onkeypress="return isAlfa(event)"  class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Text 1</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Banner Text 1" name="text1" id="text1" onkeypress="return isAlfa(event)"  class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Text 2</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Banner Text 2" name="text2" id="text2" onkeypress="return isAlfa(event)"  class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Text 3</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Banner Text 3" name="text3" id="text3" onkeypress="return isAlfa(event)"  class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Upload Photo</label>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control-file" name="image" id="image" class="form-control" required>

                                                    <!-- <input type="file" class="custom-file-input" id="image" name="image" lang="en" > -->
                                                    <img id="preview_banner" name="preview_banner" src="" height="50" width="100"/>
                                                    <!-- <label class="custom-file-label" for="customFileLang">Upload Photo</label> -->

                                                </div>
                                            </div>
                                        </div>

                                          <input type="hidden" name="banner_id" id="banner_id" />  
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
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/clipboard/dist/clipboard.min.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="assets/js/main.js"></script>
  <script>
   $(document).ready(function(){  
   
      $(document).on('click', '.edit_data', function(){  
           var banner_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{banner_id:banner_id},  
                dataType:"json",  
                success:function(data){  
                     $('#banner_title').val(data.banner_title);  
                     $('#text1').val(data.text1); 
                     $('#text2').val(data.text2); 
                     $('#text3').val(data.text3);  
                    
                     // $('input[name='gender']').checked(); 
                     // attr("checked") 
                     // $("#"+data.martial_status).checked();
                  

                     $('.custom-file-label').html(data.image); 
                     $('#preview_banner').attr('src', '../images/'+data.image);
                     
              
                     $('#banner_id').val(data.banner_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_banner_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_banner_id:del_banner_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            window.location.reload();
      });  
       $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
            $('#preview_banner').attr('src', '../images/'+fileName);
            $('#preview_banner').attr('src', '../images/'+data.image);
        });

      
      });
    </script>
</body>

</html>