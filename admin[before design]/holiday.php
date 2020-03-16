<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Create Holiday
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Create Holiday</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Create Holiday</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <form class="form-horizontal" method="POST" style="margin:auto;width:60%;">
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Event</label>
                      <div class="col-md-8">
                        <input type="text" placeholder="Holiday Event" id="holiday_event" name="holiday_event" onkeypress="return isAlfa(event)" class="form-control" required>
                      </div>                          
                    </div>
                  </div> 
                   <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Date</label>
                      <div class="col-md-8">
                        <input type="date" name="holiday_date" id="holiday_date" class="form-control" required>
                      </div>                          
                    </div>
                  </div> 
                  <button type="button" name="btn_holiday" id="btn_holiday" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                </form>
              </div>
            </div>

            <!-- Holiday view section -->
            <div class="card-body">
              <div class="card">
                <div class="table-responsive py-4">
                  <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12">
                        <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                          <thead class="thead-light">
                            <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Holiday Event</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Holiday Date</th>
                              <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th rowspan="1" colspan="1">Holiday Event</th>
                              <th rowspan="1" colspan="1">Holiday Date</th>
                              <th rowspan="1" colspan="1">Action</th>
                            </tr>
                          </tfoot>
                          <tbody>
                            <?php 
                              $sql = "SELECT * FROM tbl_holyday";
                                      $result = $con->query($sql);
                                      while($row = $result->fetch_assoc()) { ?>
                            <tr>
                              <td><?php echo $row['holiday_event'];?></td>
                              <td><?php echo $row['holiday_date'];?></td>
                              <td>
                                <a type="button" class="btn btn-xs btn-primary edit_data" data-toggle="modal" data-target="#holiday_modal" id="<?php echo $row["holiday_id"];?>" data-sfid='"<?php echo $row['holiday_id'];?>"'><i class="fa fa-pen"></i></a>
                                <a type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['holiday_id'];?>"'><i class="fa fa-trash"></i></a> 
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
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
       <?php include("include/footer.php");?>

          <!-- ....modal start... -->
      <div id="holiday_modal" class="modal">  
        <div class="modal-dialog">  
             <div class="modal-content">  
                  <div class="modal-header">  
                       <h4 class="modal-title">Update Holiday </h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body" id="trainer_update">  
                    <form class="form-horizontal" method="POST" style="margin:auto;width:60%;">
                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label">Event</label>
                          <div class="col-md-8">
                            <input type="text" placeholder="Holiday Event" id="holiday_event_edit" name="holiday_event_edit" onkeypress="return isAlfa(event)" class="form-control" required>
                            <input type="hidden" name="holiday_id" id="holiday_id">
                          </div>                          
                        </div>
                      </div> 
                       <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label">Date</label>
                          <div class="col-md-8">
                            <input type="date" name="holiday_date_edit" id="holiday_date_edit" class="form-control" required>
                          </div>                          
                        </div>
                      </div> 
                      <button type="button" name="holiday_update" id="holiday_update" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                    </form>
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
  $(document).ready(function()
  {  
     $(document).on('click', '#btn_holiday', function()
     {    
        var holiday=1;
        var holiday_event=$('#holiday_event').val();
        var holiday_date = $('#holiday_date').val(); 
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{holiday_event:holiday_event,holiday_date:holiday_date,holiday:holiday},  
                dataType:"json",  
                success:function(data){ 
                }  
           });  
            window.location.reload();
      }); 

      $(document).on('click', '.edit_data', function()
      {  
           var holiday_id = $(this).attr("id"); 
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{holiday_id:holiday_id},  
                dataType:"json",  
                success:function(data){  
                     $('#holiday_event_edit').val(data.holiday_event);  
                     $('#holiday_date_edit').val(data.holiday_date); 
                     $('#holiday_id').val(data.holiday_id);  
                }  
           });  
      }); 

      $(document).on('click', '#holiday_update', function()
      {    
            var holiday_id = $('#holiday_id').val();
            var holiday_event_edit=$('#holiday_event_edit').val();
            var holiday_date_edit = $('#holiday_date_edit').val(); 
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{holiday_update:holiday_id,holiday_event_edit:holiday_event_edit,holiday_date_edit:holiday_date_edit},  
                dataType:"json",  
                success:function(data){  
                }  
           });  
           window.location.reload();
      }); 

      $(document).on('click', '.del_data', function(){  
           var del_holiday_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_holiday_id:del_holiday_id},  
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