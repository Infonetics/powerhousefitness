<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Manage SMS/Email
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
  <!-- <link rel="stylesheet" href="assets/vendor/css/bootstrap-3.3.2.min.css" type="text/css"/> -->
  <link href="assets/vendor/css/bootstrap-multiselect.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <?php include("include/sidebar.php");?>
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Manage SMS/Email</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Manage SMS/Email</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills">
                <li class="active"><a href="#sms_section" data-toggle="tab" class="btn btn-primary">SMS</a></li>
                <li class=""><a href="#email_section" data-toggle="tab" class="btn btn-primary">Email</a></li>
              </ul>
                <!-- ------- -->
              <div class="card">
              <div class="tab-content">
               <div class="row icon-examples tab-pane active" id="sms_section">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;">
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Customer / Trainer</label>
                      <div class="col-md-8">
                          <select id="example-enableCollapsibleOptGroups-enableClickableOptGroups-enableFiltering-includeSelectAllOption" multiple="multiple">
                            <optgroup label="Trainers">
                              <?php 
                                  $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_trainer`";
                                  $result=$con->query($sql);
                                  while($row=$result->fetch_assoc()){ ?>
                                    <option data-phn="<?php echo $row['contact']?>" value="<?php echo $row['trainer_id']?>" 
                                      ><?php echo $row['fname'].' '.$row['lname'];?></option>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="Customers">
                              <?php 
                                  $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_customer`";
                                  $result=$con->query($sql);
                                  while($row=$result->fetch_assoc()){ ?>
                                    <option data-phn="<?php echo $row['contact']?>" value="<?php echo $row['customer_id']?>"><?php echo $row['fname'].' '.$row['lname'];?></option>
                                 <?php } ?>
                            </optgroup>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Contact No</label>
                      <div class="col-md-8">
                        <input type="text" placeholder="Contact No" name="contacts" id="contacts" onkeypress="return isNumber(event)" class="form-control"  required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Message</label>
                      <div class="col-md-8">
                        <textarea name="message" id="message" placeholder="Short Description" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_sms" id="btn_sms" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                </form>
              </div>


              <div class="row icon-examples tab-pane" id="email_section">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" style="margin:auto;width:60%;">
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Customer / Trainer</label>
                      <div class="col-md-8">
                          <select id="example-enableCollapsibleOptGroups-enableClickableOptGroups-enableFiltering-includeSelectAllOption1" multiple="multiple">
                            <optgroup label="Trainers">
                              <?php 
                                  $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_trainer`";
                                  $result=$con->query($sql);
                                  while($row=$result->fetch_assoc()){ ?>
                                    <option data-email="<?php echo $row['email']?>" value="<?php echo $row['trainer_id']?>" 
                                      ><?php echo $row['fname'].' '.$row['lname'];?></option>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="Customers">
                              <?php 
                                  $sql="SELECT * FROM `".DB_PREFIX."`.`tbl_customer`";
                                  $result=$con->query($sql);
                                  while($row=$result->fetch_assoc()){ ?>
                                    <option data-email="<?php echo $row['email']?>" value="<?php echo $row['customer_id']?>"><?php echo $row['fname'].' '.$row['lname'];?></option>
                                 <?php } ?>
                            </optgroup>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Email Id</label>
                      <div class="col-md-8">
                        <input type="text" placeholder="Email" name="emails" id="emails" onkeypress="return isNumber(event)" class="form-control"  required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Email Subject</label>
                      <div class="col-md-8">
                        <textarea name="email_subject" id="email_subject" placeholder="Email Subject" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-md-4 control-label">Email Content</label>
                      <div class="col-md-8">
                        <textarea name="email_content" id="email_content" placeholder="Email Content" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>

                  <button type="button" name="btn_email" id="btn_email" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                </form>
              </div>
              </div><!-- tab-content ends-------- -->
            </div> <!-- card ends-------- -->
                
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
  <script src="assets/vendor/js/bootstrap-3.3.2.min.js"></script>
  <script src="assets/vendor/js/bootstrap-multiselect.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="assets/vendor/js/argon.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#example-enableCollapsibleOptGroups-enableClickableOptGroups-enableFiltering-includeSelectAllOption').multiselect({
            //enableClickableOptGroups: true,
            enableCollapsibleOptGroups: true,
            enableFiltering: true,
            includeSelectAllOption: true,
            collapseOptGroupsByDefault: true,
             onChange: function(option, checked, select) {
                //alert('Changed option ' + $(option).val() + '.' + checked + '.'+$(option).attr("data-phn")+ '.');
                var val=$("#contacts").val();
                if(checked == true) {
                    if(val!=''){
                      $("#contacts").val(val+','+$(option).attr("data-phn"));
                    }else{
                      $("#contacts").val($(option).attr("data-phn"));
                    }
                } else if(checked == false) {
                  var newstring=new Array();
                    if(val!=''){
                            var splitString = val.split(',');
                            //console.log("splitString"+splitString);
                            var appleFound;var j = 0;
                            for (var i = 0; i < splitString.length; i++) {
                                var stringPart = splitString[i];
                                if (stringPart != $(option).attr("data-phn")) {newstring[j]=splitString[i];j++; }
                                
                            }
                            //console.log("newstring"+newstring);
                            var newstringg = newstring.join();
                            //console.log("newstringg"+newstringg);
                         $("#contacts").val(newstringg);
                    }
                 }                        
                }
        });

        $(document).on('click','#btn_sms', function(){
            var contacts=$('#contacts').val();
            var message=$('#message').val();
             $.ajax({  
                url:"bulksms.php",  
                method:"POST",  
                data:{message:message,contacts:contacts,sms:1},  
                dataType:"html",  
                success:function(data){   
                } 
             });    
             window.location.reload(); 
      }); 
        $(document).on('click','#btn_email', function(){
            var emails=$('#emails').val();
            var email_content=$('#email_content').val();
            var email_subject=$('#email_subject').val();
             $.ajax({  
                url:"bulkemail.php",  
                method:"POST",  
                data:{email_content:email_content,emails:emails,email_subject:email_subject,email:1},  
                dataType:"html",  
                success:function(data){   
                } 
             });    
             window.location.reload(); 
      }); 

        $('#example-enableCollapsibleOptGroups-enableClickableOptGroups-enableFiltering-includeSelectAllOption1').multiselect({
            //enableClickableOptGroups: true,
            enableCollapsibleOptGroups: true,
            enableFiltering: true,
            includeSelectAllOption: true,
            collapseOptGroupsByDefault: true,
             onChange: function(option, checked, select) {
                //alert('Changed option ' + $(option).val() + '.' + checked + '.'+$(option).attr("data-phn")+ '.');
                var val=$("#emails").val();
                if(checked == true) {
                    if(val!=''){
                      $("#emails").val(val+','+$(option).attr("data-email"));
                    }else{
                      $("#emails").val($(option).attr("data-email"));
                    }
                } else if(checked == false) {
                  var newstring=new Array();
                    if(val!=''){
                            var splitString = val.split(',');
                            //console.log("splitString"+splitString);
                            var j = 0;
                            for (var i = 0; i < splitString.length; i++) {
                                var stringPart = splitString[i];
                                if (stringPart != $(option).attr("data-email")) {newstring[j]=splitString[i];j++; }
                                
                            }
                            //console.log("newstring"+newstring);
                            var newstringg = newstring.join();
                            //console.log("newstringg"+newstringg);
                         $("#emails").val(newstringg);
                    }
                 }                        
                }
        });

    });    
</script>
</body>
</html>