<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Manage Tax
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Manage Tax</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Manage Tax</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
              	<?php

            if(isset($_POST["btn_tax"]))
            {
            	 extract($_POST);
                $sql="INSERT INTO tbl_taxrate (`tax_name`,`tax_rate`,`created_on`) values ('".trim($tax_name)."','".trim($tax_rate)."', NOW() )";
	             //echo $sql;exit;
	            if ($con->query($sql) === TRUE) {
	                  $_SESSION['success']='Tax Successfully Updated';?>
                <script type="text/javascript">window.location="manage_tax.php";</script>
                <?php
                } else {
                      $_SESSION['error']='Something Went Wrong';
                ?>
                <script type="text/javascript">window.location="manage_tax.php";</script>
                <?php 
                }
            }?>
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label my-auto">Tax Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Tax Name" id="tax_name" name="tax_name" onkeypress="return isAlfa(event)" class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-4 control-label my-auto">Tax Rate</label>
                                                <div class="col-md-8">
                                                  <div class="input-group">       
                                                    <input type="text" placeholder="Tax Rate" id="tax_rate" name="tax_rate" onkeypress="return isNumber(event)" class="form-control" required>
                                                    <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                  </div>
                                                  </div>
                                                </div>       
                                            </div>
                                        </div>
                                        <button type="submit" name="btn_tax" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
              </div>
            </div>

             <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           <b><center>TAX RATES</center></b>
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Tax Name</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Tax Rate (%)</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Tax Name</th><th rowspan="1" colspan="1">Tax Rate (%)</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                  <?php
	if(isset($_POST['update']))
      {
      extract($_POST);
      $ql= "UPDATE `tbl_taxrate` SET `tax_name`= '".trim($tax_name_up)."',`tax_rate`= '".trim($tax_rate_up)."' WHERE `taxrate_id`='$taxrate_id'";
            //echo $ql;exit;

          if ($con->query($ql) === TRUE) {
               $_SESSION['success']='Tax Successfully Updated';
                 ?>
           <script type="text/javascript">window.location="manage_tax.php";</script>
           <?php                
            }
        }
		?>
                   <?php 
                                         
                                           $sql = "SELECT * FROM tbl_taxrate";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['tax_name']; ?></td>
                                                <td><?php echo $row['tax_rate']; ?> %</td>
                                                <td>
                                                    
                                                    <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["taxrate_id"]; ?>" data-sfid='"<?php echo $row['taxrate_id'];?>"'><i class="fa fa-pen fa-xs"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['taxrate_id'];?>"' ><i class="fa fa-trash fa-xs"></i></a> 
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
                       <h4 class="modal-title">Update Tax Rate</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="tax_update">  
                                      <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-5 control-label my-auto">Tax Name</label>
                                                <div class="col-md-7">
                                                    <input type="text" placeholder="Tax Name" name="tax_name_up" id="tax_name_up" onkeypress="return isAlfa(event)" class="form-control" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-5 control-label my-auto">Tax Rate</label>
                                                <div class="col-md-7">
                                                  <div class="input-group">
                                                    <input type="text" placeholder="Tax Rate" name="tax_rate_up" id="tax_rate_up" onkeypress="return isNumber(event)" class="form-control" required>
                                                    <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                  </div>
                                                </div>
                                                </div>                                               
                                            </div>
                                        </div>

                                         <input type="hidden" name="taxrate_id" id="taxrate_id" />  
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
           var taxrate_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{taxrate_id:taxrate_id},  
                dataType:"json",  
                success:function(data){  
                     $('#tax_name_up').val(data.tax_name);
                     $('#tax_rate_up').val(data.tax_rate);
                     $('#taxrate_id').val(data.taxrate_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_taxrate_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_taxrate_id:del_taxrate_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            window.location.reload();
      });
       });
</script>
  
</body>

</html>