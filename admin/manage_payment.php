
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Manage Payment
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
<style type="text/css">
  .danger-btn{
  padding: 10px 20px !important;
}
</style>

<body class="">
  <?php include("include/sidebar.php");?>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Manage Payment</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Manage Payment</h3>
            </div>
            <div class="card-body">
              
                <!-- ------- -->
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row">
				  <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Customer Id: activate to sort column descending" style="width: 182px;">Customer Id</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 182px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282px;">Contact</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114px;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
				  <th rowspan="1" colspan="1">Customer Id</th>
				  <th rowspan="1" colspan="1">Name</th>
                    
                    <th rowspan="1" colspan="1">Contact</th>
                    <th rowspan="1" colspan="1">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php

                      $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_customer`";
                      $result = $con->query($sql);

                      while($row = $result->fetch_assoc()) { ?>
                     <tr id="tr<?php echo $row['customer_id']?>">
					           <td class="td_desc"><?php echo $row['customer_id']; ?></td>
                        <td><img  src="../images/customers/<?php echo $row['image']; ?>" onerror=this.src="images/customers/profile_image.png" style="height:50px;width:50px; border-radius: 50px;"><?php echo ' '.$row['fname'].' '.$row['lname']; ?></td>
                          <td class="td_desc"><?php echo $row['email']; ?></td>
                          <td class="td_desc"><?php echo $row['contact']; ?></td>
                                         
                          <td class="d-inline-flex">
                            <?php
                              $display_mp="";$display_pt="";
                             $sql_mp = "SELECT * FROM `".DB_PREFIX."`.`tbl_customer_membership` cm
                                  LEFT JOIN `tbl_mp_payment` mpp on(cm.`customer_membership_id` = mpp.`mp_payment_customer_membership_id`)
                                  WHERE cm.`customer_id`='".$row['customer_id']."' AND cm.`customer_membership_status`='1'  
                                  ORDER BY mpp.`mp_payment_id` DESC LIMIT 0,1";
                                   //echo $sql_mp;
                                  $result_mp = $con->query($sql_mp);
                                  $row_mp = $result_mp->fetch_array();

                                  $sql_pt = "SELECT * FROM `".DB_PREFIX."`.`tbl_customer_pt` cpt
                                  LEFT JOIN  `tbl_pt_payment` ptp on (cpt.`customer_pt_id`=ptp.`pt_payment_customer_pt_id`)
                                  WHERE cpt.`customer_id`='".$row['customer_id']."' AND cpt.`customer_pt_status`='1'  
                                  ORDER BY ptp.`pt_payment_id` DESC LIMIT 0,1";
                                  $result_pt = $con->query($sql_pt);
                                  $row_pt = $result_pt->fetch_array();


                                  if($row_mp['mp_payment_paid_status']==3 && $row_pt['pt_payment_paid_status']==3){
                                    // $display_mp="d-none";$display_pt="d-none";
									                   $mp_class="btn-success";$pt_class="btn-success";
                                  }else if($row_mp['mp_payment_paid_status']==4 && $row_pt['pt_payment_paid_status']==4){
                                     // $display_mp="d-block";$display_pt="d-none";
									                    $mp_class="btn-danger danger-btn";$pt_class="btn-danger danger-btn";
                                  }else if($row_mp['mp_payment_paid_status']==NULL && $row_pt['pt_payment_paid_status']==NULL){
                                     //$display_mp="d-block";$display_pt="d-none";
									                    $mp_class="btn-danger danger-btn";$pt_class="btn-danger danger-btn";
                                  }

                                  else if($row_mp['mp_payment_paid_status']==3 && $row_pt['pt_payment_paid_status']==NULL){
                                      //$display_mp="d-none";$display_pt="d-block";
									                    $mp_class="btn-success";$pt_class="btn-danger danger-btn";
                                  } else if($row_mp['mp_payment_paid_status']==3 && $row_pt['pt_payment_paid_status']==4){
                                    //  $display_mp="d-none";$display_pt="d-block";
									                    $mp_class="btn-success";$pt_class="btn-danger danger-btn";
                                  
                                  }else if($row_mp['mp_payment_paid_status']==4 && $row_pt['pt_payment_paid_status']==NULL){
                                    //  $display_mp="d-block";$display_pt="d-none";
									                    $mp_class="btn-danger danger-btn";$pt_class="btn-danger danger-btn";
                                  }else if($row_mp['mp_payment_paid_status']==4 && $row_pt['pt_payment_paid_status']==3){
                                     // $display_mp="d-block";$display_pt="d-none";
									                    $mp_class="btn-danger danger-btn";$pt_class="btn-success";
                                  }

                                  else if($row_mp['mp_payment_paid_status']==NULL && $row_pt['pt_payment_paid_status']==4){
                                      //$display_mp="d-block";$display_pt="d-none";
									                    $mp_class="btn-danger danger-btn";$pt_class="btn-danger";
                                  }else if($row_mp['mp_payment_paid_status']==NULL && $row_pt['pt_payment_paid_status']==3){
                                     // $display_mp="d-block";$display_pt="d-none";
									                    $mp_class="btn-danger danger-btn";$pt_class="btn-success";
                                  }




                              ?>
                            <a type="button" class="btn btn-xs <?=$mp_class?> text-center edit_mdata <?=$display_mp?>" href="#editModal" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"' title="Membership Payment"><!-- <i class="fa fa-user-plus p-1"></i> -->MP</a>


                            <a type="button" class="btn btn-xs <?=$pt_class?> edit_pt_data <?=$display_pt?>" href="#editModal" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"' title="PT Payment"><!-- <i class="fa fa-rupee-sign p-1"></i> -->PT</a>

                            <a type="button" class="btn btn-xs btn-warning edit_adv_data" href="#editModal" id="<?php echo $row["customer_id"]; ?>" data-sfid='"<?php echo $row['customer_id'];?>"' title="Advance Payment"><!-- <i class="fa fa-rupee-sign p-1"></i> -->AD</a>
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
      <!-- ....PT modal start... -->
      <div id="pt_data_Modal" class="modal">  
        <div class="modal-dialog modal-xl">  
            <div class="modal-content">  
                <div class="modal-header pb-1 pt-2 bg-secondary">  
                    <h4 class="modal-title">Manage Personal Training</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body" id="customer_update">  
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                        <div class="form-group mb-0">
                            <div class="row">
                              <div class="col-sm-3 bor-r">
                                <div class="row">
                                    <label class="col-md-6 control-label break-word">Customer Name</label>
                                    <label class="col-md-6 control-label white-space" name="ptcustomer_name" id="ptcustomer_name"></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-6 control-label white-space">Email</label>
                                        <label class="col-md-6 mb-0 control-label break-word" name="ptemail" id="ptemail"></label>
                                    </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-6 mb-0 control-label white-space">Contact</label>
                                        <label class="col-md-6 mb-0 control-label break-word" name="ptcontact" id="ptcontact"></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                      <label class="col-md-6 control-label">Age</label>
                                      <label class="col-md-6 control-label" id="ptage" name="ptage"></label>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="row ">
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                      <label class="col-md-6 control-label white-space">Blood Group</label>
                                      <label class="col-md-6 control-label white-space" name="ptblood_group" id="ptblood_group"></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                    <label class="col-md-6 control-label white-space">Gender & Civil Status</label>
                                    <label class="col-md-6 control-label " name="ptgendermarried" id="ptgendermarried"></label>
                                 </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-6 control-label white-space">Health & Fitness</label>
                                        <label class="col-md-6 control-label white-space" name="ptfitness" id="ptfitness" ></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="row">
                                      <label class="col-md-6 control-label white-space">Date of Joining</label>
                                      <label class="col-md-6 control-label white-space" name="ptjoined_date" id="ptjoined_date"></label>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="row">
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                    <label class="col-md-6 control-label white-space">MP Plan</label>
                                    <label class="col-md-6 control-label white-space break-word" name="ptplan" id="ptplan" ></label>
                                  </div>
                                </div>
                               <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-6 control-label white-space">MP Starting Date</label>
                                        <label class="col-md-6 control-label white-space" name="ptstarting_date" id="ptstarting_date"></label>
                                    </div>
                               </div>
                               <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-6 control-label white-space">MP Expiry Date</label>
                                        <label class="col-md-6 control-label white-space" name="ptexpiry_date" id="ptexpiry_date" ></label>
                                    </div>
                               </div>
                             </div>
                          </div>
                          <hr>
                          <div class="form-group mb-0">
                            <div class="row">
                               <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-5 control-label my-auto">Trainer</label>
                                        <div class="col-md-7">
                                            <select name="ptpersonal_trainer" id="ptpersonal_trainer" class="form-control select-sm" required>
                                              <option value="">--Select Trainer--</option>
                                              <?php 
                                                $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_trainer`";
                                                $result=$con->query($sql);
                                                while($row=$result->fetch_assoc()){ ?>
                                              <option value="<?php echo $row['trainer_id']?>"><?php echo $row['fname'].' '.$row['lname'];?></option>
                                              <?php } ?>
                                           </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-4 control-label my-auto">PT Plan</label>
                                        <div class="col-md-8">
                                           <select name="ptpersonal_plan" id="ptpersonal_plan" class="form-control select-sm" required>
                                              <option value=""> Select </option>
                                             <?php 
                                                $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_membership` WHERE `plan`='2'";
                                                $result=$con->query($sql);
                                                while($row=$result->fetch_assoc()){ ?>
                                              <option value="<?php echo $row['membership_id']?>"><?php echo $row['name'];?></option>
                                              <?php } ?>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-5 control-label my-auto">Starting Date</label>
                                        <div class="col-md-7">
                                            <input type="text" name="ptpersonal_starting_date" id="ptpersonal_starting_date"  class="form-control select-sm" value="<?php echo date('Y-m-d');?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="row">
                                        <label class="col-md-5 control-label my-auto">Expiry Date</label>
                                        <div class="col-md-7">
                                            <input type="date" name="ptpersonal_expiry_date" id="ptpersonal_expiry_date" class="form-control select-sm"  required readonly>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12 float-right">
                                <input type="hidden" name="ptupdate_customer_id" id="ptupdate_customer_id"/>  
                                <input type="button" name="ptupdate" id="ptupdate" value="Update" class="btn btn-success pr-4 pl-4 m-1 float-right"/>
                                </div>
                            </div>
                          </div>
                        <div class="form-group mb-0">
                            <div class="d-container border p-2 mt-1 " id="pt_payment">
                              <div class="row">
                                <div class="col-sm-1">
                                    <button class=" btn btn-info btn-width pay-btn p-2"  type="button" id="ptcash" value="Cash">Cash</button>
                                    <button class=" btn btn-info mt-2 btn-width pay-btn p-2"  type="button" id="ptcard" value="Card">Card</button>
                                    <button class=" btn btn-info mt-2 btn-width pay-btn p-1 pt-2 pb-2 text-center" type="button" id="ptcheque" value="Cheque">Cheque</button>
                                </div>
                                <div class="col-sm-11">
                                   <!---- card ----------->
                                  <div class="row pl-5 mb-2" id="ptcard_section" style="display: none;">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2 my-auto">Card No: </label>
                                        <input type="text" name="ptcard_no" id="ptcard_no" class="form-control h-25" placeholder="last 4 digits">
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Holders name</label>
                                        <input type="text" name="ptholder_name" id="ptholder_name" class="form-control h-25" placeholder="Holders Name">
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Exp Date: </label>
                                        <input type="date" name="ptcard_exp_date" id="ptcard_exp_date" class="form-control h-25">
                                    </div>
                                </div>
                                <!---------card ----------->
                                <!---- cheque----------->
                                  <div class="row pl-5 mb-2" id="ptcheque_section" style="display: none;">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2 my-auto">Cheque No: </label>
                                        <input type="text" name="ptcheque_no" id="ptcheque_no" class="form-control h-25" placeholder="Cheque No">
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Account number</label>
                                        <input type="text" name="ptacc_no" id="ptacc_no" class="form-control h-25" placeholder="Accnt No">
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Cheque Date: </label>
                                        <input type="date" name="ptcheque_date" id="ptcheque_date" class="form-control h-25">
                                    </div>
                                </div>
                                <!---------cheque ----------->
                                  <div class="row pl-5">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2 my-auto">Receipt No : </label>
                                        <label name="ptreceipt_no" id="ptreceipt_no" class="span1 control-label pr-2 text-danger my-auto">xxxxxxxxx</label>
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Discount:</label>
                                        <select class="form-control select-sm w-50" onchange="getptdiscount(this.value)">
                                          <option value="">Select</option>
                                          <?php 
                                            $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_discount`";
                                            $result=$con->query($sql);
                                            while($row=$result->fetch_assoc()){ ?>
                                              <option value="<?php echo $row['discount_id']?>"><?php echo $row['discount_name'].' ('.$row['discount_rate'].'%)';?></option>
                                            <?php } ?> 
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Payment Date: </label>
                                        <input type="text" name="payment_date" class="form-control h-25" value='<?php echo date('Y-m-d');?>' readonly>
                                    </div>
                                </div>
                                <div class="row pl-5 mt-4">
                                    <div class="col  p-0 d-inline-flex">
                                      <label class="span1 control-label pr-5 my-auto">Tax: </label>
                                      <select class="form-control select-sm mr-2 print-logo">
                                        <option value="">Select</option>
                                        <?php 
                                            $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate`";
                                            $result=$con->query($sql);
                                            while($row=$result->fetch_assoc()){ ?>
                                              <option value="<?php echo $row['taxrate_id']?>"><?php echo $row['tax_name'].' ('.$row['tax_rate'].'%)';?></option>
                                            <?php } ?>
                                      </select> 
                                      <button class="btn btn-warning p-1 f-11"><i class="fa fa-plus"></i>Add tax</button>
                                    </div>     
                                </div>
                                <div class="row mt-2">
                                  <div class="col">
                                    <div class="table-responsive">
                                      <table class="table table-responsive table-bordered bill-table">
                                        <thead class="thead-light font-weight-bold"> 
                                          <th>Plan</th>
                                          <th>Duration</th>
                                          <th>Amount</th>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Select Plan</td>
                                            <td>duration</td>
                                            <td class="float-right">₹ 0.00</td>
                                          </tr>
                                            <tr>
                                              <td class="thick-line"></td>
                                              <td class="thick-line text-center"><strong class="float-right">Net total</strong></td>
                                              <td class="thick-line text-right">₹0.00</td>
                                            </tr>
                                             <tr>
                                              <td class="no-line"></td>
                                              <td class="no-line text-center"><strong class="float-right">Grand Total</strong></td>
                                              <td class="no-line text-right">₹0.00</td>
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div> 
                  </form>
                  </div>  
                  <div class="modal-footer">
                      <a href="ptprint.php" target="_blank" class="btn btn-outline-primary p-1"><i class="fa fa-print p-1"></i>Print</a>
                      <a type="button" name="ptpaid" id="ptpaid" class="btn btn-outline-success p-1 text-success"><i class="fa fa-check p-1 text-success"></i>Paid</a>
                      <button type="button" class="btn btn-outline-danger p-1" data-dismiss="modal"><i class="fa fa-times p-1"></i>Close</button>  
                  </div>  
             </div>  
        </div>  
      </div>
    <!-- .. PT modal end... -->

    <!-- ....  membership payment  modal start... -->
      <div id="membership_data_Modal" class="modal">  
        <div class="modal-dialog modal-xl">  
            <div class="modal-content">  
                <div class="modal-header pb-1 pt-2 bg-secondary">  
                    <h4 class="modal-title">Membership Payment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body" id="membershippayment_update">  
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                        <div class="form-group mb-0">
                            <div class="row">
                              <div class="col-sm-3 bor-r">
                                <div class="row">
                                    <label class="col-md-6 control-label break-word">Customer Name</label>
                                    <label class="col-md-6 control-label white-space" name="mcustomer_name" id="mcustomer_name"></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-6 control-label white-space">Email</label>
                                        <label class="col-md-6 mb-0 control-label break-word" name="memail" id="memail"></label>
                                    </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-6 mb-0 control-label white-space">Contact</label>
                                        <label class="col-md-6 mb-0 control-label break-word" name="mcontact" id="mcontact"></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                      <label class="col-md-6 control-label">Age</label>
                                      <label class="col-md-6 control-label" id="mage" name="mage"></label>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="row ">
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                      <label class="col-md-6 control-label white-space">Blood Group</label>
                                      <label class="col-md-6 mb-0 control-label" name="mblood_group" id="mblood_group"></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                    <label class="col-md-6 control-label white-space">Gender & Civil Status</label>
                                    <label class="col-md-6 control-label white-space" name="mgendermarried" id="mgendermarried"></label>
                                 </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-6 control-label white-space">Health & Fitness</label>
                                        <label class="col-md-6 control-label white-space" name="mfitness" id="mfitness" ></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="row">
                                      <label class="col-md-6 control-label white-space">Date of Joining</label>
                                      <label class="col-md-6 control-label break-word" name="mjoined_date" id="mjoined_date"></label>
                                  </div>
                                </div>
                            </div>
                        </div>
                          <hr>
                           <div class="form-group mb-0">
                            <div class="row">
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-4 control-label my-auto">Plan</label>
                                        <div class="col-md-8">

                                            <select name="mplan" id="mplan" class="form-control select-sm" required>
                                              <option value=" "> Select </option>
                                             <?php 
                                                $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_membership` WHERE `plan`='1'";
                                                $result=$con->query($sql);
                                                while($row=$result->fetch_assoc()){ ?>
                                              <option value="<?php echo $row['membership_id']?>"><?php echo $row['name'];?></option>
                                              <?php } ?>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 bor-r">
                                  <div class="row">
                                        <label class="col-md-5 control-label my-auto">Starting Date</label>
                                        <div class="col-md-7">
                                            <input type="text" name="mstarting_date" id="mstarting_date"  class="form-control select-sm"  required readonly value='<?php echo date('Y-m-d');?>'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="row">
                                        <label class="col-md-5 control-label my-auto">Expiry Date</label>
                                        <div class="col-md-7">
                                            <input type="date" name="mexpiry_date" id="mexpiry_date" class="form-control select-sm"  required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 float-right">
                                  <input type="hidden" name="mupdate_customer_id" id="mupdate_customer_id"/>  
                                  <input type="button" name="mupdate" id="mupdate" value="Update" class="btn btn-success pr-4 pl-4 m-1 pb-1 pt-1 float-right"/>
                                </div>
                                </div>
                          </div> 
                        <div class="form-group mb-0">
                            <div class="d-container border p-2 mt-1 " id="mb_payment">
                              <div class="row">
                               <div class="col-sm-1 ">
                                    <button class=" btn btn-info btn-width pay-btn p-2"  type="button" id="cash" value="Cash">Cash</button>
                                    <button class=" btn btn-info mt-2 btn-width pay-btn p-2"  type="button" id="card" value="Card">Card</button>
                                    <button class=" btn btn-info mt-2 btn-width pay-btn p-1 pt-2 pb-2 text-center" type="button" id="cheque" value="Cheque">Cheque</button>
                                </div>
                                <div class="col-sm-11">
                                  <!---- card ----------->
                                  <div class="row pl-5 mb-2" id="card_section" style="display: none;">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2 my-auto">Card No: </label>
                                        <input type="text" name="mcard_no" id="mcard_no" class="form-control h-25" placeholder="last 4 digits">
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Holders name</label>
                                        <input type="text" name="mholder_name" id="mholder_name" class="form-control h-25" placeholder="Holders Name">
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Exp Date: </label>
                                        <input type="date" name="mcard_exp_date" id="mcard_exp_date" class="form-control h-25">
                                    </div>
                                </div>
                                <!---------card ----------->
                                <!---- cheque----------->
                                  <div class="row pl-5 mb-2" id="cheque_section" style="display: none;">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2 my-auto">Cheque No: </label>
                                        <input type="text" name="cheque_no" id="cheque_no" class="form-control h-25" placeholder="Cheque No">
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Account number</label>
                                        <input type="text" name="acc_no" id="acc_no" class="form-control h-25" placeholder="Accnt No">
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Cheque Date: </label>
                                        <input type="date" name="cheque_date" id="cheque_date" class="form-control h-25">
                                    </div>
                                </div>
                                <!---------cheque ----------->
                                  <div class="row pl-5">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2 my-auto">Receipt No: </label>
                                        <label name="mreceipt_no" id="mreceipt_no" class="span1 control-label pr-2 text-danger my-auto">xxxxxxxxx</label>
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Discount:</label>
                                        <select class="form-control select-sm" onchange="getdiscount(this.value)">
                                          <option value="">Select</option>
                                          <?php 
                                            $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_discount`";
                                            $result=$con->query($sql);
                                            while($row=$result->fetch_assoc()){ ?>
                                              <option value="<?php echo $row['discount_id']?>"><?php echo $row['discount_name'].' ('.$row['discount_rate'].'%)';?></option>
                                            <?php } ?>  
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2 my-auto">Payment Date: </label>
                                        <input type="text" name="payment_date" class="form-control h-25" value='<?php echo date('Y-m-d');?>' readonly>
                                    </div>
                                </div>
                                <div class="row pl-5 mt-4">
                                    <div class="col p-0 d-inline-flex">
                                      <label class="span1 control-label pr-5 my-auto">Tax: </label>
                                      <select class="form-control select-sm mr-2 print-logo">
                                        <option value="">Select</option>
                                        <?php 
                                            $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate`";
                                            $result=$con->query($sql);
                                            while($row=$result->fetch_assoc()){ ?>
                                              <option value="<?php echo $row['taxrate_id']?>"><?php echo $row['tax_name'].' ('.$row['tax_rate'].'%)';?></option>
                                            <?php } ?>  
                                      </select>
                                      <button class="btn btn-warning p-1 f-11"><i class="fa fa-plus"></i>Add tax</button>
                                    </div>  
                                </div>
                                <div class="row mt-2">
                                  <div class="col">
                                    <div class="table-responsive">
                                      <table class="table table-responsive table-bordered bill-table">
                                        <thead class="thead-light font-weight-bold"> 
                                          <th>Plan</th>
                                          <th>Duration</th>
                                          <th>Amount</th>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Select Plan</td>
                                            <td>duration</td>
                                            <td class="float-right">₹ 0.00</td>
                                          </tr>
                                            <tr>
                                              <td class="thick-line"></td>
                                              <td class="thick-line text-center"><strong class="float-right">Net total</strong></td>
                                              <td class="thick-line text-right">₹0.00</td>
                                            </tr>
                                             <tr>
                                              <td class="no-line"></td>
                                              <td class="no-line text-center"><strong class="float-right">Grand Total</strong></td>
                                              <td class="no-line text-right">₹0.00</td>
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">  
                      <a href="print.php" target="_blank" class="btn btn-outline-primary p-1"><i class="fa fa-print p-1"></i>Print</a>
                      <a type="button" name="mpaid" id="mpaid" class="btn btn-outline-success p-1 text-success"><i class="fa fa-check p-1 text-success"></i>Paid</a>
                       <button type="button" class="btn btn-outline-danger p-1" data-dismiss="modal"><i class="fa fa-times p-1"></i>Close</button>  
                  </div>   
                  </form>
                  </div>  
                  
             </div>  
        </div>  
      </div>
    <!-- .. membership payment modal end... -->
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
      $(document).on('click', '#mupdate', function(){
            var mupdate_customer_id=$('#mupdate_customer_id').val();
            var mplan=$('#mplan').val();
            var mstarting_date=$('#mstarting_date').val();
            var mexpiry_date=$('#mexpiry_date').val();
             $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{mupdate_customer_id:mupdate_customer_id,mplan:mplan,mstarting_date:mstarting_date,mexpiry_date:mexpiry_date},  
                dataType:"html",  
                success:function(data){   
                    $('#mb_payment').html(data);
                    $('#mupdate').hide();
                } 
             });     
      }); 
      $(document).on('click', '#ptupdate', function(){
            var ptupdate_customer_id=$('#ptupdate_customer_id').val();
            var ptpersonal_plan=$('#ptpersonal_plan').val();
            var ptpersonal_starting_date=$('#ptpersonal_starting_date').val();
            var ptpersonal_expiry_date=$('#ptpersonal_expiry_date').val();
            var ptpersonal_trainer_id=$('#ptpersonal_trainer').val();
             $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{ptupdate_customer_id:ptupdate_customer_id,ptpersonal_plan:ptpersonal_plan,ptpersonal_starting_date:ptpersonal_starting_date,ptpersonal_expiry_date:ptpersonal_expiry_date,ptpersonal_trainer_id:ptpersonal_trainer_id},  
                dataType:"html",  
                success:function(data){   
                    $('#pt_payment').html(data);
                    $('#ptupdate').hide();
                } 
             });     
      }); 

      $(document).on('click', '#mpaid', function(){

      var mp_payment_type="Cash";
      var card = {};
      if($("#card").hasClass("active")){
          var card_no=$('#mcard_no').val();
          var mholder_name=$('#mholder_name').val();
          var mcard_exp_date=$('#mcard_exp_date').val();
          console.log(card_no+"+"+mholder_name+"+"+mcard_exp_date);
          mp_payment_type="Card";
          card['card_no'] = card_no;
          card['mholder_name'] = mholder_name;
          card['mcard_exp_date'] = mcard_exp_date;
        }
        var cheque = {};
        if($("#cheque").hasClass("active")){
          var cheque_no=$('#cheque_no').val();
          var acc_no=$('#acc_no').val();
          var cheque_date=$('#cheque_date').val();
          console.log(cheque_no+"+"+acc_no+"+"+cheque_date);
          mp_payment_type="Cheque";
          cheque['cheque_no'] = cheque_no;
          cheque['acc_no'] = acc_no;
          cheque['cheque_date'] = cheque_date;
        }
            var mp_update_customer_id=$('#mupdate_customer_id').val();
            var mp_customer_membership_id=$('#customer_membership_id').val();
            var mp_receipt_no=$('#mp_receipt_no').html();
            var obj = {};
            obj['Net Total'] = $('#mnet_total').html();
            $('[id^=mtax_tr]').each(function () {
                    var id = $(this).attr('id');
                    id=id.replace('mtax_tr','');
                    obj[$('[id^=mtaxtitle'+id+']').html()]=$('[id^=mtaxrate'+id+']').html();
                  });
            for (var key in obj) {
              console.log("key " + key + " has value " + obj[key]);
            }
            obj['Discount'] = $('#mdiscountrate').html();
            obj['Grand Total'] = $('#mgrandtotal').html();
             $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{mp_update_customer_id:mp_update_customer_id,mp_customer_membership_id:mp_customer_membership_id,mp_receipt_no:mp_receipt_no,total_details:obj,mp_payment_type:mp_payment_type,cheque:cheque,card:card},  
                dataType:"html",  
                success:function(data){   
                    $("#mpaid").hide();
                } 
             });     
      });

      <?php 
      if(isset($_GET['c-id'])){?>
          var c_id='<?php echo $_GET["c-id"];?>';
          $("#tr"+c_id).addClass("selected");
     <?php }  ?>

      $(document).on('click', '.edit_pt_data', function(){  //pt edit modal
           var ptcustomer_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{ptcustomer_id:ptcustomer_id},  
                dataType:"json",  
                success:function(data){  
                     $('#ptcustomer_name').html(data.fname+' '+data.lname);  
                     $('#ptemail').html(data.email);  
                     $('#ptcontact').html(data.contact);
                     $('#ptdob').html(data.dob);  
                     $('#ptage').html(data.age);  
                     $('#ptblood_group').html(data.blood_group); 
                     $('#ptgendermarried').html(data.gender+', '+data.married_status);  
                    // $('#ptmarried_status').html(data.married_status); 
                     $('#ptfitness').html(data.feet+"' "+data.inches+'", '+data.weight+"kg"); 
                     $('#ptaddress').html(data.address); 
                     $('#ptguardian_name').html(data.guardian_name);  
                     $('#ptrelation').html(data.relation); 
                     $('#ptguardian_contact').html(data.guardian_contact);
                     $('#ptorganization').html(data.organization); 
                     $('#ptjoined_date').html(data.joined_date);
                     $('#ptplan').html(data.name);
                     //$('#ptpayment_mode').html(data.payment_mode);
                     $('#ptstarting_date').html(data.customer_membership_starting_date);
                     $('#ptexpiry_date').html(data.customer_membership_expiry_date);
                     //$('#ptpersonal_trainer').val(data.personal_trainer);
                     //$('#ptpersonal_plan').val(data.personal_plan);
                     //$('#ptpersonal_payment_mode').val(data.personal_payment_mode);
                     //$('#ptpersonal_expiry_date').val(data.personal_expiry_date);
                     //$('#ptpersonal_starting_date').val(data.personal_starting_date);
                     $('#ptupdate_customer_id').val(data.customer_id);  
                     $('#insert').val("Update");  
                     $('#pt_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.edit_mdata', function(){  //membership edit modal
           var customer_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{customer_id:customer_id},  
                dataType:"json",  
                success:function(data){  
                     $('#mcustomer_name').html(data.fname+' '+data.lname);  
                     $('#memail').html(data.email);  
                     $('#mcontact').html(data.contact);
                     $('#mdob').html(data.dob);  
                     $('#mage').html(data.age);  
                     $('#mblood_group').html(data.blood_group); 
                     $('#mgendermarried').html(data.gender+', '+data.married_status);  
                    // $('#mmarried_status').html(data.married_status); 
                     $('#mfitness').html(data.feet+"' "+data.inches+'", '+data.weight+"kg"); 
                    //$('#maddress').html(data.address); 
                    // $('#mguardian_name').html(data.guardian_name);  
                    // $('#mrelation').html(data.relation); 
                    // $('#mguardian_contact').html(data.guardian_contact);
                    // $('#morganization').html(data.organization); 
                     $('#mjoined_date').html(data.joined_date);
                     //$('#mplan').html(data.plan);
                     //$('#mpayment_mode').html(data.payment_mode);
                    // $('#mstarting_date').val(data.starting_date);
                     //$('#mexpiry_date').html(data.expiry_date);
                     
                     $('#mupdate_customer_id').val(data.customer_id);  
                     $('#insert').val("Update");  
                     $('#membership_data_Modal').modal('show');  

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
      });
    </script>
 <script >
  /*.......Membership expiry date finding start......*/
  $("#mplan").change(function()
  {  
    var membership_plan_id = $('#mplan').val();  
    var mstarting_date =$('#mstarting_date').val();
       $.ajax({  
              url:"fetch.php",  
              method:"POST",  
              data:{membership_plan_id:membership_plan_id,mstarting_date:mstarting_date},  
              dataType:"html",  
              success:function(data){
                  $('#mexpiry_date').val(data); 
            }  
          });   
  });
  /*.......Membership expiry date finding end......*/

   
  $(document).on('click', '#add_tax_btn', function(){ 
     $("select[id^= mtax]").each(function(){
          console.log($(this).attr("id"));
      });
     var mtax_tr_cnt=$('[id^=mtax_tr]').length;
      var output ='<select id="mtax'+(mtax_tr_cnt+1)+'" class="form-control select-sm mr-2 print-logo" onchange=gettax(this.value,'+(parseInt(mtax_tr_cnt)+1)+')><option value="">Select</option>';
        <?php $sql2="SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate`";
              $result2=$con->query($sql2);
              while($row2=$result2->fetch_assoc()){ echo $row2["taxrate_id"]; ?>

              output +='<option value="<?php echo $row2["taxrate_id"]?>"><?php echo $row2["tax_name"]?> (<?php echo $row2["tax_rate"]?>%)</option>';
              console.log(output);
              <?php } ?>
              output +='</select>';
             $( "#mtax"+mtax_tr_cnt ).after( output ); 
  });
  function calculate_age(val)
  {
    var dob = val;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    $('#age').val(age);
  }
  function getdiscount(val)
  {
    if(val!=''){
      $('#mdiscount_tr').remove();
    var mnet_total=$('#mnet_total').text().replace(/,/g , '');
    var mgrandtotal=$('#mgrandtotal').text().replace(/,/g , '');
    var mtaxrate=0;
      $.ajax({  
              url:"fetch.php",  
              method:"POST",  
              data:{mdiscount_id:val,mnet_total:mnet_total},  
              dataType:"html",  
              success:function(data){
                  $( "#tr_mgrandtotal" ).before( data );
            } ,complete:function(data){
                  var mdiscountrate= $('#mdiscountrate').text().replace(/,/g , '');
                  var sum = 0;
                  $('[id^=mtax_tr]').each(function () {
                    var id = $(this).attr('id');
                    id=id.replace('mtax_tr','');
                    var counter = $('[id^=mtaxrate'+id+']').html();
                    sum =parseFloat(sum)+parseFloat(counter);
                  });
                  var newgrandtotal=parseFloat(mnet_total)-parseFloat(mdiscountrate)+parseFloat(sum);
                  $('#mgrandtotal').html(newgrandtotal.toFixed('2'));
            }
          });
      }else{
        $('#mdiscount_tr').remove();
        $('#mgrandtotal').html($('#mnet_total').text().replace(/,/g , ''));
      }   
  }
  function gettax(val,cnt)
  {
    var mnet_total=$('#mnet_total').text().replace(/,/g , '');
    var mdiscountrate=0;
    if($('#mdiscountrate').length){
        mdiscountrate= $('#mdiscountrate').text().replace(/,/g , '');
    }
    if(val!=''){
    
    var mgrandtotal=$('#mgrandtotal').text().replace(/,/g , '');
    if($('#mtax_tr'+cnt).length){
        $('#mtax_tr'+cnt).remove();
    }
    var mtax_tr_cnt=$('[id^=mtax_tr]').length;
    

      $.ajax({
              url:"fetch.php",  
              method:"POST",  
              data:{mtaxrate_id:val,mnet_total:mnet_total,mtax_tr_cnt:mtax_tr_cnt},  
              dataType:"html",  
              success:function(data){
                  $( "#tr_mgrandtotal" ).before( data );
            }, complete:function(data){
                  //var mtaxrate= $('#mtaxrate'+cnt).text();
                  var sum=addtax();
                  var newgrandtotal=parseFloat(mnet_total)+parseFloat(sum)-parseFloat(mdiscountrate);
                  $('#mgrandtotal').html(newgrandtotal.toFixed('2'));
            }
          });
      }else{
        $('#mtax_tr'+cnt).remove();
        var sum=addtax();

        var newgrandtotal=parseFloat(mnet_total)+parseFloat(sum)-parseFloat(mdiscountrate);
        $('#mgrandtotal').html(newgrandtotal.toFixed('2'));
      }   
  }

  function addtax(){
    /* sum of all tax  */
                  var sum = 0;
                  $('[id^=mtax_tr]').each(function () {
                    var id = $(this).attr('id');
                    id=id.replace('mtax_tr','');
                    var counter = $('[id^=mtaxrate'+id+']').html();
                    sum =parseFloat(sum)+parseFloat(counter);
                  });
                  return sum;
                  /* sum of all tax */
  }
  /*PT */

  $(document).on('click', '#ptpaid', function(){
        var pt_payment_type="Cash";
        var ptcard = {};
      if($("#ptcard").hasClass("active")){
          var ptcard_no=$('#ptcard_no').val();
          var ptholder_name=$('#ptholder_name').val();
          var ptcard_exp_date=$('#ptcard_exp_date').val();
          pt_payment_type="Card";
          ptcard['ptcard_no'] = ptcard_no;
          ptcard['ptholder_name'] = ptholder_name;
          ptcard['ptcard_exp_date'] = ptcard_exp_date;
        }
         var ptcheque = {};
        if($("#ptcheque").hasClass("active")){
          var ptcheque_no=$('#ptcheque_no').val();
          var ptacc_no=$('#ptacc_no').val();
          var ptcheque_date=$('#ptcheque_date').val();
          pt_payment_type="Cheque";
          ptcheque['ptcheque_no'] = ptcheque_no;
          ptcheque['ptacc_no'] = ptacc_no;
          ptcheque['ptcheque_date'] = ptcheque_date;
        }
            var pt_update_customer_id=$('#ptupdate_customer_id').val();
            var customer_pt_trainer_id=$('#ptpersonal_trainer').val();
            var customer_pt_id=$('#customer_pt_id').val();
            var pt_receipt_no=$('#pt_receipt_no').html();
            var obj = {};
            obj['Net Total'] = $('#ptnet_total').html();
            $('[id^=pttax_tr]').each(function () {
                    var id = $(this).attr('id');
                    id=id.replace('pttax_tr','');
                    obj[$('[id^=pttaxtitle'+id+']').html()]=$('[id^=pttaxrate'+id+']').html();
                  });
            for (var key in obj) {
              console.log("key " + key + " has value " + obj[key]);
            }
            obj['Discount'] = $('#ptdiscountrate').html();
            obj['Grand Total'] = $('#ptgrandtotal').html();
             $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{pt_update_customer_id:pt_update_customer_id,customer_pt_id:customer_pt_id,pt_receipt_no:pt_receipt_no,total_details:obj,customer_pt_trainer_id:customer_pt_trainer_id,pt_payment_type:pt_payment_type,ptcard:ptcard,ptcheque:ptcheque},  
                dataType:"html",  
                success:function(data){   
                    $("#ptpaid").hide();
                } 
             });     
      });

      <?php 
      if(isset($_GET['c-id'])){?>
          var c_id='<?php echo $_GET["c-id"];?>';
          $("#tr"+c_id).addClass("selected");
     <?php }  ?>
      /*.......PT expiry date finding end......*/
  $(document).on('click', '#add_tax_btnpt', function(){ 
     $("select[id^= pttax]").each(function(){
          console.log($(this).attr("id"));
      });
     var pttax_tr_cnt=$('[id^=pttax_tr]').length;
      var output ='<select id="pttax'+(pttax_tr_cnt+1)+'" class="form-control select-sm mr-2 print-logo" onchange=getpttax(this.value,'+(parseInt(pttax_tr_cnt)+1)+')><option value="">Select</option>';
        <?php $sql2="SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate`";
              $result2=$con->query($sql2);
              while($row2=$result2->fetch_assoc()){ echo $row2["taxrate_id"]; ?>

              output +='<option value="<?php echo $row2["taxrate_id"]?>"><?php echo $row2["tax_name"]?> (<?php echo $row2["tax_rate"]?>%)</option>';
              console.log(output);
              <?php } ?>
              output +='</select>';
             $( "#pttax"+pttax_tr_cnt ).after( output ); 
  });
   function getptdiscount(val)
  {
    if(val!=''){
      $('#ptdiscount_tr').remove();
    var ptnet_total=$('#ptnet_total').text().replace(/,/g , '');
    var ptgrandtotal=$('#ptgrandtotal').text().replace(/,/g , '');
    var pttaxrate=0;
      $.ajax({  
              url:"fetch.php",  
              method:"POST",  
              data:{ptdiscount_id:val,ptnet_total:ptnet_total},  
              dataType:"html",  
              success:function(data){
                  $( "#tr_ptgrandtotal" ).before( data );
            } ,complete:function(data){
                  var ptdiscountrate= $('#ptdiscountrate').text().replace(/,/g , '');
                  var sum = 0;
                  $('[id^=pttax_tr]').each(function () {
                    var id = $(this).attr('id');
                    id=id.replace('pttax_tr','');
                    var counter = $('[id^=pttaxrate'+id+']').html();
                    sum =parseFloat(sum)+parseFloat(counter);
                  });
                  var newgrandtotal=parseFloat(ptnet_total)-parseFloat(ptdiscountrate)+parseFloat(sum);
                  $('#ptgrandtotal').html(newgrandtotal.toFixed('2'));
            }
          });
      }else{
        $('#ptdiscount_tr').remove();
        $('#ptgrandtotal').html($('#ptnet_total').text().replace(/,/g , ''));
      }   
  }
  function getpttax(val,cnt)
  {
    var ptnet_total=$('#ptnet_total').text().replace(/,/g , '');
    var ptdiscountrate=0;
    if($('#ptdiscountrate').length){
        ptdiscountrate= $('#ptdiscountrate').text().replace(/,/g , '');
    }
    if(val!=''){
    
    var ptgrandtotal=$('#ptgrandtotal').text().replace(/,/g , '');
    if($('#pttax_tr'+cnt).length){
        $('#pttax_tr'+cnt).remove();
    }
    var pttax_tr_cnt=$('[id^=pttax_tr]').length;
    

      $.ajax({
              url:"fetch.php",  
              method:"POST",  
              data:{pttaxrate_id:val,ptnet_total:ptnet_total,pttax_tr_cnt:pttax_tr_cnt},  
              dataType:"html",  
              success:function(data){
                  $( "#tr_ptgrandtotal" ).before( data );
            }, complete:function(data){
                  //var mtaxrate= $('#mtaxrate'+cnt).text();
                  var sum=addpttax();
                  var newgrandtotal=parseFloat(ptnet_total)+parseFloat(sum)-parseFloat(ptdiscountrate);
                  $('#ptgrandtotal').html(newgrandtotal.toFixed('2'));
            }
          });
      }else{
        $('#pttax_tr'+cnt).remove();
        var sum=addpttax();

        var newgrandtotal=parseFloat(ptnet_total)+parseFloat(sum)-parseFloat(ptdiscountrate);
        $('#ptgrandtotal').html(newgrandtotal.toFixed('2'));
      }   
  }

  function addpttax(){
    /* sum of all tax  */
                  var sum = 0;
                  $('[id^=pttax_tr]').each(function () {
                    var id = $(this).attr('id');
                    id=id.replace('pttax_tr','');
                    var counter = $('[id^=pttaxrate'+id+']').html();
                    sum =parseFloat(sum)+parseFloat(counter);
                  });
                  return sum;
                  /* sum of all tax */
  }
  /*.......PT expiry date finding start......*/
  $("#ptpersonal_plan").change(function()
  {  
    var pt_plan_id = $('#ptpersonal_plan').val();  
    var ptpersonal_starting_date =$('#ptpersonal_starting_date').val();
       $.ajax({  
              url:"fetch.php",  
              method:"POST",  
              data:{pt_plan_id:pt_plan_id,ptpersonal_starting_date:ptpersonal_starting_date},  
              dataType:"html",  
              success:function(data){
                  $('#ptpersonal_expiry_date').val(data); 
            }  
          });   
  });
  /*.......PT expiry date finding end......*/

</script>
<script>
$(document).ready(function(){
$(document).on('click', '#card', function(){
    $("#card_section").show();
    $("#cheque_section").hide();
    $("#card").removeClass("active");
    $("#cheque").removeClass("active");
    $("#cash").removeClass("active");
    $("#card").addClass("active");
  });
  $(document).on('click', '#cheque', function(){
    $("#cheque_section").show();
    $("#card_section").hide();
    $("#cheque").removeClass("active");
    $("#cash").removeClass("active");
    $("#card").removeClass("active");
    $("#cheque").addClass("active");
  });
  $(document).on('click', '#cash', function(){
    $("#cheque_section").hide();
    $("#card_section").hide();
    $("#cheque").removeClass("active");
    $("#cash").removeClass("active");
    $("#card").removeClass("active");
    $("#cash").addClass("active");
  });
  /* PT */
  $(document).on('click', '#ptcash', function(){
    $("#ptcheque_section").hide();
    $("#ptcard_section").hide();
    $("#ptcheque").removeClass("active");
    $("#ptcash").removeClass("active");
    $("#ptcard").removeClass("active");
    $("#ptcash").addClass("active");
  });
 $(document).on('click', '#ptcard', function(){
    $("#ptcard_section").show();
    $("#ptcheque_section").hide();
    $("#ptcard").removeClass("active");
    $("#ptcheque").removeClass("active");
    $("#ptcash").removeClass("active");
    $("#ptcard").addClass("active");
  });
  $(document).on('click', '#ptcheque', function(){
    $("#ptcheque_section").show();
    $("#ptcard_section").hide();
    $("#ptcheque").removeClass("active");
    $("#ptcash").removeClass("active");
    $("#ptcard").removeClass("active");
    $("#ptcheque").addClass("active");
  });
  
});
</script>
</body>
</html>