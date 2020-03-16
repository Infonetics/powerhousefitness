<!-- Navbar -->
    
        <!-- Form -->
        <!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form> -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <?php    
                                          $sql = "SELECT * FROM admin where id=1";
                                           $result = $con->query($sql);

                                           while($row = $result->fetch_assoc())  { ?>
                  <img alt="Image placeholder" src="./images/<?php  echo $row['image']; ?>">
                    <?php } ?>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="profile.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <!-- <a href="profile.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="profile.php" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="profile.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
				    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Trainers</h5>
									     <?php $query=mysqli_query($con,"select count(trainer_id) as cnt from tbl_trainer where 1");
                          while($row=mysqli_fetch_array($query))
                            {
                            	$trainer_count= $row['cnt'];
                            }
									     ?> 
                      <span class="h2 font-weight-bold mb-0"><?php echo $trainer_count;?></span>
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow float-right">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Workout Classes</h5>
                      <?php $query=mysqli_query($con,"select count(workout_classes_id) as cnt from tbl_workout_classes where 1");
                   

                          while($row=mysqli_fetch_array($query))
                            {
                              $gym_classes_count= $row['cnt'];
                            }
                       ?> 
                      <span class="h2 font-weight-bold mb-0"><?php echo $gym_classes_count;?></span>
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow float-right">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p> -->
                </div>
              </div>
            </div>
              <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Plans</h5>
                      <?php $query=mysqli_query($con,"select count(membership_id) as cnt from tbl_membership where 1");
                          while($row=mysqli_fetch_array($query))
                            {
                              $membership_count= $row['cnt'];
                            }
                       ?> 
                      <span class="h2 font-weight-bold mb-0"><?php echo $membership_count;?></span>
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow float-right">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Customers</h5>
                      <?php $query=mysqli_query($con,"select count(customer_id) as cnt from tbl_customer where 1");
                          while($row=mysqli_fetch_array($query))
                            {
                              $customers_count= $row['cnt'];
                            }
                       ?> 
                      <span class="h2 font-weight-bold mb-0"><?php echo $customers_count;?></span>
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow float-right">
                        <i class="fas fa-comments"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
