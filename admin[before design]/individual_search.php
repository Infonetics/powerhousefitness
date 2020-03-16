
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Attendance
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Individual Search</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Individual Search</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
         
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row p-2 mb-2">
                  <div class="col-sm-12">
                    <form class="form-inline">
                      <div class="col-md-3">
                        <div class="row ">
                          <div class="form-group">
                          <label class="col-md-4">Category</label>
                          <select name="cu_trainer_sel" id="cu_trainer_sel" class="form-control col-sm-8">
                            <option value="">Select</option>
                            <option>Employee</option>
                            <option>Customer</option>
                          </select>
                          </div>
                        </div>
                      </div>

                            
                      <div class="col-md-3"> 
                        <div class="row">
                          <div class="form-group ">
                            <label class="col-md-4">From</label>
                            <input type="date" class="form-control col-md-8" name="from_date" id="from_date">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3"> 
                        <div class="row">
                          <div class="form-group">
                            <label class="col-md-4">To</label>
                            <input type="date" class="form-control col-md-8" name="from_date" id="from_date">
                          </div>
                        </div>
                      </div>
                       
                      <div class="col-md-3"> 
                        <div class="row">
                          <div class="form-group col-md-12">
                            <input type="button" class="form-control col-md-8" name="from_date" id="from_date" value="Submit">
                            <!-- <button class="form-control  ">Search</button> -->
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <form class="form-inline"> 
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <input type="text" class="form-control"  name="" placeholder="Search name etc.">
                      <button class="form-control "><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>

                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                      <thead class="thead-light">
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Id</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" > Name</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Check In</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Check Out</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Status</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th rowspan="1" colspan="1">Id</th>
                          <th rowspan="1" colspan="1">Name</th>
                          <th rowspan="1" colspan="1">Check In</th>
                          <th rowspan="1" colspan="1">Check Out</th>
                          <th rowspan="1" colspan="1">Status</th>
                        </tr>
                      </tfoot>  
                      <tbody>
                        <tr>
                          <td>1001</td>
                          <td>evaniya</td>
                          <td>11.00</td>
                          <td>4.00</td>
                          <td>present</td>
                        </tr>
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

  $(document).ready(function()
  {  
      $(document).on('click', '.edit_data', function(){  
           var customer_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{customer_id:customer_id},  
                dataType:"json",  
                success:function(data){  
                     $('#customer_name').html(data.fname+' '+data.lname);  
                     // $('#last_name').html(data.lname);  
                     $('#email').html(data.email);  
                     $('#contact').html(data.contact);
                     $('#dob').html(data.dob);  
                     $('#age').html(data.age);  
                     $('#blood_group').html(data.blood_group); 
                     $('#gender').html(data.gender);  
                     $('#married_status').html(data.married_status); 
                     $('#fitness').html(data.feet+"' "+data.inches+'", '+data.weight+"kg"); 
                    // $('#inches').html(data.inches);  
                    // $('#weight').html(data.weight);
                     $('#address').html(data.address); 
                     $('#guardian_name').html(data.guardian_name);  
                     $('#relation').html(data.relation); 
                     $('#guardian_contact').html(data.guardian_contact);
                     // $('#organization').html(data.organization); 
                     $('#joined_date').html(data.joined_date);
                     $('#plan').html(data.plan);
                     // $('#payment_mode').val(data.payment_mode);
                     $('#starting_date').html(data.starting_date);
                     $('#expiry_date').html(data.expiry_date);
                     $('#personal_trainer').val(data.personal_trainer);
                     $('#personal_plan').val(data.personal_plan);
                     $('#personal_payment_mode').val(data.personal_payment_mode);
                     $('#personal_expiry_date').val(data.personal_expiry_date);
                     $('#starting_date').val(data.starting_date);
                     $('#personal_starting_date').val(data.personal_starting_date);
                     $('#update_customer_id').val(data.customer_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
  });
  </script>
</body>
</html>