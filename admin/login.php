<?php session_start();?>
   <?php
  include('include/config.php');
if(isset($_POST['btn_login']))
{
$unm = $_POST['email'];
//echo $_POST['passwd'];
//$p="admin";
$passw = hash('sha256', $_POST['password']);
//$passw = hash('sha256',$p);
//echo $passw;exit;
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);
//echo $pass;
 $sql = "SELECT * FROM admin WHERE email='" .$unm . "' and password = '". $pass."'";
    $result = mysqli_query($con,$sql);
    $row  = mysqli_fetch_array($result);
    //print_r($row);exit;
     
     $count=mysqli_num_rows($result);
     $_SESSION["id"] = $row['id'];
      $_SESSION["username"] = $row['username'];
      $_SESSION["password"] = $row['password'];
      $_SESSION["email"] = $row['email'];
      $_SESSION["fname"] = $row['fname'];
      $_SESSION["lname"] = $row['lname'];
      $_SESSION["image"] = $row['image'];
     if($count==1 && isset($_SESSION["email"]) && isset($_SESSION["password"])) {
    {   
     // $extra="dashboard.php";//
      $_SESSION['login']=$row['username'];
      $_SESSION['id']=$row['id'];
      $host=$_SERVER['HTTP_HOST'];
      $uip=$_SERVER['REMOTE_ADDR'];
      $status=1;
        ?>
     <script>
     window.location="index.php";
     </script>
     <?php
    }
}
else {?>
        <script> 
        alert("Invalid email or Password!");
        window.location="login.php";
        </script>
        <?php
         $message = "Invalid email or Password!";
         }
    
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.ico" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.html">
          <!-- <img src="assets/img/brand/emperor1.png" /> -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="ndex.html">
                  <img src="assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-5 py-lg-7">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-1">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-3">
              <div class="text-center text-muted">
                 <?php 
        $sql = "SELECT login_logo FROM manage_website";
        $result = $con->query($sql);
        $row=mysqli_fetch_array($result);
        ?>
                <center><img src="assets/img/brand/<?=$row[0]?>" style="width:50%;"></center><br>
                <small></small>
              </div>
              <form method="POST">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" >
                                    </div>
                                    <!-- <div class="checkbox">
                                        <label>
                                                <input type="checkbox"> Remember Me
                                            </label>
                                            <label>
                                                
                                            </label>
                                           <label class="pull-right">
                                                <a href="forgot_password.php">Forgotten Password?</a>
                                           </label>   
                                    </div> -->
                                    <button type="submit" name="btn_login" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                </form>
            </div>
          </div>
          
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-12">
            <div class="copyright text-center ">
              © <?php echo date('Y');?> Infonetics Technologies</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
</body>

</html>