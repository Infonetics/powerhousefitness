<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Dashboard
  </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.ico" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <?php include("include/sidebar.php");?>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">Dashboard</a>
    <!-- Header -->
  <?php include("include/header.php");?>
    <div class="container-fluid mt--7">
      
      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Recent Customers</h3>
                </div>
                <div class="col text-right">
                  <a href="banner.php" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <div class="col-xl-12 col-md-12" style="height: auto;">
      <div class="card" style="height: 350px;">
       
        <div class="card-content">
          <div class="table-responsive">
            <table class="table table-bordered table-dark">
              <thead class="thead-dark">
                <th>Customer Name</th>
                <th>Joining Date</th>
                <th>Paid Status</th>
                <th>Plan</th>
                <th>Completion</th>
              </thead>
              <tbody>
                <?php 
                $sql = "SELECT *  FROM `".DB_PREFIX."`.`tbl_customer` c ORDER BY c.`customer_id` DESC LIMIT 0,5";
                $result = $con->query($sql);
                while($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $row['fname'].' '.$row['lname']?></td>
                  <td><?php echo $row['joined_date']?></td>
                  <td><span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>paid
                      </span></td>
                  <td><div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Membership Plan">
                          <img alt="Image placeholder" src="../admin/assets/img/theme/mp.png" class="rounded-circle">
                        </a>
                      </div></td>
                  <td><div class="d-flex align-items-center">
                        <span class="mr-2">25%</span>
                        <div>

                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                </tr>
              <?php } ?>
                <tr>
                  <td>Harry Lare</td>
                  <td>12/03/2020</td>
                  <td><span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>unpaid
                      </span></td>
                  <td><div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Membership Plan">
                          <img alt="Image placeholder" src="../admin/assets/img/theme/mp.png" class="rounded-circle">
                        </a>
                      </div>
                  </td>
                  <td><div class="d-flex align-items-center">
                        <span class="mr-2">50%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        </div>
                      </div></td>
                </tr>
                <tr>
                  <td>Sara Laue</td>
                  <td>30-03-2020</td>
                  <td><span class="badge badge-dot mr-4 text-muted">
                        <i class="bg-secondary"></i>expired
                      </span></td>
                  <td><div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Membership Plan">
                          <img alt="Image placeholder" src="../admin/assets/img/theme/mp.png" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Personal Training">
                          <img alt="Image placeholder" src="../admin/assets/img/theme/pt.png" class="rounded-circle">
                        </a>
                      </div></td>
                  <td><div class="d-flex align-items-center">
                        <span class="mr-2">75%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                          </div>
                        </div>
                      </div></td>
                </tr>
                <tr>
                  <td>Jack Doswal</td>
                  <td>01-03-2020</td>
                  <td><span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>paid
                      </span></td>
                  <td><div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Membership Plan">
                          <img alt="Image placeholder" src="../admin/assets/img/theme/mp.png" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Personal Training">
                          <img alt="Image placeholder" src="../admin/assets/img/theme/pt.png" class="rounded-circle">
                        </a>
                      </div></td>
                  <td><div class="d-flex align-items-center">
                        <span class="mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div></td>
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
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Income and Expense</h3>
                </div>
                <div class="col text-right">
                  <a href="#" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="acc-box p-2 m-1 mt-2">
         		<span class="fa-stack fa-2x">
  					<i class="fas fa-square text-primary fa-stack-2x"></i>
  					<i class="fa fa-calendar-alt fa-stack-1x fa-inverse"></i>
				</span>
         		 <span class="float-right">DATE</span><br>
            <span class="float-right font-weight-bold text-primary mar-25">26-02-2020</span>
         	</div>
         	<div class="acc-box p-2 m-1 mt-2">
         		<span class="fa-stack fa-2x">
  					<i class="fas fa-square fa-stack-2x text-success"></i>
  					<i class="fa fa-piggy-bank fa-stack-1x fa-inverse"></i>
				</span>
         		<span class="float-right">INCOME</span><br>
         		<span class="float-right font-weight-bold text-success mar-25">₹ 12,000.00</span>
         	</div>
         	<div class="acc-box p-2 m-1 mt-2">
         		<span class="fa-stack fa-2x">
  					<i class="fas fa-square text-danger fa-stack-2x"></i>
  					<i class="fa fa-money-bill-alt fa-stack-1x fa-inverse"></i>
				</span>
         		<span class="float-right">EXPENSE</span><br>
         		<span class="float-right font-weight-bold text-danger mar-25">₹ 1,000.00</span>
         	</div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-sm-8">
           <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Top Membership Plans</h3>
                </div>
                <div class="col text-right">
                  <a href="#" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <div class="col-xl-12 col-md-12" style="height: auto;">
      <div class="card" style="height: 350px;">
       
        <div class="card-content">
          <div class="table-responsive">
            <table class="table table-bordered table-light">
              <thead class="thead-light">
                <th>Membership Plan</th>
                <th>Active Plan Members</th>
                <th>Top Members</th>
                <th>Active Percent</th>
              </thead>
              <tbody>
              <?php 
                $sql = "SELECT cm.`membership_id`,cm.`customer_id`, COUNT(cm.`membership_id`) as plancount,m.`name`  FROM `".DB_PREFIX."`.`tbl_customer_membership` cm 
                LEFT JOIN `tbl_membership` m on(m.`membership_id` = cm.`membership_id`)
                GROUP BY cm.`membership_id` ORDER BY COUNT(cm.`membership_id`) DESC";
                $result = $con->query($sql);
                while($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $row['name']?></td>
                  <td><?php echo $row['plancount']?></td>
                  <td><div class="avatar-group">
                  <?php 
                  $sqll = "SELECT cm.`membership_id`,cm.`customer_id`,c.`fname`,c.`lname`,c.`image` FROM `".DB_PREFIX."`.`tbl_customer_membership` cm LEFT JOIN `tbl_customer` c on(c.`customer_id` = cm.`customer_id`) WHERE   cm.`membership_id`='".$row['membership_id']."'";
                  $resultt = $con->query($sqll);
                  while($roww = $resultt->fetch_assoc()) { ?>
                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="<?php echo $roww['fname'].' '.$roww['lname']?>">
                          <img alt="Image placeholder" src="../images/customers/<?php echo $roww['image'];?>" class="rounded-circle">
                        </a>
                        <?php } ?>
                      </div></td>
                  <td><div class="d-flex align-items-center">
                        <span class="mr-2">25%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                          </div>
                        </div>
                      </div>
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
      <!-- Footer -->
      <?php include("include/footer.php");?>
    </div>
  </div>
  <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.0"></script>

</body>

</html>