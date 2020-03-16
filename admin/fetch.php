<?php session_start();
 include('include/config.php');
  if(!isset($_SESSION["email"])) 
  {  ?>
          <script>
          window.location="login.php";
          </script>
    <?php 
  } 
  else 
  { 
             if(isset($_POST["testimonials_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_testimonials` WHERE testimonials_id = '".$_POST["testimonials_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_testimonials_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_testimonials` WHERE testimonials_id = ".$_POST['del_testimonials_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..trainer starts..*/

               if(isset($_POST["trainer_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_trainer` WHERE trainer_id = '".$_POST["trainer_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_trainer_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_trainer` WHERE trainer_id = ".$_POST['del_trainer_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..trainer ends..*/

               /*..membership starts..*/

               if(isset($_POST["membership_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_membership` WHERE membership_id = '".$_POST["membership_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_membership_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_membership` WHERE membership_id = ".$_POST['del_membership_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..membership ends..*/

               /*..Workout Classes..*/

               if(isset($_POST["workout_classes_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_workout_classes` WHERE workout_classes_id = '".$_POST["workout_classes_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_workout_classes_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_workout_classes` WHERE workout_classes_id = ".$_POST['del_workout_classes_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..Workout Classes..*/
              /*..Customer..*/

               if(isset($_POST["customer_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_customer` WHERE customer_id = '".$_POST["customer_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_customer_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_customer` WHERE customer_id = ".$_POST['del_customer_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..Customer..*/

              /* ...pt customer page trainer view starts...*/
              if(isset($_POST["v_customer_id"]))  
             {   
                  $query = "SELECT c.*,tr.`fname` as tfname FROM `".DB_PREFIX."`.`tbl_customer` c
                  left join tbl_customer_pt cpt on(cpt.`customer_id`=c.`customer_id`)
                  left join tbl_trainer tr on(tr.`trainer_id`=cpt.`customer_pt_trainer_id`)
                  WHERE cpt.`customer_id` = '".$_POST["v_customer_id"]."'"; 
                  // echo $query;
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  

              /*... pt customer page trainer view ends.....*/

               /*....adjust date in view pt custiomer -starts...*/
                if(isset($_POST["adjust_customer_id"]))  
             { 
                  $query = "SELECT *,tr.`fname` as tfname,tr.`lname` as tlname,c.`fname` as cfname FROM `".DB_PREFIX."`.`tbl_customer_pt` cpt
                  left join tbl_customer c on(c.`customer_id`=cpt.`customer_id`)
                  left join tbl_trainer tr on(tr.`trainer_id`=cpt.`customer_pt_trainer_id`)
                  left join tbl_membership m on(m.`membership_id`= cpt.`pt_membership_id`)
                  WHERE c.`customer_id` = '".$_POST["adjust_customer_id"]."'"; 
                  // echo $query;exit;
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             /*....adjust date in view pt custiomer -ends...*/

             /*.....update trainer on adjust date model starts..*/
            if(isset($_POST["update_pt_trainer"]))  
            {   
              echo $_POST['cu_trainer_labl']."</br>";

              $query= "UPDATE `".DB_PREFIX."`.`tbl_customer_pt` SET ";
              // var_dump( $_POST['pt_trainer_id']);
                      if(isset($_POST["pt_trainer_id"]) && $_POST["pt_trainer_id"] != '')
                      {
                        $query.="`customer_pt_trainer_id`= '".$_POST['pt_trainer_id']."'";
                      }

                      if((isset($_POST["pt_trainer_id"]) && $_POST["pt_trainer_id"] != '') && (isset($_POST["adj_date"]) && $_POST["adj_date"] != ''))
                      {
                          $query .=",,";
                      }
                       if(isset($_POST["adj_date"]) && $_POST["adj_date"] != '')
                      {
                        $query.="`customer_pt_expiry_date`= '".$_POST['adj_date']."'";
                      }
                       $query.=" WHERE `customer_id` = '".$_POST["tcustomer_id"]."'";
                  echo $query;
                  if($con->query($query))
                    { $msg=1; }
                    else
                    { $msg=0; }
                    echo $msg;
            }
             /*.....update trainer on adjust date model ends..*/

              /*....adjust date in view member custiomer  -starts...*/
                if(isset($_POST["adjust_customer_id_mb"]))  
             { 
                  $query = "SELECT * FROM  `".DB_PREFIX."`.`tbl_customer_membership` cm
                  left join tbl_customer c on(c.`customer_id`=cm.`customer_id`)
                  left join tbl_membership m on(m.`membership_id`= cm.`membership_id`)
                  WHERE c.`customer_id` = '".$_POST["adjust_customer_id_mb"]."'"; 
                  // echo $query;exit;
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             /*....adjust date in view member custiomer -ends...*/

            /*.....update adjust date membership view page model starts..*/
            if(isset($_POST["cm_customer_id"]))  
            {   
              echo $_POST['cm_customer_id']."</br>";
              $query= "UPDATE `".DB_PREFIX."`.`tbl_customer_membership` SET `customer_membership_expiry_date`='".$_POST["cm_adj_date"]."'
                      WHERE `customer_id` = '".$_POST["cm_customer_id"]."'";
                  // echo $query;exit;
                  if($con->query($query))
                    { $msg=1; }
                    else
                    { $msg=0; }
                    echo $msg;
            }
             /*.....update adjust date membership view page model ends..*/

              /*.....Create holiday starts ......*/
            if(isset($_POST["holiday"]))  
            {  
              $sql = "INSERT INTO `".DB_PREFIX."`.`tbl_holyday` (holiday_event, holiday_date,created_on)
                      VALUES ('".$_POST['holiday_event']."', '".$_POST['holiday_date']."',NOW())";
                      // echo $sql;exit;
                     $con->query($sql);
                     echo "inserted";

            }

             if(isset($_POST["holiday_id"]))   //edit 
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_holyday` WHERE holiday_id = '".$_POST["holiday_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  

              if(isset($_POST['holiday_update']))  //update
              {
                   $query= "UPDATE `".DB_PREFIX."`.`tbl_holyday` SET `holiday_event`= '".$_POST["holiday_event_edit"]."',`holiday_date`= '".$_POST["holiday_date_edit"]."',`last_modified`=NOW() WHERE `holiday_id`='".$_POST['holiday_update']."'";
                    // echo $query; exit;
                    $con->query($query);
                    echo "Updated";
              }

               if(isset($_POST['del_holiday_id'])) // delete
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_holyday` WHERE holiday_id = ".$_POST['del_holiday_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

            /*.....Create holiday ends .......*/

             /*.....emploee_customer attendance view starts ....*/
            
              /*if(isset($_POST['emp_or_cust'])) 
              {
                if($_POST['emp_or_cust']=='Customer')
                {
                   $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_cust_attendance` "; 
                      // echo $sql;exit;
                    $result= $con->query($sql);
                    $row = mysqli_fetch_array($result); 
                      while($row=$result->fetch_assoc())
                      {
                        $output.= "<tr>
                          <td>".$row['attendance_id']."</td>
                          <td>".$row['cust_name']."</td>
                          <td>".$row['chech_in']."</td>
                          <td>".$row['check_out']."</td>
                          <td>".$row['attendance_status']."</td>
                        </tr>";
                      }
                      echo $output;
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_holyday` WHERE holiday_id = '".$_POST["holiday_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result); 

                }
              }*/

            /*.....emploee_customer attendance view ends .....*/

               /*..Gallery..*/

               if(isset($_POST["gallery_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_gallery` WHERE gallery_id = '".$_POST["gallery_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_gallery_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_gallery` WHERE gallery_id = ".$_POST['del_gallery_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..Gallery..*/

              /*..enquiry..*/

               if(isset($_POST["enquiry_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_enquiry` WHERE enquiry_id = '".$_POST["enquiry_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_enquiry_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_enquiry` WHERE enquiry_id = ".$_POST['del_enquiry_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..enquiry..*/

               /*..expense..*/

               if(isset($_POST["expense_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_expense` WHERE expense_id = '".$_POST["expense_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_expense_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_expense` WHERE expense_id = ".$_POST['del_expense_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..expense..*/

               /*..User..*/

               if(isset($_POST["id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`admin` WHERE id = '".$_POST["id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`admin` WHERE id = ".$_POST['del_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..User..*/

               /*..banner..*/

               if(isset($_POST["banner_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_banner` WHERE banner_id = '".$_POST["banner_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_banner_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_banner` WHERE banner_id = ".$_POST['del_banner_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..banner..*/

              /*..tax..*/

               if(isset($_POST["taxrate_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate` WHERE taxrate_id = '".$_POST["taxrate_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_taxrate_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_taxrate` WHERE taxrate_id = ".$_POST['del_taxrate_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..tax..*/
               /*..discount..*/

               if(isset($_POST["discount_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_discount` WHERE discount_id = '".$_POST["discount_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
             if(isset($_POST['del_discount_id']))
              {
                    $query = "DELETE  FROM `".DB_PREFIX."`.`tbl_discount` WHERE discount_id = ".$_POST['del_discount_id'];
                    echo $query;
                    $con->query($query);
                    echo "deleted";
              }

              /*..discount..*/
              /*.....membership expiry date calculation on manage payment page starts...*/
              if(isset($_POST["membership_plan_id"]))  
              {  
                  $query = "SELECT duration FROM `".DB_PREFIX."`.`tbl_membership` WHERE membership_id = '".$_POST["membership_plan_id"]."'"; 
                  $result = $con->query($query);
                  while($row = $result->fetch_assoc()) 
                  {   
                    $duration=$row['duration'];
                    $mstarting_date=$_POST['mstarting_date'];
                    $duration=strtolower($duration);
                    $str = preg_replace('/\D/', '', $duration);
                    if($str>1){
                        $duration=substr($duration, 0, -1);
                    }
                    $expiry=date("Y-m-d", strtotime("$mstarting_date +$duration"));
                    echo $expiry;
                  } 
              } 
              /*..... membership expiry date calculation on manage payment page ends .....*/
              /*..... update membership plan on manage payment page starts ...*/
              if(isset($_POST["mupdate_customer_id"]))  
              {  
                    $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_customer_membership` SET `customer_id`='".$_POST["mupdate_customer_id"]."', `membership_id`='".$_POST["mplan"]."',`customer_membership_starting_date`='".$_POST["mstarting_date"]."',`customer_membership_expiry_date`='".$_POST["mexpiry_date"]."',`cm_plan`=1,`membership_date`=NOW(),`membership_paid_status`='2',`customer_membership_status`=1 "; 
                    $con->query($query);
                    $customer_membership_id=mysqli_insert_id($con);
                    
                    $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_mp_payment` SET `mp_payment_customer_membership_id`='".$customer_membership_id."',`mp_payment_paid_status`='2',`mp_payment_date`=NOW()"; 
                    $con->query($query);
                    $query = "SELECT name,price FROM `".DB_PREFIX."`.`tbl_membership` WHERE membership_id = '".$_POST["mplan"]."'"; 
                    $result = $con->query($query);
                    $row = mysqli_fetch_array($result);

                    $check_receiptno="PHF".date('dmy');
                    $queryy = "SELECT receipt_no FROM `".DB_PREFIX."`.`tbl_total` WHERE receipt_no LIKE '".$check_receiptno."%' ORDER BY  receipt_no DESC limit 0,1 "; 
                    $resultt = $con->query($queryy);
                    if($resultt){
                        $roww = mysqli_fetch_array($resultt);  
                        $cnt=str_replace(substr($roww['receipt_no'],0,9),'',$roww['receipt_no']);
                        $cnt=(int)$cnt+1;
                        $cnt=sprintf("%02d", $cnt);
                        $receiptno="PHF".date('dmy').($cnt);
                    }else{
                        $cnt=1;
                        $cnt=sprintf("%02d", $cnt);
                        $receiptno="PHF".date('dmy').($cnt);
                    }
                    $output="";
                    $output.= '<div class="row">
                                <div class="col-sm-1">
                                    <button class=" btn btn-info btn-width pay-btn p-2 active"  type="button" id="cash" value="Cash">Cash</button>
                                    <button class=" btn btn-info mt-2 btn-width pay-btn p-2"  type="button" id="card" value="Card">Card</button>
                                    <button class=" btn btn-info mt-2 btn-width pay-btn p-1 pt-2 pb-2 text-center" type="button" id="cheque" value="Cheque">Cheque</button>
                                </div>
                                <div class="col-sm-11">
                                
                                  <div class="row pl-5 mb-2" id="card_section" style="display: none;">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2">Card No: </label>
                                        <input type="text" name="mcard_no" id="mcard_no" class="form-control h-25" placeholder="last 4 digits">
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Holder name</label>
                                        <input type="text" name="mholder_name" id="mholder_name" class="form-control h-25" placeholder="Holder Name">
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Exp Date: </label>
                                        <input type="date" name="mcard_exp_date" id="mcard_exp_date" class="form-control h-25">
                                    </div>
                                </div>
                                
                                  <div class="row pl-5 mb-2" id="cheque_section" style="display: none;">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2">Cheque No: </label>
                                        <input type="text" name="cheque_no" id="cheque_no" class="form-control h-25" placeholder="Cheque No">
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Account number</label>
                                        <input type="text" name="acc_no" id="acc_no" class="form-control h-25" placeholder="Accnt No">
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Cheque Date: </label>
                                        <input type="date" name="cheque_date" id="cheque_date" class="form-control h-25">
                                    </div>
                                </div>
                               
                                  <div class="row pl-5">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2">Receipt No: </label>
                                        <label name="mp_receipt_no" id="mp_receipt_no" class="span1 control-label pr-2 text-danger">'.$receiptno.'</label>
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Discount:</label>
                                        <select class="form-control select-sm" onchange="getdiscount(this.value)">
                                          <option value="">Select</option>';
                                          $sql1="SELECT * FROM `".DB_PREFIX."`.`tbl_discount`";
                                            $result1=$con->query($sql1);
                                            while($row1=$result1->fetch_assoc()){
                                          $output.='<option value="'.$row1['discount_id'].'">'.$row1['discount_name'].' ('.$row1['discount_rate'].'%)</option>';
                                          }
                                        $output.='</select>
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Payment Date: </label>
                                        <input type="text" name="payment_date" class="form-control h-25" value="'.date('Y-m-d').'" readonly="">
                                        <input type="hidden" id="customer_membership_id" name="customer_membership_id" class="form-control h-25" value="'.$customer_membership_id.'" readonly="">
                                    </div>
                                </div>
                                <div class="row pl-5 mt-4">
                                    <div class="col  p-0 d-inline-flex">
                                      <label class="span1 control-label pr-5">Tax: </label>
                                      <select class="form-control select-sm mr-2 print-logo" onchange=gettax(this.value,1) id="mtax1">
                                        <option value="">Select</option>';
                                        $sql2="SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate`";
                                            $result2=$con->query($sql2);
                                            while($row2=$result2->fetch_assoc()){
                                        $output.='<option value="'.$row2['taxrate_id'].'">'.$row2['tax_name'].' ('.$row2['tax_rate'].'%)</option>';
                                          }
                                        $output.='</select>
                                        <div id="add_tax_btn" class="btn btn-warning p-1 f-11"><i class="fa fa-plus"></i>Add tax</div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                  <div class="col">
                                    <div class="table-responsive">
                                      <table class="table table-responsive table-bordered bill-table">
                                        <thead class="thead-light font-weight-bold"> 
                                          <tr><th>Plan</th>
                                          <th>Duration</th>
                                          <th>Amount</th>
                                        </tr></thead>
                                        <tbody>
                                          <tr>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$_POST["mstarting_date"].' - '.$_POST["mexpiry_date"].'</td>
                                            <td class="float-right">₹ '.number_format($row['price'],'2').'</td>
                                          </tr>
                                            <tr id="tr_mnettotal">
                                              <td class="thick-line"></td>
                                              <td class="thick-line text-center"><strong class="float-right">Net total</strong></td>
                                              <td class="thick-line text-right">₹ <span id="mnet_total">'.number_format($row['price'],'2', '.', '').'</span></td>
                                            </tr>
                                             <tr id="tr_mgrandtotal">
                                              <td class="no-line"></td>
                                              <td class="no-line text-center"><strong class="float-right">Grand Total</strong></td>
                                              <td class="no-line text-right">₹ <span id="mgrandtotal">'.number_format($row['price'],'2', '.', '').'</span></td>
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                              </div>
                              </div>
                            </div>';
                            echo $output;
                  } 
              /*..update membership plan on manage payment page ends..*/          
              /* mb add discount row starts*/
            if(isset($_POST["mdiscount_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_discount` WHERE `discount_id` = '".$_POST["mdiscount_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  $amt=$_POST["mnet_total"];
                  $discountrate=$amt*($row['discount_rate']/100);
                  $newamt=$amt-$discountrate;
                  $output='<tr id="mdiscount_tr">
                              <td class="no-line"></td>
                              <td class="no-line text-center"><strong class="float-right">'.$row['discount_name'].'('.$row['discount_rate'].'%)</strong></td>
                              <td class="no-line text-right">-₹ <span id="mdiscountrate">'.number_format($discountrate,'2','.', '').'</span></td>
                          </tr>';
                      echo $output;
             }  
              /* mb add discount row ends*/
             /* mb add tax row starts */
             if(isset($_POST["mtaxrate_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate` WHERE taxrate_id = '".$_POST["mtaxrate_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  $amt=$_POST["mnet_total"];
                  $mtax_tr_cnt=$_POST["mtax_tr_cnt"]+1;

                  $taxrate=($amt*($row['tax_rate']/100));
                  $newamt=$amt+$taxrate;
                  $output='<tr id="mtax_tr'.$mtax_tr_cnt.'">
                              <td class="no-line"></td>
                              <td class="no-line text-center"><strong class="float-right" id="mtaxtitle'.$mtax_tr_cnt.'">'.$row['tax_name'].'('.$row['tax_rate'].'%)</strong></td>
                              <td class="no-line text-right">₹ <span id="mtaxrate'.$mtax_tr_cnt.'">'.number_format($taxrate,'2','.', '').'</span></td>
                          </tr>';
                      echo $output;
             } 
             /* mb add tax row ends*/

             /* mb paid button tbl total table starts*/
             if(isset($_POST["mp_update_customer_id"])){
                $cnt=1; //echo "<pre>";print_r($_POST);exit;
               $_SESSION['mp_customer_membership_id']=$_POST["mp_customer_membership_id"];
                foreach($_POST['total_details'] as $key => $total){
                  $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_total` SET `customer_id`='".$_POST["mp_update_customer_id"]."',`mp_customer_membership_id`='".$_POST["mp_customer_membership_id"]."', `receipt_no`='".$_POST["mp_receipt_no"]."',";
                  $query .="`title_text`='".$key."', `total_amount`='".$total."',";
                  $query .="`total_payment_date`=NOW(),sort_order= '".$cnt."'";//echo $query;
                  $con->query($query); 
                  $cnt++;
                  echo "success";
                 }
                  //echo $_POST['cheque']['cheque_no'];
                 if(isset($_POST['cheque'])){
                $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_mp_cheque` SET `mp_cheque_customer_membership_id`='".$_POST["mp_customer_membership_id"]."', `mp_cheque_no`='".$_POST['cheque']['cheque_no']."',`mp_accnt_no`='".$_POST['cheque']['acc_no']."', `mp_cheque_date`='".$_POST['cheque']['cheque_date']."', `date_added`=NOW()";
                $con->query($query); 
                }
                 if(isset($_POST['card'])){
                $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_mp_card` SET `mp_card_customer_membership_id`='".$_POST["mp_customer_membership_id"]."', `mp_card_no`='".$_POST['card']['card_no']."',`mp_card_holder`='".$_POST['card']['mholder_name']."', `mp_card_expdate`='".$_POST['card']['mcard_exp_date']."', `mp_card_date_added`=NOW()";
                $con->query($query); 
                  }
                 $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_mp_payment` SET `mp_payment_customer_membership_id`='".$_POST["mp_customer_membership_id"]."',`mp_payment_paid_status`='3',`mp_payment_type`='".$_POST["mp_payment_type"]."',`mp_payment_date`=NOW()";
                 $con->query($query); 
                $query = "UPDATE `".DB_PREFIX."`.`tbl_customer_membership` SET `membership_paid_status`='3' WHERE `customer_id`='".$_POST["mp_update_customer_id"]."' AND `customer_membership_id`='".$_POST["mp_customer_membership_id"]."'";
                $con->query($query); 
                
             } 
             /* mb paid button tbl total table ends*/

             /*..... update PT plan on manage payment page starts ...*/
              if(isset($_POST["ptupdate_customer_id"]))  
              {  
                 
                    $query="INSERT INTO  `".DB_PREFIX."`.`tbl_customer_pt` SET `customer_id`='".$_POST["ptupdate_customer_id"]."',`pt_membership_id`='".$_POST["ptpersonal_plan"]."',`customer_pt_trainer_id`='".$_POST["ptpersonal_trainer_id"]."',`customer_pt_starting_date`='".$_POST["ptpersonal_starting_date"]."',`customer_pt_expiry_date`='".$_POST["ptpersonal_expiry_date"]."',`pt_cm_plan`=2,`pt_date`=NOW(),`pt_paid_status`='2',`customer_pt_status`=1 "; 
                    $con->query($query);
                    $customer_pt_id=mysqli_insert_id($con);

                    $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_pt_payment` SET `pt_payment_customer_pt_id`='".$customer_pt_id."',`pt_payment_paid_status`='2',`pt_payment_date`=NOW()"; 
                    $con->query($query);


                    $query = "SELECT name,price FROM `".DB_PREFIX."`.`tbl_membership` WHERE membership_id = '".$_POST["ptpersonal_plan"]."' AND plan=2"; 
                    $result = $con->query($query);
                    $row = mysqli_fetch_array($result);

                    $check_receiptno="PHF".date('dmy');
                    $queryy = "SELECT receipt_no FROM `".DB_PREFIX."`.`tbl_total` WHERE receipt_no LIKE '".$check_receiptno."%' ORDER BY  receipt_no DESC limit 0,1 "; 
                    $resultt = $con->query($queryy);
                    if($resultt){
                        $roww = mysqli_fetch_array($resultt);  
                        $cnt=str_replace(substr($roww['receipt_no'],0,9),'',$roww['receipt_no']);
                        $cnt=(int)$cnt+1;
                        $cnt=sprintf("%02d", $cnt);
                        $receiptno="PHF".date('dmy').($cnt);
                    }else{
                        $cnt=1;
                        $cnt=sprintf("%02d", $cnt);
                        $receiptno="PHF".date('dmy').($cnt);
                    }
                    $output="";
                    $output.= '<div class="row">
                                <div class="col-sm-1">
                                    <button class=" btn btn-info btn-width pay-btn p-2"  type="button" id="ptcash" value="Cash">Cash</button>
                                    <button class=" btn btn-info mt-2 btn-width pay-btn p-2"  type="button" id="ptcard" value="Card">Card</button>
                                    <button class=" btn btn-info mt-2 btn-width pay-btn p-1 pt-2 pb-2 text-center" type="button" id="ptcheque" value="Cheque">Cheque</button>
                                </div>
                                <div class="col-sm-11">
                                
                                  <div class="row pl-5 mb-2" id="ptcard_section" style="display: none;">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2">Card No: </label>
                                        <input type="text" name="ptcard_no" id="ptcard_no" class="form-control h-25" placeholder="last 4 digits">
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Holder name</label>
                                        <input type="text" name="ptholder_name" id="ptholder_name" class="form-control h-25" placeholder="Holder Name">
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Exp Date: </label>
                                        <input type="date" name="ptcard_exp_date" id="ptcard_exp_date" class="form-control h-25">
                                    </div>
                                </div>
                                
                                  <div class="row pl-5 mb-2" id="ptcheque_section" style="display: none;">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2">Cheque No: </label>
                                        <input type="text" name="ptcheque_no" id="ptcheque_no" class="form-control h-25" placeholder="Cheque No">
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Account number</label>
                                        <input type="text" name="ptacc_no" id="ptacc_no" class="form-control h-25" placeholder="Accnt No">
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Cheque Date: </label>
                                        <input type="date" name="ptcheque_date" id="ptcheque_date" class="form-control h-25">
                                    </div>
                                </div>
                                  <div class="row pl-5">
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 control-label pr-2">Receipt No: </label>
                                        <label name="pt_receipt_no" id="pt_receipt_no" class="span1 control-label pr-2 text-danger">'.$receiptno.'</label>
                                      </div>
                                     <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Discount:</label>
                                        <select class="form-control select-sm" onchange="getptdiscount(this.value)">
                                          <option value="">Select</option>';
                                          $sql1="SELECT * FROM `".DB_PREFIX."`.`tbl_discount`";
                                            $result1=$con->query($sql1);
                                            while($row1=$result1->fetch_assoc()){
                                          $output.='<option value="'.$row1['discount_id'].'">'.$row1['discount_name'].' ('.$row1['discount_rate'].'%)</option>';
                                          }
                                        $output.='</select>
                                    </div>
                                    <div class="col-sm-4 mt-1 p-0 d-inline-flex">
                                        <label class="span1 pl-3 control-label pr-2">Payment Date: </label>
                                        <input type="text" name="payment_date" class="form-control h-25" value="'.date('Y-m-d').'" readonly="">
                                        <input type="hidden" id="customer_pt_id" name="customer_pt_id" class="form-control h-25" value="'.$customer_pt_id.'" readonly="">
                                    </div>
                                </div>
                                <div class="row pl-5 mt-4">
                                    <div class="col  p-0 d-inline-flex">
                                      <label class="span1 control-label pr-5">Tax: </label>
                                      <select class="form-control select-sm mr-2 print-logo" onchange=getpttax(this.value,1) id="pttax1">
                                        <option value="">Select</option>';
                                        $sql2="SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate`";
                                            $result2=$con->query($sql2);
                                            while($row2=$result2->fetch_assoc()){
                                        $output.='<option value="'.$row2['taxrate_id'].'">'.$row2['tax_name'].' ('.$row2['tax_rate'].'%)</option>';
                                          }
                                        $output.='</select>
                                        <div id="add_tax_btnpt" class="btn btn-warning p-1 f-11"><i class="fa fa-plus"></i>Add tax</div>
                                    </div>  
                                </div>
                                <div class="row mt-2">
                                  <div class="col">
                                    <div class="table-responsive">
                                      <table class="table table-responsive table-bordered bill-table">
                                        <thead class="thead-light font-weight-bold"> 
                                          <tr><th>Plan</th>
                                          <th>Duration</th>
                                          <th>Amount</th>
                                        </tr></thead>
                                        <tbody>
                                          <tr>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$_POST["ptpersonal_starting_date"].' - '.$_POST["ptpersonal_expiry_date"].'</td>
                                            <td class="float-right">₹ '.number_format($row['price'],'2').'</td>
                                          </tr>
                                            <tr id="tr_ptnettotal">
                                              <td class="thick-line"></td>
                                              <td class="thick-line text-center"><strong class="float-right">Net total</strong></td>
                                              <td class="thick-line text-right">₹ <span id="ptnet_total">'.number_format($row['price'],'2', '.', '').'</span></td>
                                            </tr>
                                             <tr id="tr_ptgrandtotal">
                                              <td class="no-line"></td>
                                              <td class="no-line text-center"><strong class="float-right">Grand Total</strong></td>
                                              <td class="no-line text-right">₹ <span id="ptgrandtotal">'.number_format($row['price'],'2', '.', '').'</span></td>
                                            </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                              </div>
                              </div>
                            </div>';
                            echo $output;
                  } 
              /*..update membership PT plan on manage payment page ends..*/
              /*.....pt expiry date calculation on manage payment page starts...*/
              if(isset($_POST["pt_plan_id"]))  
              {  
                  $query = "SELECT duration FROM `".DB_PREFIX."`.`tbl_membership` WHERE membership_id = '".$_POST["pt_plan_id"]."'"; 
                  $result = $con->query($query);
                  while($row = $result->fetch_assoc()) 
                  {   
                    $duration=$row['duration'];
                    $ptpersonal_starting_date=$_POST['ptpersonal_starting_date'];
                    $duration=strtolower($duration);
                    $str = preg_replace('/\D/', '', $duration);
                    if($str>1){
                        $duration=substr($duration, 0, -1);
                    }
                    $expiry=date("Y-m-d", strtotime("$ptpersonal_starting_date +$duration"));
                    echo $expiry;
                  } 
              } 
              /*..... pt expiry date calculation on manage payment page ends .....*/   
              /* PT add discount row starts*/
            if(isset($_POST["ptdiscount_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_discount` WHERE discount_id = '".$_POST["ptdiscount_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  $amt=$_POST["ptnet_total"];
                  $discountrate=$amt*($row['discount_rate']/100);
                  $newamt=$amt-$discountrate;
                  $output='<tr id="ptdiscount_tr">
                              <td class="no-line"></td>
                              <td class="no-line text-center"><strong class="float-right">'.$row['discount_name'].'('.$row['discount_rate'].'%)</strong></td>
                              <td class="no-line text-right">-₹ <span id="ptdiscountrate">'.number_format($discountrate,'2','.', '').'</span></td>
                          </tr>';
                      echo $output;
             }  
              /* PT add discount row ends*/
             /* PT add tax row starts */
             if(isset($_POST["pttaxrate_id"]))  
             {  
                  $query = "SELECT * FROM `".DB_PREFIX."`.`tbl_taxrate` WHERE taxrate_id = '".$_POST["pttaxrate_id"]."'"; 
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  $amt=$_POST["ptnet_total"];
                  $pttax_tr_cnt=$_POST["pttax_tr_cnt"]+1;

                  $taxrate=($amt*($row['tax_rate']/100));
                  $newamt=$amt+$taxrate;
                  $output='<tr id="pttax_tr'.$pttax_tr_cnt.'">
                              <td class="no-line"></td>
                              <td class="no-line text-center"><strong class="float-right" id="pttaxtitle'.$pttax_tr_cnt.'">'.$row['tax_name'].'('.$row['tax_rate'].'%)</strong></td>
                              <td class="no-line text-right">₹ <span id="pttaxrate'.$pttax_tr_cnt.'">'.number_format($taxrate,'2','.', '').'</span></td>
                          </tr>';
                      echo $output;
             } 
             /* PT add tax row ends*/
             /* PT paid button tbl total table starts*/
             if(isset($_POST["pt_update_customer_id"])){
                $cnt=1;
               $_SESSION['customer_pt_id']=$_POST["customer_pt_id"];
                foreach($_POST['total_details'] as $key => $total){
                  $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_total` SET `customer_id`='".$_POST["pt_update_customer_id"]."',`customer_pt_id`='".$_POST["customer_pt_id"]."', `receipt_no`='".$_POST["pt_receipt_no"]."',";
                  $query .="`title_text`='".$key."', `total_amount`='".$total."',";
                  $query .="`total_payment_date`=NOW(),sort_order= '".$cnt."'";//echo $query;
                  $con->query($query); 
                  $cnt++;
                  echo "success";
                 }
                 if(isset($_POST['ptcheque'])){
                 $query = "INSERT INTO `".DB_PREFIX."`.`tbl_pt_cheque` SET `pt_cheque_customer_pt_id`='".$_POST["customer_pt_id"]."', `pt_cheque_no`='".$_POST['ptcheque']['ptcheque_no']."',`pt_accnt_no`='".$_POST['ptcheque']['ptacc_no']."', `pt_cheque_date`='".$_POST['ptcheque']['ptcheque_date']."', `pt_date_added`=NOW()";
                $con->query($query); 
                }
                 if(isset($_POST['ptcard'])){
               $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_pt_card` SET `pt_card_customer_pt_id`='".$_POST["customer_pt_id"]."', `pt_card_no`='".$_POST['ptcard']['ptcard_no']."',`pt_card_holder`='".$_POST['ptcard']['ptholder_name']."', `pt_card_expdate`='".$_POST['ptcard']['ptcard_exp_date']."', `pt_card_date_added`=NOW()";
                $con->query($query); 
                  }
                 $query = "INSERT INTO  `".DB_PREFIX."`.`tbl_pt_payment` SET `pt_payment_customer_pt_id`='".$_POST["customer_pt_id"]."',`pt_payment_paid_status`='3',`pt_payment_type`='".$_POST["pt_payment_type"]."',`pt_payment_date`=NOW()";
                 $con->query($query); 
              
                 $query = "UPDATE `".DB_PREFIX."`.`tbl_customer_pt` SET `pt_paid_status`='3'WHERE `customer_id`='".$_POST["pt_update_customer_id"]."' AND `customer_pt_id`='".$_POST["customer_pt_id"]."'";
                 $con->query($query); 
             } 
             /* PT paid button tbl total table ends*/
             if(isset($_POST["ptcustomer_id"]))  
             {  
               $query="SELECT c.*,cm.*,m.`membership_id`,m.`name` FROM `".DB_PREFIX."`.`tbl_customer` c
                        left join tbl_customer_membership cm on(cm.`customer_id`=c.`customer_id`)
                        left join tbl_membership m on(m.`membership_id`=cm.`membership_id`) WHERE c.`customer_id` = '".$_POST["ptcustomer_id"]."'";
                  $result = $con->query($query);  
                  $row = mysqli_fetch_array($result);  
                  echo json_encode($row);  
             }  
  } ?>