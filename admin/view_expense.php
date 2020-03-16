<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    View Expense
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View Expense</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View Expense</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Item Name</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Photo</th><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Purchase From(Shop Name)</th><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Purchase Date</th><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Price</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Item Name</th><th rowspan="1" colspan="1">Photo</th><th rowspan="1" colspan="1">Purchase From(Shop Name)</th><th rowspan="1" colspan="1">Purchase Date</th><th rowspan="1" colspan="1">Price</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                   <?php 
              
            if(isset($_POST['update']))
                  {
                  extract($_POST);
             // echo "<pre>";print_r($_POST); 
             // include("image_validation.php");
                           // print_r($response);
               // if($response['type'] == 'error')
               // {
               //  // echo $response['message'];
                

               // }
               // else
               // {
                    $image = $_POST['expense_image'];
                    $target = "../images/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else{
                      $msg = "Failed to upload image";
                    }

                  $ql= "UPDATE `".DB_PREFIX."`.`tbl_expense` SET `item_name`= '$item_name',`purchase_shop_name`= '$purchase_shop_name',`purchase_date`='$purchase_date',`price`='$price',`bill`='$image',`last_modified`= NOW() WHERE `expense_id`='$expense_id'";
                      // echo $ql;exit;
                    // ,last_modified= NOW()
                    if ($con->query($ql) === TRUE) {
                      $_SESSION['success']='Trainer Successfully Updated';
                      ?>
                      <script type="text/javascript">
                            window.location="view_expense.php";
                            </script>
                     <?php // header('Location: view_expense.php');
                    }
                // }
              }

                                           $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_expense`";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['item_name']; ?></td>
                                                <td><img  src="../images/<?php  echo $row['bill']; ?>"  style="height:100px;width:100px;" onerror=this.src="uploadImage/profile/profile_image.png"></td>
                                                <td><?php echo $row['purchase_shop_name']; ?></td>
                                                <td><?php echo $row['purchase_date']; ?></td>
                                                <td>Rs.<?php echo $row['price']; ?></td>
                                                <td>
                                                  <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["expense_id"]; ?>" data-sfid='"<?php echo $row['expense_id'];?>"'><i class="fa fa-pen fa-xs"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['expense_id'];?>"' ><i class="fa fa-trash fa-xs"></i></a> 
                                                   
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
                       <h4 class="modal-title">Update Expense</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="trainer_update">  
                                       <form class="form-horizontal"  method="POST" name="userform" enctype="multipart/form-data" id="insert_form">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Item Name</label>
                                                <div class="col-md-8">
                                                  <input type="text" name="item_name" id="item_name" class="form-control" onkeypress="return isAlfa(event)"  placeholder="Item Name"  required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Purchase From</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="purchase_shop_name" id="purchase_shop_name" placeholder="Purchase Shop Name"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Purchase Date</label>
                                                <div class="col-md-8">
                                                    <input type="date" name="purchase_date" id="purchase_date" placeholder="Purchase Date"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Price</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="price" id="price" placeholder="Price"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label">Bill</label>
                                                <div class="col-md-8">
                                                    <!-- <input type="file" name="bill_file" id="bill_file" class="form-control" > -->
                                                    <!-- <input type="file" class="custom-file-input" id="image" name="image" lang="en">
                                                    <img id="preview_expense" name="preview_expense" src="" height="50" width="100"/> -->
                                                     <input type="file" class="custom-file-input" id="image" name="image" lang="en">
                                                      <img id="preview_expense" name="preview_expense" src="" height="50" width="100"/>
                                                      <input type="hidden" id="expense_image" name="expense_image" value=""/>
                                                      <label class="custom-file-label" for="customFileLang">Upload Photo</label>
                                                       <span style="color: red;font-size: 13px;"> <?php   echo $response["message"]; ?><br><?php echo $existing; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                         <input type="hidden" name="expense_id" id="expense_id" />  
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
   <script>
      
$(document).ready(function(){  
   
      $(document).on('click', '.edit_data', function(){  
           var expense_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{expense_id:expense_id},  
                dataType:"json",  
                success:function(data){  
                     $('#item_name').val(data.item_name);  
                     $('#purchase_shop_name').val(data.purchase_shop_name); 
                     $('#purchase_date').val(data.purchase_date);  
                     $('#price').val(data.price);

                     $('.custom-file-label').html(data.bill); 
                     $('#expense_image').val(data.bill);
                     $('#image').attr('src',data.bill);
                     $('#image').attr('title',data.bill); 
                     $('#preview_expense').attr('src', '../images/'+data.bill);
                     
          
                     //$('#hidden_input_file').val(data.image);
                     //$( 'data.image' ).insertAfter( "#image" );
                     $('#expense_id').val(data.expense_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_expense_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_expense_id:del_expense_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            window.location.reload();
      });  
       $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
            $('#expense_image').val(fileName);

            $('#image').attr('title',fileName);
            $('#image').attr('src', '../images/'+fileName);
            $('#preview_expense').attr('src','../images/'+fileName);
        });
        
      });
    </script>
 
</body>

</html>