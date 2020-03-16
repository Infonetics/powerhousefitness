<?php session_start(); ?>
<link href="assets/css/argon-dashboard.css" rel="stylesheet" />
<link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
                  <div class="d-container m-4">
                    <div class="print-header text-center  bottom-border">
                    <div class="row">
                      <div class="col-sm-3 text-center text-dark">
                        <img src="images/print-powerfousefitness.png" class="print-logo float-left mt-3 pl-5 img-fluid">
                      </div>
                      <div class="col-sm-6">
                        <h1 class="text-center f-40 mb-0">POWERHOUSE FITNESS</h1>
                        <label class="mb-0"> Sree Vinayaka Arcade, Market Jn, Kottarakkara</label><br>
                        <label class="mb-0"><i class="fa fa-envelope p-1"></i>powerhousefitnesscentre@gmail.com</label><br>
                        <label><i class="fa fa-phone p-1"></i>+91 8086250000</label>
                      </div>
                    </div>
                  </div>
                  <div>
                    <?php include("include/config.php");
                         $query = "SELECT * FROM `tbl_customer_membership` cm 
                          left join `tbl_customer` c on(c.`customer_id`=cm.`customer_id`)
                          left join `tbl_mp_payment` mpp on(mpp.`mp_payment_customer_membership_id`=cm.`customer_membership_id`)
                          left join `tbl_total` t on(t.`mp_customer_membership_id`=cm.`customer_membership_id`)
                          WHERE cm.`customer_membership_id` = '".$_SESSION['mp_customer_membership_id']."' ORDER BY `mp_payment_id` DESC "; 
                          $result = $con->query($query);  
                          $row = mysqli_fetch_array($result);
                    ?>

                    <div class="row">
                      <div class="col-sm-6">
                      <div class="row pl-4 mt-2 f-14">
                      <div class="col-sm-6 ">
                        <label>Customer Name:</label>
                      </div>
                      <div class="col-sm-6">
                        <label><?php echo $row['fname'].' '.$row['lname'];?></label>
                      </div>
                    </div>
                    <div class="row pl-4 f-14">
                      <div class="col-sm-6">
                        <label>Customer ID:</label>
                      </div>
                      <div class="col-sm-6">
                        <label><?php echo $row['customer_id'];?></label>
                      </div>
                    </div>
                    <div class="row pl-4 f-14">
                      <div class="col-sm-6">
                        <label>Operator:</label>
                      </div>
                      <div class="col-sm-6">
                        <label>-</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row pl-4 mt-2 f-14">
                      <div class="col-sm-6 ">
                        <label>Receipt No:</label>
                      </div>
                      <div class="col-sm-6">
                        <label><?php echo $row['receipt_no'];?></label>
                      </div>
                    </div>
                    <div class="row pl-4 f-14">
                      <div class="col-sm-6">
                        <label>Date & Time:</label>
                      </div>
                      <div class="col-sm-6">  
                        <label><?php echo $row['total_payment_date'];?></label>
                      </div>
                    </div>
                    <div class="row pl-4 f-14">
                      <div class="col-sm-6">
                        <label>Payment Type:</label>
                      </div>
                      <div class="col-sm-6">
                        <label><?php echo $row['mp_payment_type'];?></label>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="table-responsive p-3">
                      <table class="table table-responsive table-bordered bill-table">
                        <thead class="thead-light font-weight-bold"> 
                          <tr>
                            <th>Plan</th>
                            <th>Duration</th>
                            <th>Amount</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $query = "SELECT * FROM `tbl_customer_membership` cm 
                          left join `tbl_membership` m on(m.`membership_id`=cm.`membership_id`)
                          left join `tbl_total` t on(t.`mp_customer_membership_id`=cm.`customer_membership_id`)
                          WHERE cm.`customer_membership_id` = '".$_SESSION['mp_customer_membership_id']."' ORDER BY t.`sort_order` ASC"; 
                          $result = $con->query($query);  
                          $data=array();$totals=array();
                          $row = mysqli_fetch_array($result);
                                $data['plan_name']        = $row['name'];
                                $data['cm_starting_date'] = $row['customer_membership_starting_date'];
                                $data['cm_expiry_date']   = $row['customer_membership_expiry_date'];
                                $data['price']            = $row['price'];
                          $query="SELECT * FROM `tbl_total` WHERE `mp_customer_membership_id`= '".$_SESSION['mp_customer_membership_id']."' ORDER BY `sort_order` ASC"; 
                          $result = $con->query($query); 
                          while($row=$result->fetch_assoc()){
                            $totals[]=array(
                                $row['title_text']=> $row['total_amount'],
                            );
                          }// echo "<pre>";print_r($total);
                       ?>
                        <tr>
                          <td><?php echo $data['plan_name']?></td>
                          <td><?php echo $data['cm_starting_date'].' - '.$data['cm_expiry_date']?></td>
                          <td class="float-right">₹ <?php echo number_format($data['price'],2);?></td>
                        </tr>
                       
                        <?php  $cnt=1; 
                        foreach ($totals as  $total) { 
                          foreach ($total as $key=> $value) { 
                             if($cnt==1){
                                $class="thick-line";
                              }else{
                                $class=""; }
                        ?>
                        <tr>
                          <td class="<?=$class?>"></td>
                          <td class="<?=$class?> text-center"><strong class="float-right"><?php echo $key;?></strong></td>
                          <td class="<?=$class?> text-right">₹ <?php echo number_format($value,2);?></td>
                        </tr>
                     <?php $cnt++; } } ?>
                    </tbody>
                  </table>
              <div class="row top-border">
                <div class="col-sm-8">
                  <span class="text-muted">DECLARATION:-</span> <p class="text-muted">We declare that this invoice shows the actual price of the plans described and that all particulars are true and correct.</p>
                </div>
                <div class="col-sm-4">
                <div class="auth-box m-2 float-right text-center">
                  <span class="text-center f-12">FOR POWERHOUSE FITNESS</span><br>
                  <p class="text-muted text-center mt-6 small">Authorized Signatory & Seal</p>
                </div>
              </div>
                </div>
                  </div>
                  </div>
                  </div> 
                  <div class="modal-footer">  

<script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    window.print();
});
</script>      