
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Manage Payment History</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Manage Payment History</h3>
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
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Customer Id</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Customer Name</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Plan</th>
                         <!--  <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Plan Type</th> -->
                         <!--  <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Start Date</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Expiry Date</th> -->
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Plan Details</th>
                            <!-- <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">PT Plan</th> -->
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Amount</th>
                          <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Payment Date</th>
                          <!-- <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Action</th> -->
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th rowspan="1" colspan="1">Customer Id</th>
                          <th rowspan="1" colspan="1">Customer Name</th>
                          <th rowspan="1" colspan="1">Plan</th>
                          <th rowspan="1" colspan="1">Membership Plan</th>
                          <!-- <th rowspan="1" colspan="1">Start Date</th>
                          <th rowspan="1" colspan="1">Expiry Date</th> -->
                         <!--  <th rowspan="1" colspan="1">PT plan</th> -->
                          <th rowspan="1" colspan="1">Amount</th>
                          <th rowspan="1" colspan="1">Payment Date</th>
                        </tr>
                      </tfoot>  
                      <tbody>
                       <?php
                     
                       /* $sql = "SELECT * FROM tbl_customer c 
                                left join tbl_total tot on(c.`customer_id`=tot.`customer_id`)
                                left join tbl_customer_pt cpt on(cpt.`customer_pt_id`=tot.`customer_pt_id`)
                                left join tbl_pt_payment ptp on(ptp.`pt_payment_customer_pt_id`=cpt.`customer_pt_id` AND tot.`customer_pt_id`=ptp.`pt_payment_customer_pt_id`)
                                left join tbl_customer_membership cm on(cm.`customer_id`=c.`customer_id` AND tot.`mp_customer_membership_id`=cm.`customer_membership_id`)
                                left join tbl_mp_payment mp on(mp.`mp_payment_customer_membership_id`=cm.`customer_membership_id` )
                                left join tbl_membership mm on(mm.`membership_id`=cm.`membership_id`)
                                WHERE mp.`mp_payment_paid_status`>=3 OR ptp.`pt_payment_paid_status`>=3 ";*/
// ptp.`pt_payment_paid_status`>=3

                        echo $sql = "SELECT c.`customer_id`,c.`fname`,c.`lname`,cm.`cm_plan`,cpt.`pt_cm_plan`,mm.`name`,ptm.`name`,cm.`customer_membership_starting_date`,cm.`customer_membership_expiry_date`,cpt.`customer_pt_starting_date`,cpt.`customer_pt_expiry_date`,tot.`total_amount`,tota.`total_amount`,mp.`mp_payment_paid_status`,ptp.`pt_payment_paid_status`,ptp.`pt_payment_date`,mp.`mp_payment_date` FROM `".DB_PREFIX."`.`tbl_customer` c

                                left join `".DB_PREFIX."`.`tbl_customer_membership` cm on(cm.`customer_id`=c.`customer_id`)
                                left join `".DB_PREFIX."`.`tbl_membership` mm on(mm.`membership_id`=cm.`membership_id`)

                                left join (SELECT `mp_payment_customer_membership_id`, MAX(`mp_payment_paid_status`) AS mp_payment_paid_status,`mp_payment_date`  FROM `powerhousefitness`.`tbl_mp_payment` WHERE `mp_payment_paid_status` IN (4,3) GROUP BY `mp_payment_customer_membership_id` order by `mp_payment_paid_status` DESC) mp on(mp.`mp_payment_customer_membership_id` = cm.`customer_membership_id`)

                                left join `".DB_PREFIX."`.`tbl_total` tot on(tot.`mp_customer_membership_id`=mp.`mp_payment_customer_membership_id`)

                                left join `".DB_PREFIX."`.`tbl_customer_pt` cpt on(cpt.`customer_pt_id`=c.`customer_id`)
                                left join `".DB_PREFIX."`.`tbl_membership` ptm on(ptm.`membership_id`=cpt.`pt_membership_id`)
                                  
                                left join (SELECT `mp_payment_customer_membership_id`, MAX(`mp_payment_paid_status`) AS mp_payment_paid_status,`mp_payment_date`  FROM `".DB_PREFIX."`.`tbl_pt_payment` WHERE `mp_payment_paid_status` IN (4,3) GROUP BY `mp_payment_customer_membership_id` order by `mp_payment_paid_status` DESC) mp on(mp.`mp_payment_customer_membership_id` = cm.`customer_membership_id`) ptp on(ptp.`pt_payment_customer_pt_id`=cpt.`customer_pt_id`)

                                left join `".DB_PREFIX."`.`tbl_total` tota on(tota.`customer_pt_id`=ptp.`pt_payment_customer_pt_id`)

                                WHERE mp.`mp_payment_paid_status` IN(4,3) OR ptp.`pt_payment_paid_status`IN (4,3) GROUP BY mp.`mp_payment_customer_membership_id`,ptp.`pt_payment_customer_pt_id` order by mp.`mp_payment_paid_status`,ptp.`pt_payment_paid_status` DESC";

                                  

                                  //SELECT * FROM `tbl_mp_payment` WHERE `mp_payment_paid_status` IN (4,3) GROUP BY `mp_payment_customer_membership_id` order by `mp_payment_paid_status` DESC


                                //SELECT * FROM `tbl_pt_payment` WHERE `pt_payment_paid_status` IN (4,3) GROUP BY `pt_payment_customer_pt_id` order by `pt_payment_paid_status` DESC


                            $result = $con->query($sql);
                            while($row = $result->fetch_assoc()) { ?>
                           <tr>
                              <td class="td_desc"><?php echo $row['customer_id']; ?></td>
                              <td><?php echo' '.$row['fname'].' '.$row['lname']; ?></td>
                              <td class="td_desc"><?php 
                              if($row['pt_cm_plan']== 1 || $row['cm_plan']==1 )
                              {
                               echo "Membership </br>"; 
                              }
                              else
                              {
                                echo "Personal Training";
                              }                          
                              ?>
                                
                              </td>
                              
                              <!-- <td class="td_desc"><?php// echo $row['name'].'</br> FROM:'.$row['customer_pt_starting_date'].'</br> TO:'.$row['customer_pt_expiry_date']; ?></td> -->
                              <td class="td_desc">
                                <?php 
                                  if($row['pt_cm_plan'] OR $row['cm_plan']) 
                                    { echo $row['name'].'</br><span class="badge badge-default" style="font-size:11px;background-color:white;color:#5e72e4;">From :'.$row["customer_membership_starting_date"].'<br> To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:'.$row["customer_membership_expiry_date"].'</span>';
                                    }
                                    else
                                    {
                                      echo $row['name'].'</br><span class="badge badge-default" style="font-size:11px;background-color:white;color:#5e72e4;">From :'.$row["customer_pt_starting_date"].'<br> To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:'.$row["customer_pt_expiry_date"].'</span>';
                                    }
                                ?>
                              </td>
                              <td><?php echo $row['total_amount'];?></td>
                              <td class="td_desc"><?php if(/*$row['pt_pa yment_date'] OR*/ $row['mp_payment_date'] ) echo date('d-m-Y', strtotime($row['pt_date'])); ?></td>   
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
  
</body>

</html>