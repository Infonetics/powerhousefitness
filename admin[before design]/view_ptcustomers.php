
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Customers
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Customers</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">PT Active Customers</h3>
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
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Customer Name</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Contact</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Trainer</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >PT Plan</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >PT Paid Status</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Payment</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Payment Date</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th rowspan="1" colspan="1">Customer Name</th>
                          <th rowspan="1" colspan="1">Contact</th>
                          <th rowspan="1" colspan="1">Trainer</th>
                          <th rowspan="1" colspan="1">PT Plan</th>
                          <th rowspan="1" colspan="1">PT Paid Status</th>
                          <th rowspan="1" colspan="1">Payment</th>
                          <th rowspan="1" colspan="1">Payment Date</th>
                          <th rowspan="1" colspan="1">Action</th>
                        </tr>
                      </tfoot> 
                      <tbody>
                       <?php
                        $sql = "SELECT c.*,cm.*,cpt.*,t.*,m.`name`,tr.`fname` as tfname,tr.`lname` as tlname FROM `".DB_PREFIX."`.`tbl_customer` c
                                  left join `".DB_PREFIX."`.`tbl_customer_membership` cm on(cm.`customer_id`=c.`customer_id`)
                                  left join `".DB_PREFIX."`.`tbl_customer_pt` cpt on(cpt.`customer_id`=c.`customer_id`)
                                  left join `".DB_PREFIX."`.`tbl_membership` m on(m.`membership_id`=cpt.`pt_membership_id`)
                                  left join `".DB_PREFIX."`.`tbl_trainer` tr on(tr.`trainer_id`=cpt.`customer_pt_trainer_id`)
                                  left join `".DB_PREFIX."`.`tbl_total` t on(t.`customer_id`=cm.`customer_id` AND t.`customer_pt_id` != 0)  WHERE cpt.`pt_paid_status`=3 GROUP BY t.`customer_id` ";
                            $result = $con->query($sql);
                            while($row = $result->fetch_assoc()) { ?>
                           <tr>
                              <td><img  src="../images/customers/<?php echo $row['image']; ?>" onerror=this.src="images/customers/profile_image.png" style="height:50px;width:50px; border-radius: 50px;"><?php echo ' '.$row['fname'].' '.$row['lname']; ?></td>
                              <td class="td_desc"><?php echo $row['contact']; ?></td>
                              <td><?php echo $row['tfname'].' '.$row['tlname']; ?></td>
                              <!-- <td class="td_desc"><?php// echo $row['name'].'</br> FROM:'.$row['customer_pt_starting_date'].'</br> TO:'.$row['customer_pt_expiry_date']; ?></td> -->
                              <td class="td_desc"><?php if($row['name']) { echo $row['name'].'</br><span class="badge badge-default" style="font-size:13px;background-color:#ffeac4;color:#541414;">From :'.$row["customer_pt_starting_date"].'<br> To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:'.$row["customer_pt_expiry_date"].'</span>';}?></td>
                              <td><?php 
                                        if($row['pt_paid_status'] == 3)
                                          { echo '<span class="badge badge-success btn-lg">Paid</span> </br>';}
                                        else if( $row['pt_paid_status'] == 1)
                                          {echo '<span class="badge badge-danger btn-lg">Unpaid</span>';}
                                        else if( $row['pt_paid_status'] == 4)
                                          {echo '<span class="badge badge-warning btn-lg">Expired</span>'; }
                                        else if($row['pt_paid_status'] == 2)
                                          {echo '<span class="badge badge-info btn-lg">Pending</span>';} ?> </td>
                              <td><?php echo $row['total_amount'];?></td>
                              <td class="td_desc"><?php if($row['pt_date']) echo date('d-m-Y', strtotime($row['pt_date'])); ?></td>   
                              <td>
                                <a class="view_data pt-0 pb-0 pl-1 pr-1 mr-2" data-target="#customerview_Modal" data-toggle="modal" data-paymentid='"<?php echo $row['customer_id'];?>"' id="<?php echo $row["customer_id"];?>" title="View"><i class="fa fa-eye text-primary "></i></a>
                                <a class="pt-0 pb-0 pl-1 pr-1 mr-2"  title="Hold" href="#editModal" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"'><i class="fa fa-pause text-dark  "></i></a>
                                  <!-- <a href="#" type="button" class="btn btn-xs btn-info" title="View"><i class="fa fa-eye p-1"></i></a> -->
                                <a class="adjustment" name="adjustment" title="Adjustment" data-toggle="modal" data-target="#calender_Modal" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"'><i class="fa fa-calendar fa-md text-success"></i></a>
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
       <!-- ....adjustment modal start... -->
      <div id="calender_Modal" class="modal">  
        <div class="modal-dialog">  
            <div class="modal-content">  
                <div class="modal-header p-1 pt-3 bg-secondary">  
                  <h4 class="modal-title pl-4">Adjustment</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body p-2 pl-4" id="customer_update">  
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                 
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="row">
                            <label class="col-md-6 control-label  label2">Id</label>
                            <label class="col-md-6 font-weight-bold label2" id="cu_id" name="cu_id"></label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label  label2">Name</label>
                        <label name="cu_name" id="cu_name" class="control-label col-md-8 font-weight-bold label2"></label>
                      </div>
                    </div>             
                                        
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label  label2">Pt Plan</label>
                        <label name="cu_pt_plan" id="cu_pt_plan" class="col-md-8 control-label font-weight-bold label2"></label>
                      </div>
                    </div>
                          
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Start Date</label>
                        <label class="col-md-8 control-label label2 font-weight-bold " name="cu_start_dt" id="cu_start_dt"></label>                             
                      </div>
                    </div>
                                           
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Expiry Date</label>
                        <label class="col-md-4 control-label label2 font-weight-bold" name="cu_expiry_dt" id="cu_expiry_dt"></label>
                        <input type="date" name="adjust_date" id="adjust_date" class="col-md-4">
                        <i class="fa fa-calendar  fa-md text-success " name="calender_icon" id="calender_icon"></i>
                        <button  type="button" class="col-md-4 btn btn-xs" id="calen_cancel">Cancel</button>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Trainer</label>
                        <label class=" control-label label2 font-weight-bold col-md-4" name="cu_trainer" id="cu_trainer"></label>
                         <button type="button" class="btn btn-xs" id="trainer_change">Change</button>
                        
                        <select name="cu_trainer_sel" id="cu_trainer_sel" class="form-control col-md-4">
                          <option value="">Select Trainer</option>
                          <?php          
                              $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_trainer`";
                              $result = $con->query($sql);
                              while($row = $result->fetch_assoc()) 
                              { ?>
                               <option value="<?php echo $row['trainer_id'];?>"><?php echo $row['fname'].' '.$row['lname'];?></option>
                            <?php } ?>
                        </select>
                       <button type="button" class=" btn btn-xs col-md-4" id="trainer_cancel">Cancel</button>
                      </div>
                    </div>

                      </div> 
                      <div class="modal-footer">  
                        <button type="button" name="update_trainer" id="update_trainer" class="btn btn-danger">UPdate</button>  
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                      </div> 
                  </form>
                </div>   
            </div>  
        </div>  
      </div>
    <!-- .. adjustment modal end... -->

      <!-- ....view modal start... -->
      <div id="customerview_Modal" class="modal">  
        <div class="modal-dialog">  
            <div class="modal-content">  
                <div class="modal-header p-1 pt-3 bg-secondary">  
                  <h4 class="modal-title pl-4">View Customer</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body p-2 pl-4" id="customer_update">  
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                     <div class="form-group">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="row">
                            <label class="col-md-6 control-label label2">Customer Name</label>
                            <label name="vname"  id="vname" class="label2 font-weight-bold control-label col-md-6"></label>
                            <input type="hidden" name="cus_id" id="cus_id" value="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <img id="vpreview_customer" name="vpreview_customer" src="images/profile_image.png" class="btn-width position-absolute pro-pic"/>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="row">
                            <label class="col-md-6 control-label  label2">Contact</label>
                            <label class="col-md-6 font-weight-bold label2" id="vcontact" name="vcontact"></label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label  label2">Email</label>
                        <label name="vemail" id="vemail" class="control-label col-md-8 font-weight-bold label2"></label>
                      </div>
                    </div>             
                                        
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label  label2">DOB & Age</label>
                        <label name="vdob_age" id="vdob_age" class="col-md-8 control-label font-weight-bold label2"></label>
                      </div>
                    </div>
                          
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Blood Group</label>
                        <label class="col-md-8 control-label label2 font-weight-bold " name="vblood_group" id="vblood_group"></label>                             
                      </div>
                    </div>
                                           
                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Gender & Civil Status</label>
                        <label class="col-md-8 control-label label2 font-weight-bold" name="vgender_marital" id="vgender_marital"></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Height & weight</label>
                        <label class="col-md-8 control-label label2 font-weight-bold" name="vfitness" id="vfitness"></label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <label class="col-md-4 control-label label2">Address</label>
                        <label class="col-md-8 control-label label2 font-weight-bold" name="vaddress" id="vaddress"></label> 
                      </div>
                    </div>

                      <hr>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Guardian(Relation)</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vguardian_name_relation" id="vguardian_name_relation"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Guardian Contact</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vguardian_contact" id="vguardian_contact"></label>
                        </div>
                      </div>

                      <hr>
                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Organization</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vorganization" id="vorganization"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Date of Joining</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vjoined_date" id="vjoined_date"></label>
                        </div>
                      </div>  

                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-4 control-label label2">Trainer</label>
                          <label class="col-md-8 control-label label2 font-weight-bold" name="vtrainer" id="vtrainer"></label>
                          </div>
                        </div>
                      </div> 
                      <div class="modal-footer">  
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                      </div> 
                  </form>
                </div>  
                 
            </div>  
        </div>  
      </div>
    <!-- .. view modal end... -->
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
      $(document).on('click', '.del_data', function(){  
           var del_customer_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_customer_id:del_customer_id},  
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

         /*........view button starts ...........*/
       $(document).on('click', '.view_data', function(){  
           var v_customer_id = $(this).attr("id"); 
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{v_customer_id:v_customer_id},  
                dataType:"json",  
                success:function(data){  
                     $('#vname').html(data.fname+' '+data.lname);
                     $('#cus_id').val(data.customer_id); 
                     $('#vemail').html(data.email);  
                     $('#vcontact').html(data.contact);
                     $('#vdob_age').html(data.dob+" , "+data.age);
                     $('#vblood_group').html(data.blood_group); 
                     $('#vgender_marital').html(data.gender+","+data.married_status); 
                     $('#vfitness').html(data.feet+"' "+data.inches+'" ,'+data.weight+"kg"); 
                     $('#vaddress').html(data.address); 
                     $('#vguardian_name_relation').html(data.guardian_name+"("+data.relation+")");  
                     $('#vguardian_contact').html(data.guardian_contact);
                     $('#vorganization').html(data.organization); 
                     $('#vjoined_date').html(data.joined_date);
                     $('#vtrainer').html(data.tfname);         
                     $('#vpreview_customer').attr('src', '../images/customers/'+data.image);
                     $('#customerview_Modal').modal('show');  

                }  
           });  
      }); 

        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#vcustomer_image').val(fileName);
            $('#image').attr('title',fileName);
            $('#vpreview_customer').attr('src', '../images/customer'+fileName);
        });
       /*........view button end......*/

      /*.....trainer update in view model......*/
     /* $(document).on('click', '#update_trainer', function()
      {  
          var cus_id=$('#cus_id').val();
          var update_trainer=$('#trainer').val();
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{update_trainer:update_trainer,cus_id:cus_id},  
                dataType:"json",  
                success:function(data){  
                }  
           });  
            // window.location.reload();
      });  */
       /*.....trainer update in view model......*/

        /*.....adjust date model view starts......*/ 
      $(document).on('click', '.adjustment', function()
      {  
         var adjust_customer_id = $(this).attr("id");  
         // alert(adjust_customer_id);
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{adjust_customer_id:adjust_customer_id},  
                dataType:"json",  
                success:function(data){  
                  // alert(data.fname);
                  $('#cu_id').html(data.customer_id);
                  $('#cu_name').html(data.cfname+' '+data.clname);
                  $('#cu_pt_plan').html(data.name);
                  $('#cu_start_dt').html(data.customer_pt_starting_date);
                  $('#cu_expiry_dt').html(data.customer_pt_expiry_date);
                  $('#cu_trainer').html(data.tfname+' '+data.tlname);
                }  
           });  
      });  
      /*.....adjust date model view ends......*/

      /*.....adjust date and trainer update starts......*/
      $(document).on('click', '#update_trainer', function()
      {   
          var update_trainer=1;
          var adj_date= $('#adjust_date').val(); 
          var tcustomer_id = $('#cu_id').html();   
          var pt_trainer_id = $('#cu_trainer_sel').val();
          var cu_trainer_labl = $('#cu_trainer').html(); 
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{tcustomer_id:tcustomer_id,pt_trainer_id:pt_trainer_id,adj_date:adj_date,update_pt_trainer:update_trainer,cu_trainer_labl:cu_trainer_labl},  
                dataType:"json",  
                success:function(data){ 
                  if(data==1)
                  { alert('Trainer Successfully Updated'); }
                  else
                  { alert('Trainer Not Deleted');} 
                }  
           });  
      }); 
      /*.....adjust date and trainer update ends......*/ 

    /*....expiry date hide show starts...*/
       $('#adjust_date').hide();
       $('#calen_cancel').hide();
       // var adj_date=$('#adjust_date').html();
       $(document).on('click', '#calender_icon', function()
      { 
        $('#calender_icon').hide();
        $('#adjust_date').show();
        $('#cu_expiry_dt').hide();
         $('#calen_cancel').show();
      });

          /*....expiry date cancel btn code...*/
          $(document).on('click', '#calen_cancel', function()
          { 
             $('#calen_cancel').hide();
             $('#cu_expiry_dt').show();
             $('#adjust_date').hide();
              $('#calender_icon').show();
          });
      /*....expiry date hide show ends...*/

      /*....trainer hide show starts...*/
       $('#cu_trainer_sel').hide();
       // $('#cu_trainer').hide();
       $('#trainer_cancel').hide();
       $(document).on('click', '#trainer_change', function()
      { 
         $('#trainer_change').hide();
         $('#cu_trainer').hide();
         $('#cu_trainer_sel').show();
         $('#trainer_cancel').show();
      });
       /*....trainer date cancel btn code...*/
          $(document).on('click', '#trainer_cancel', function()
          { 
             $('#trainer_cancel').hide();
             $('#cu_trainer').show();
             $('#cu_trainer_sel').hide();
             $('#trainer_change').show();
          });
      /*....trainerhide show ends...*/
      });
    </script>
   <script >
  function calculate_age(val)
  {
     var dob = val;
     dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    $('#age').val(age);
  }
  </script>
</body>

</html>