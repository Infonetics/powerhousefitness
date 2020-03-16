<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    View Membership Plans
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View Membership</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View Membership</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                      <thead class="thead-light">
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Name</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Price</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Duration</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Plan</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Applicable For</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Description</th>
                          <th  tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">Name</th>
                        <th rowspan="1" colspan="1">Price</th>
                        <th rowspan="1" colspan="1">Duration</th>
                        <th rowspan="1" colspan="1">Plan</th>
                        <th rowspan="1" colspan="1">Applicable For</th>
                        <th rowspan="1" colspan="1">Description</th>
                        <th rowspan="1" colspan="1">Action</th>
                      </tr>
                      </tfoot>
                      <tbody>
                       <?php
                        if(isset($_POST['update']))
                        {
                          extract($_POST);
                          $ql= "UPDATE `".DB_PREFIX."`.`tbl_membership` SET `name`= '".trim($membership_name)."',`price`= '".trim($Price)."',`duration`='".trim($duration)."',`plan`= '".trim($plan)."',`applicable_for`='".trim($applicable_for)."',`short_desc`='".trim($short_desc)."',`last_modified`=NOW() WHERE `membership_id`='$membership_id' ";
                              // echo $ql;exit;
                          if ($con->query($ql) === TRUE) {
                            $_SESSION['success']='Trainer Successfully Updated';
                            ?>
                            <script type="text/javascript">
                              window.location="view_membership.php";
                            </script>
                            <?php
                          }
                        }
                        ?>
                        <?php 
                          $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_membership`";
                          $result = $con->query($sql);

                          while($row = $result->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $row['name'];?></td>
                            <td>₹ <?php echo $row['price'];?></td>
                            <td><?php echo $row['duration'];?></td>
                            <td><?php if($row['plan'] == 1){ echo "Membership";}else{ echo "Personal Training";}?></td>    
                            <td><?php if($row['applicable_for'] == 1){ echo "All";}else if($row['applicable_for'] == 2){ echo "Ladies";} else if($row['applicable_for'] == 3){ echo "Gents";}?>
                            </td>
                            <td><?php echo $row['short_desc'];?></td>
                            <td>
                              <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["membership_id"]; ?>" data-sfid='"<?php echo $row['membership_id'];?>"'><i class="fa fa-pen fa-xs"></i></a>
                              <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['membership_id'];?>"' ><i class="fa fa-trash fa-xs"></i></a> 
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
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
                       <h4 class="modal-title">Update Membership</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="trainer_update">  
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                      <div class="form-group">
                        <div class="row">
                          <label class="col-sm-4 control-label my-auto">Membership Name</label>
                          <div class="col-sm-8">
                            <input type="text" placeholder="Membership Name" name="membership_name" id="membership_name" class="form-control" onkeypress="return isAlfa(event)" required>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-sm-4 control-label my-auto">Price</label>
                          <div class="col-sm-8">
                            <input type="text" placeholder="Price" name="Price" id="Price" class="form-control" onkeypress="return isNumber(event)" required >
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label my-auto">Plan</label>
                          <div class="custom-control custom-radio mb-3 ml-3 pr-4 my-auto">
                            <input type="radio" class="custom-control-input col-md-2 plan" name="plan" id="membership" value="1" required="">
                            <label class="custom-control-label p-3px" for="membership">Membership</label>
                          </div>

                          <div class="custom-control custom-radio mb-3 ml-3 my-auto">
                            <input type="radio" class="custom-control-input col-md-2 plan" name="plan" id="pt" value="2">
                            <label class="custom-control-label p-3px" for="pt">Personal Training</label>
                          </div>                       
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-sm-4 control-label mt-3">Duration</label>
                          <div class="col-sm-8">
                            <input type="text" placeholder="Duration" placeholder="Number  Day/Week/Month/Year" name="duration" id="duration" class="form-control" onkeypress="return isAlphaNumeric(event)" required ><small class="text-muted">Eg: 1 Month</small>
                          </div>
                        </div>
                      </div>


                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label my-auto">Applicable For</label>

                      <div class="custom-control custom-radio mb-3 mr-4 ml-3 my-auto">
                        <input type="radio" class="custom-control-input " name="applicable_for" id="all" value="1" checked="">
                        <label class="custom-control-label p-3px" for="all">All</label>
                      </div>  

                      <div class="custom-control custom-radio mb-3 mr-4 my-auto">
                        <input type="radio" class="custom-control-input " name="applicable_for" id="ladies" value="2">
                        <label class="custom-control-label p-3px" for="ladies">Ladies</label>
                      </div>

                      <div class="custom-control custom-radio mb-3 mr-4 my-auto">
                        <input type="radio" class="custom-control-input " name="applicable_for" id="gents" value="3">
                        <label class="custom-control-label p-3px" for="gents">Gents</label>
                      </div>
                        
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label mt-1">Short Description</label>
                      <div class="col-md-8">
                        <!-- <input type="text" placeholder="Number  Day/Week/Month/Year" name="duration" onkeypress="return isAlphaNumeric(event)" class="form-control" required> -->
                        <textarea name="short_desc" id="short_desc" placeholder="Short Description" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>

                    <input type="hidden" name="membership_id" id="membership_id" />  
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
           var membership_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{membership_id:membership_id},  
                dataType:"json",  
                success:function(data){  /*alert(data.plan);*/
                     $('#membership_name').val(data.name);  
                     $('#Price').val(data.price); 
                     $('#duration').val(data.duration);
                     if(data.plan == 1)
                       { $("#membership").prop("checked",true);}
                     else { $("#pt").prop("checked",true); }

                     if(data.applicable_for == 1)
                       { $("#all").prop("checked",true);}
                     else if(data.applicable_for == 2) 
                      { $("#ladies").prop("checked",true); }
                     else if(data.applicable_for == 3) 
                      { $("#gents").prop("checked",true); }

                     $('#short_desc').val(data.short_desc);
                     $('#membership_id').val(data.membership_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_membership_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_membership_id:del_membership_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            window.location="view_membership.php";
      });  
      i = 0;
       $("#Price").keypress(function(){
           i += 1;
           if(i>5){
              return false;
           }
        });
      });
    </script>
 
</body>

</html>