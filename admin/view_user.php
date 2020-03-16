<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    View User
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View User</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View User</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable-basic_length"><label>Show <select name="datatable-basic_length" aria-controls="datatable-basic" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatable-basic_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-basic"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Name</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Photo</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Email</th><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Address</th><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Contact No.</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Group Name</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Address</th><th rowspan="1" colspan="1">Contact No.</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                   <?php 
                                         
                                          $sql = "SELECT * FROM tbl_customer";
                                           $result = $con->query($sql);

                                            while($row = $result->fetch_assoc()) { 
                                            $sql1 = "SELECT * FROM  tbl_group where id  ='".$row['group_id']."'";
                                            $result1 = $con->query($sql1);
                                            $row1 = $result1->fetch_assoc();?>
                                            <tr>
                                                <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                                                <td><img  src="uploadImage/Profile/<?php  echo $row['image']; ?>" onerror=this.src="images/profile_image.png" style="height:100px;width:100px;"></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['contact']; ?></td>
                                                <td><?php echo $row1['name']; ?></td>

                                                 <td>
                         <!--  <?php if(isset($useroles)){  if(in_array("edit_client",$useroles)){?>
                                                <button onclick="myFunction()" type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button>
                        <div id="snackbar">for Full sourcecode visit <a href="https://www.instamojo.com/minfospace/">Visit my Online Store</a><br>Thanks !</div>
                                              <?php } } ?>

                          <?php if(isset($useroles)){  if(in_array("delete_client",$useroles)){?>
                                                <button onclick="myFunction()" type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button>
                                              <?php } } ?>
                                                <button onclick="myFunction()" type="button" class="btn btn-xs btn-success" ><i class="fa fa-eye"></i></button> -->
                                                 <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["id"]; ?>" data-sfid='"<?php echo $row['id'];?>"'><i class="fa fa-pen"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['id'];?>"' ><i class="fa fa-trash"></i></a> 
                                                </td>
                                            </tr>
                                          <?php } ?></tbody>
              </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable-basic_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable-basic_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable-basic_previous"><a href="#" aria-controls="datatable-basic" data-dt-idx="0" tabindex="0" class="page-link"><i class="fas fa-angle-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable-basic" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-basic" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable-basic_next"><a href="#" aria-controls="datatable-basic" data-dt-idx="7" tabindex="0" class="page-link"><i class="fas fa-angle-right"></i></a></li></ul></div></div></div></div>
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
                       <h4 class="modal-title">Update User</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="trainer_update">  
                                    <form class="form-horizontal" method="POST" action="pages/save_person.php" name="userform" enctype="multipart/form-data"  id="insert_form">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">First Name</label>
                                                <div class="col-md-9">
                                                  <input type="text" name="fname" class="form-control" placeholder="First Name" id="fname" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Last Name</label>
                                                <div class="col-md-9">
                                                    <input type="text"  name="lname" id="lname" class="form-control" id="lname" onkeydown="return alphaOnly(event);" placeholder="Last Name" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password" id="password" placeholder="Password"  class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Gender</label>
                                                <div class="col-md-9">
                                                   <select name="gender" id="gender" class="form-control" required="">
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-md-3 control-label">Date Of Birth</label>
                                                <div class="col-md-9">
                                                  <input type="date" name="dob" id="dob" class="form-control" placeholder="Birth Date">
                                                </div>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Contact</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="contact" class="form-control" placeholder="Contact Number" id="contact" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Address</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" rows="4" name="address" id="address" placeholder="Address" style="height: 120px;"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Group</label>
                                                <div class="col-md-9">
                                                   <select name="group_id" id="group_id" class="form-control" required="">
                                                    <option value=" ">--Select Group--</option>
                                                     <?php  
                                                          $sql2 = "SELECT * FROM tbl_group where id!=1";
                                                          $result2 = $con->query($sql2); 
                                                          while($row2= mysqli_fetch_array($result2)){
                                                        ?>
                                                        <option value ="<?php echo $row2['id'];?>"><?php echo $row2['name'];?> </option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 control-label">Image</label>
                                                <div class="col-md-9 image">
                                                    <input type="file" class="form-control" name="image" id="image">
                                                </div>
                                            </div>
                                        </div>

                                       <input type="hidden" name="id" id="id" />  
                                      <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
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
   <script>
      
$(document).ready(function(){  
   
      $(document).on('click', '.edit_data', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#fname').val(data.fname);  
                     $('#lname').val(data.lname); 
                     $('#email').val(data.email); 
                     $('#password').val(data.password);
                     $("#"+data.gender).attr("checked"); 
                     $('#dob').val(data.dob); 
                     $('#contact').val(data.contact); 
                     $('#address').val(data.address); 
                     $("#"+data.group_id).attr("checked");
                     $('#image').attr('src',data.image); 
                     //$('#hidden_input_file').val(data.image);
                     //$( 'data.image' ).insertAfter( "#image" );
                     $('#id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_id:del_id},  
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