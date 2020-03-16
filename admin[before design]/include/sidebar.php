<?php include("include/head.php");?>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md nav-bg " id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.php">
        <?php 
        $sql = "SELECT logo FROM admin_panel";
        $result = $con->query($sql);
        $row=mysqli_fetch_array($result);
        ?>
        <img src="./images/<?=$row[0]?>" class="navbar-brand-img" alt="...">
      </a> 
      <!-- Sidenav toggler -->
      <!-- <div class="ml-auto">
         
          <div class="sidenav-toggler d-none d-xl-block active" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div> -->
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.php">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item " class="active">
          <a class=" nav-link active" href=" ./index.php"> <i class="fa fa-home text-red"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-trainers" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-trainers">
              <i class="ni ni-single-02 text-red"></i> Manage Trainers
            </a>
            <div class="collapse" id="navbar-trainers">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="add_trainers.php" class="nav-link">Add Trainer</a></li>
                    <li class="nav-item"><a href="view_trainers.php" class="nav-link">View Trainers</a></li>
                </ul>
              </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-plans" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-plans">
              <i class="fa fa-tasks text-red"></i> Membership Plans
            </a>
            <div class="collapse" id="navbar-plans">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="add_membership.php" class="nav-link">Add Membership Plans</a></li>
                    <li class="nav-item"><a href="view_membership.php" class="nav-link">View Membership Plans</a></li>
                </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-customers" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-customers">
              <i class="fa fa-users text-red"></i> Manage Customers
            </a>
            <div class="collapse" id="navbar-customers">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="add_customer.php" class="nav-link">Add Customer</a></li>
                    <li class="nav-item"><a href="view_customers.php" class="nav-link">View Customers</a></li>
                    <li class="nav-item"><a href="membership_history.php" class="nav-link">Membership History</a></li>
                </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-personaltraining" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-personaltraining">
              <i class="fa fa-universal-access text-red"></i> Manage Personal Training
            </a>
            <div class="collapse" id="navbar-personaltraining">
                <ul class="nav nav-sm flex-column">
                    <!-- <li class="nav-item"><a href="add_customer.php" class="nav-link">Add Customer</a></li> -->
                    <li class="nav-item"><a href="view_ptcustomers.php" class="nav-link">PT Customers</a></li>
                    <li class="nav-item"><a href="pthistory.php" class="nav-link">PT History</a></li>
                </ul>
              </div>
          </li>
          <!-- <li class="nav-item " >
              <a class=" nav-link" href="manage_payment.php"> <i class="fa fa-money-bill-alt text-red"></i> Manage Payment</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-manage_payment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-manage_payment"> 
              <i class="fa fa-money-bill-alt text-red"></i> Manage Payment
            </a>
            <div class="collapse" id="navbar-manage_payment">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item"><a href="manage_payment.php" class="nav-link">Manage Payment</a></li>
                <li class="nav-item"><a href="manage_payment_history.php" class="nav-link">Manage Payment History</a></li>
              </ul>
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-master" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-master">
              <i class="fa fa-user-shield text-red"></i> Master
            </a>
            <div class="collapse" id="navbar-master">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="manage_tax.php" class="nav-link">Manage Tax</a></li>
                    <li class="nav-item"><a href="manage_discount.php" class="nav-link">Manage Discount</a></li>
                </ul>
              </div>
          </li>
		  
           <li class="nav-item " >
              <a class=" nav-link" href="manage_smsemail.php"> <i class="fa fa-money-bill-alt text-red"></i> Manage SMS/Email</a>
          </li>
		 
          
          <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-enquiry" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-enquiry">
              <i class="fa fa-search-plus text-red"></i> Manage Enquiry
            </a>
            <div class="collapse" id="navbar-enquiry">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="add_enquiry.php" class="nav-link">Add Enquiry</a></li>
                    <li class="nav-item"><a href="view_enquiry.php" class="nav-link">View Enquiry</a></li>
                </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-expense" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-expense">
              <i class="fa fa-business-time text-red"></i>Manage Expense
            </a>
            <div class="collapse" id="navbar-expense">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="add_expense.php" class="nav-link">Add Expense</a></li>
                    <li class="nav-item"><a href="view_expense.php" class="nav-link">View Expense</a></li>
                </ul>
              </div>
          </li>
          
           <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-customers" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-customers">
              <i class="fa fa-users text-red"></i> Manage Attendance
            </a>
            <div class="collapse" id="navbar-customers">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="attendance.php" class="nav-link">Attendance</a></li>
                    <li class="nav-item"><a href="holiday.php" class="nav-link">Create Holiday</a></li>
                    <li class="nav-item"><a href="individual_search.php" class="nav-link">Individual Search</a></li>
                </ul>
              </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-system" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-system">
              <i class="fa fa-cogs text-red"></i>Manage Website
            </a>
            <div class="collapse" id="navbar-system">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="website.php" class="nav-link h-25 f-12"><i class="fa fa-circle p-1 fa-xs text-red sub-bullet"></i>Website</a></li>
                    <li class="nav-item"><a href="banner.php" class="nav-link  h-25 f-12"><i class="fa fa-circle p-1 fa-xs text-red sub-bullet"></i>Banner</a></li>
                    <li class="nav-item"><a href="manage_about.php" class="nav-link  h-25 f-12"><i class="fa fa-circle p-1 fa-xs text-red sub-bullet"></i>Manage About Us</a></li>
                    <li class="nav-item"><a href="admin_panel.php" class="nav-link  h-25 f-12"><i class="fa fa-circle p-1 fa-xs text-red sub-bullet"></i>Admin Panel</a></li>
                    <li class="nav-item">
                      <a class="nav-link collapsed submenu-small  h-25 f-12" href="#navbar-gallery" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-gallery">
                        <i class="fa fa-circle p-1 fa-xs text-red sub-bullet"></i> Manage Gallery
                      </a>
                      <div class="collapse" id="navbar-gallery">
                          <ul class="nav nav-sm flex-column">
                              <li class="nav-item"><a href="add_gallery.php" class="nav-link sub">Add Gallery</a></li>
                              <li class="nav-item"><a href="view_gallery.php" class="nav-link sub">View Gallery</a></li>
                          </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link collapsed submenu-small  h-25 f-12" href="#navbar-testimonials" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-testimonials">
                       <i class="fa fa-circle p-1 fa-xs text-red sub-bullet"></i> Manage Reviews
                      </a>
                      <div class="collapse" id="navbar-testimonials">
                          <ul class="nav nav-sm flex-column">
                              <li class="nav-item"><a href="add_reviews.php" class="nav-link sub">Add Reviews</a></li>
                              <li class="nav-item"><a href="view_reviews.php" class="nav-link sub">View Reviews</a></li>
                          </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link h-25 f-12 collapsed submenu-small" href="#navbar-workout" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-workout">
                        <i class="fa fa-circle p-1 fa-xs text-red sub-bullet "></i> Workout Classes
                      </a>
                      <div class="collapse" id="navbar-workout">
                          <ul class="nav nav-sm flex-column">
                              <li class="nav-item"><a href="add_workout_classes.php" class="nav-link sub">Add Workout Classes</a></li>
                              <li class="nav-item"><a href="view_workout_classes.php" class="nav-link sub">View Workout Classes</a></li>
                          </ul>
                        </div>
                    </li>                   
                </ul>
              </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-user">
              <i class="ni ni-circle-08 text-primary"></i>  User Management
            </a>
            <div class="collapse" id="navbar-user">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item"><a href="add_user.php" class="nav-link">Add User</a></li>
                    <li class="nav-item"><a href="view_user.php" class="nav-link">View User</a></li>
                </ul>
              </div>
          </li> -->
        </ul>
       
      </div>
    </div>
  </nav>