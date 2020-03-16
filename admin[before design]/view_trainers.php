<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Trainers
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">View Trainers</a>
    <!-- Header -->
    <?php include("include/header.php");?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">View Trainers</h3>
            </div>
            <div class="card-body">
              
               
              <div class="card">
            <!-- Card header -->
           
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1"  aria-label="Name: activate to sort column descending" >Name</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Contact</th><!-- <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Email</th> --><!-- <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >DOB/Age</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Gender/</br>Marital Status</th> --><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Description</th> <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Address</th><!-- <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Height</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Weight</th> --><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Designation</th><th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Sort order</th><th tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Action</th></tr>
                </thead>
                <tfoot>
                  <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Contact</th><th rowspan="1" colspan="1">Description</th><th rowspan="1" colspan="1">Address</th><th rowspan="1" colspan="1">Designation</th><th rowspan="1" colspan="1">Sort order</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
                <tbody>
                  <?php
                   ob_start(); 
  if(isset($_POST['update']))
    {
           extract($_POST);
          // echo "<pre>";print_r($_POST); 
          /* include("image_validation.php");  
           // echo $response['message'];
            // echo "<pre>";print_r($response); 
                    
                 if($response['type'] == 'error')
               {
                
                 
               }
                else
               { */
               // echo "hhbdsf";
                    $image = $_POST['trainer_image'];
                    $target = "../images/".basename($image);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
                    {
                     @unlink("../images/".$_POST['old_image']);
                      $msg = "Image uploaded successfully";
                    }else
                    {
                      $msg = "Failed to upload image";
                    }
                    if($relieved_date=='')
                    {
                      $relieved_date='0000-00-00';
                    }
                      $ql= "UPDATE `".DB_PREFIX."`.`tbl_trainer` SET `fname`= '".trim($firstname)."',`lname`= '".trim($lastname)."',`email`='".trim($email)."',`contact`='".trim($contact)."',`dob`='".trim($dob)."',`age`='".trim($age)."',`gender`='".trim($gender)."',
                      `married_status`='".trim($married_status)."',`address`='".trim(addslashes($address))."',`feet`='".trim($feet)."',`inches`='".trim($inches)."',`weight`='".trim($weight)."',`designation`='".trim($designation)."',`description`='".trim(addslashes($description))."',`joined_date`='".trim($joined_date)."',`relieved_date`='".trim($relieved_date)."',`image`='".trim($image)."',`trainer_facebook`='".trim($trainer_facebook)."',`trainer_watsapp`='".trim($trainer_watsapp)."',`trainer_instagram`='".trim($trainer_instagram)."',`sort_order`='".trim($sort_order)."' WHERE `trainer_id`='$trainer_id' ";
                      // echo $ql;exit;

                  if ($con->query($ql) === TRUE) 
                  {
                      $_SESSION['success']='Trainer Successfully Updated';
                      ?>
                                          <script type="text/javascript">
                                          window.location="view_trainers.php";
                                          </script>
                                        <?php
                  }
            // }    
    }          

  ?>
                   <?php 
                                          
                                          $sql = "SELECT * FROM `".DB_PREFIX."`.`tbl_trainer` WHERE 1 ORDER BY sort_order ASC";
                                           $result = $con->query($sql);
                                         // print_r($result); echo $sql;
                                            $cnt=0;
                                           while($row = $result->fetch_assoc()) 
                                            {
                                             //echo "<pre>";   print_r($row); $row['fname'];
                                              ?>
                                            <tr role="row" >
                                                <td><img class="rounded-circle" src="../images/<?php  echo $row['image']; ?>" onerror=this.src="uploadImage/profile/profile_image.png" style="height:50px;width:50px;"> <?php echo $row['fname'].' '.$row['lname']; ?></td>
                                               <!--  <td><?php echo $row['email']; ?></td> -->
                                                <td><?php echo $row['contact']; ?></td>
                                                <!-- <td><?php echo $row['dob'].'/'.$row['age']; ?></td> -->
                                                <!-- <td><?php echo $row['gender'].'/'.$row['married_status']; ?></td> -->
                                                <td class="td_desc"><?php echo $row['description'];?></td>
                                                <td><?php echo $row['address']; ?></td>
                                               <!--  <td><?php echo $row['feet'].'"'.$row['inches'].'"'; ?></td>
                                                <td><?php echo  $row['weight'];?></td> -->
                                                <td><?php echo  $row['designation'];?></td>
                                                <td><?php echo $row['sort_order']; ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-xs btn-primary edit_data" href="#editModal" id="<?php echo $row["trainer_id"]; ?>" data-sfid='"<?php echo $row['trainer_id'];?>"'><i class="fa fa-pen fa-xs"></i></a>
                                                    <a  type="button" class="btn btn-xs btn-danger del_data" name='del' data-delid='"<?php echo $row['trainer_id'];?>"'><i class="fa fa-trash fa-xs"></i></a> 
                                                
                                                  
                                               </td>
                  </tr>

            <?php } ?></tbody>
              </table></div></div></div>
            </div>
          </div>

               
              
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <!-- Footer -->
      <?php include("include/footer.php");?>
      <!-- ....modal start... -->
      <div id="add_data_Modal" class="modal">  
        <div class="modal-dialog modal-lg mt-1">  
             <div class="modal-content">  
                  <div class="modal-header p-2 pl-3">  
                       <h4 class="modal-title">Update Trainer</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                  </div>  
                  <div class="modal-body pt-1 pb-1" id="trainer_update">  
                                      <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="insert_form">
                                          <div class="form-group">
                                              <div class="row">
                                                  <label class="col-sm-2 control-label my-auto">Firstname</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Firstname"  name="firstname"  id="firstname" class="form-control h-30" onkeypress="return isAlfa(event)" required>
                                                  </div>
                                                  <label class="col-sm-2 control-label my-auto">Lastname</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Lastname" name="lastname" id="lastname" class="form-control h-30" onkeypress="return isAlfa(event)" required>
                                                  </div>
                                              </div>
                                          </div>
                                          <!--  <div class="form-group">
                                              <div class="row">
                                                  <label class="col-sm-2 control-label">Username</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Username"  name="username" id="username" class="form-control" onkeypress="return isAlfa(event)">
                                                  </div>
                                                  <label class="col-sm-2 control-label">Password</label>
                                                  <div class="col-sm-4">
                                                      <input type="password" placeholder="Password" name="password" id="password" class="form-control">
                                                  </div>
                                              </div>
                                          </div> -->
                                           <div class="form-group">
                                              <div class="row">
                                                  <label class="col-sm-2 control-label my-auto">Email</label>
                                                  <div class="col-sm-4">
                                                      <input type="email" placeholder="Email" name="email" id="email" class="form-control h-30" required>
                                                  </div>
                                                  <label class="col-sm-2 control-label my-auto">Contact no.</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Contact No." name="contact" id="contact"  maxlength="13" class="form-control h-30" onkeypress="return isNumber(event)" required>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="row">
                                                  <label class="col-sm-2 control-label my-auto">Date Of Birth</label>
                                                  <div class="col-sm-4">
                                                      <input  class="form-control h-30" type="date" placeholder="DD/MM/YY"  name="dob" id="dob" onchange="calculate_age(this.value)" required >
                                                  </div>
                                                  <label class="col-sm-2 control-label my-auto">Age</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Age" name="age" id="age" class="form-control h-30" required readonly>
                                                  </div>
                                              </div>
                                          </div> 
                                           <div class="form-group">
                                              <div class="row">
                                                  <label class="col-sm-2 control-label mt-2">Gender</label>
                                                  <div class="col-sm-4 d-flex">
                                                      <!-- <label class="radio-inline">
                                                          <input type="radio"  name="male" class="form-control">Male
                                                      </label> -->
                                                      <div class="custom-control custom-radio mb-3 pr-4">
                                                        <input class="custom-control-input" id="male" name="gender"  checked="checked" value="Male" type="radio">
                                                        <label class="custom-control-label p-3px" for="male">Male</label>
                                                      </div>
                                                      <div class="custom-control custom-radio mb-3">
                                                        <input class="custom-control-input" id="female" name="gender"  value="Female" type="radio">
                                                        <label class="custom-control-label p-3px" for="female">Female</label>
                                                      </div>
                                                  </div>
                                                  <label class="col-sm-2 control-label mt-2">Martial Status</label>
                                                  <div class="col-sm-4 d-flex">
                                                      <div class="custom-control custom-radio mb-3 pr-4">
                                                        <input class="custom-control-input" id="married" name="married_status" value="Married" type="radio">
                                                        <label class="custom-control-label p-3px" for="married">Married</label>
                                                      </div>
                                                      <div class="custom-control custom-radio mb-3">
                                                        <input class="custom-control-input" id="single" name="married_status" checked="checked" value="Single" type="radio">
                                                        <label class="custom-control-label p-3px" for="single">Single</label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div> 
                                           <div class="form-group">
                                            <div class="row">
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                                	<label class="col-sm-4 control-label mt-2">Description</label>
                                                	<div class="col-sm-8">
                                                    <!-- <input type="text" placeholder="Address" name="address" class="form-control"> -->
                                                    <textarea class="form-control"  rows="3" placeholder="Description" id="description" name="description" required></textarea>
                                                	</div>
                                            		</div>
                                            	</div>
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                                  <label class="col-sm-4 control-label mt-2">Address</label>
                                                  <div class="col-sm-8">
                                                      <!-- <input type="text" placeholder="Address" name="address" class="form-control"> -->
                                                      <textarea class="form-control"  rows="3" placeholder="Address" name="address" id="address" required></textarea>
                                                  </div>
                                              </div>
                                            	</div>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                              <div class="row">
                                              	<div class="col-sm-6">
                                              		<div class="row">
                                                  		<label class="col-sm-4 control-label my-auto">Feet</label>
                                                  		<div class="col-sm-4">
                                                        <input type="text" placeholder="Feet" name="feet" id="feet" onkeypress="return isNumber(event)" class="form-control h-30" required>
                                                  		</div>
                                                  		<div class="col-sm-4">
                                                        <input type="text" placeholder="Inches" name="inches" id="inches" onkeypress="return isNumber(event)" class="form-control h-30" required>
                                                  		</div>
                                              		</div>
                                              	</div>
                                              	<div class="col-sm-6">
                                              		<div class="row">
                                                  
                                                  <label class="col-sm-4 control-label my-auto">Weight</label>
                                                  <div class="col-sm-8">
                                                        <input type="text" placeholder="Weight" name="weight" id="weight" onkeypress="return isNumber(event)" class="form-control h-30" required>
                                                  </div>
                                              </div>
                                          </div> 
                                      </div>
                                  </div>
                                          <div class="form-group">
                                              <div class="row">
                                              	<div class="col-sm-6">
                                              		<div class="row">
                                                  		<label class="col-sm-4 control-label my-auto">Designation</label>
                                                  		<div class="col-sm-8">
                                              <!--  <input type="text" placeholder="Designation" name="designation" class="form-control"> -->
                                                      		<select class="form-control h-30 p-1" id="designation" name="designation">
                                                          		<option value="Head Coach">Head Coach</option>
                                                          		<option value="Trainer">Trainer</option>
                                                              <option value="Facility Head">Facility Head</option>
                                                              <option value="Fitness Expert">Fitness Expert</option>
                                                      		</select>
                                                  		</div>
                                                  	</div>
                                                  </div>
                                                  <div class="col-sm-6">
                                                  	 <div class="row">
                                                <label class="col-sm-4 control-label my-auto">Sort Order</label>
                                                <div class="col-sm-8">
                                                   <input class="form-control h-30" type="text" placeholder="Sort Order" id="sort_order" name="sort_order">
                                                </div>
                                            </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="row">
                                                  <label class="col-sm-2 control-label my-auto">Date Of Join</label>
                                                  <div class="col-sm-4">
                                                      <input class="form-control h-30" type="date" placeholder="DD/MM/YY"  name="joined_date" id="joined_date"  required>
                                                  </div>
                                                  <label class="col-sm-2 control-label my-auto">Date Of Relieving</label>
                                                  <div class="col-sm-4">
                                                      <input class="form-control h-30" type="date" placeholder="DD/MM/YY" name="relieved_date" id="relieved_date" >
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                            	<div class="col-sm-6">
                                            		<div class="row">
                                                		<label class="col-sm-4 control-label my-auto">Facebook</label>
                                                		<div class="col-sm-8">
                                                    		<input type="text" placeholder="Facebook"  name="trainer_facebook"  id="trainer_facebook" class="form-control h-30"  required>
                                                		</div>
                                                	</div>
                                                </div>
                                                <div class="col-sm-6">
                                                	<div class="row">
                                                		<label class="col-sm-4 control-label my-auto">Whatsapp</label>
                                                		<div class="col-sm-8">
                                                    		<input type="text" placeholder="Whatsapp" name="trainer_watsapp" id="trainer_watsapp" class="form-control h-30" required>
                                                		</div>
                                                	</div>
                                                </div>
                                            </div>
                                        </div>            
                                           <div class="form-group">
                                           	<div class="row">
                                           		<div class="col-sm-6">
                                              		<div class="row">
                                              		<label class="col-sm-4 control-label my-auto">Instagram</label>
                                               		<div class="col-sm-8">
                                                    	<input type="text" placeholder="Instagram" name="trainer_instagram" id="trainer_instagram" class="form-control h-30" required>
                                                    </div>
                                                </div>
                                              	</div>
                                              	<div class="col-sm-6">
                                              		<div class="row">
                                              		<label class="col-sm-4 control-label mt-2">Upload photo</label>
                                              		<div class="col-sm-8 pl-1">
                                                  <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="image" name="image" lang="en">
                                                      <img id="preview_trainer" name="preview_trainer" src="" height="50" width="100"/>
                                                      <input type="hidden" id="trainer_image" name="trainer_image" value=""/>
                                                      <label class="custom-file-label custom-file-label1 h-30 my-auto" for="customFileLang">Upload Photo</label>
                                                  </div>
                                              </div>
                                              	</div>
                                             </div>
                                              
                                          </div>
                                          <!-- <?php if(isset($response["image"])){ ?><span style="color: red;font-size: 13px;"> <?php   echo $response["image"]["message"]; ?></span><?php } ?> -->
                                         <!--  <button type="submit" name="btn_trainer" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button> -->

                                          <input type="hidden" name="trainer_id" id="trainer_id" />  
                                          <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />   
                                      </form>
                  </div>  
                  <div class="modal-footer pt-1">  
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
           var trainer_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{trainer_id:trainer_id},  
                dataType:"json",  
                success:function(data){  
                     $('#firstname').val(data.fname);  
                     $('#lastname').val(data.lname); 
                     $('#username').val(data.username); 
                     $('#password').val(data.password);  
                     $('#email').val(data.email); 
                     $('#contact').val(data.contact); 

                     $('#dob').val(data.dob);  
                     $('#age').val(data.age); 

                     // $('input[name='gender']').checked(); 
                     // attr("checked") 
                     // $("#"+data.martial_status).checked();
                     $("#"+data.gender).attr("checked"); 
                     $("#"+data.married_status).attr("checked"); 

                     $('.custom-file-label').html(data.image); 
                     $('#trainer_image').val(data.image);
                     $('#image').attr('title',data.image);
                     $('#preview_trainer').attr('src', '../images/'+data.image);
                     
                     $('#address').val(data.address); 
                     $('#feet').val(data.feet);  
                     $('#inches').val(data.inches); 
                     $('#weight').val(data.weight); 
                     $('#designation').val(data.designation);
                     $('#inches').val(data.inches); 
                  /* $('#joined_date').val(data.joined_date); 
                     $('#relieved_date').val(data.relieved_date);  */
                     $('#image').attr('src',data.image); 
                     $('#description').val(data.description);  
                     $('#joined_date').val(data.joined_date);  
                     $('#relieved_date').val(data.relieved_date); 
                     $('#trainer_facebook').val(data.trainer_facebook); 
                     $('#trainer_watsapp').val(data.trainer_watsapp); 
                     $('#trainer_instagram').val(data.trainer_instagram);  
                     $('#sort_order').val(data.sort_order);  
                     
                     //$('#hidden_input_file').val(data.image);
                     //$( 'data.image' ).insertAfter( "#image" );
                     $('#trainer_id').val(data.trainer_id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

                }  
           });  
      }); 
      $(document).on('click', '.del_data', function(){  
           var del_trainer_id = $(this).attr("data-delid");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{del_trainer_id:del_trainer_id},  
                dataType:"json",  
                success:function(data){  
                 
                }  
           });  
            // window.location.reload();
            window.location="view_trainers.php";
      });  
       $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName); 
            $('#trainer_image').val(fileName);
            $('#image').attr('title',fileName);
            $('#image').attr('src', '../images/'+fileName);
            $('#preview_trainer').attr('src', '../images/'+fileName);
        });

      
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