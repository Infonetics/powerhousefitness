<?php include("head.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Program - <?php echo $title;?></title>
  	<?php include("header.php");?>

    <section class="hero-wrap js-fullheight" style="background-image: url('images/back2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center pt-5 mt-md-5">
            <h1 class="mb-3 bread">Program</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Program</span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section">
	  	<div class="container-fluid px-4">
        <div class="row">
        <?php $que="select * from tbl_workout_classes";
          $query=$con->query($que);
          while($row=mysqli_fetch_array($query))
          {
            extract($row); ?>     
          <div class="col-md-6 col-lg-3">
            <div class="package-program ftco-animate">
              <a  class="img d-flex justify-content-center align-items-center" style="background-image: url(images/<?php echo $image;?>);">
              </a>
              <div class="text mt-3">
                <h3><a href="#"><?php echo $title;?></a></h3>
                <p class="text-justify"><?php echo $short_desc;?></p>
              </div>
            </div>
          </div>
        <?php } ?>    	
       
        </div>
        
	  	</div>
	  </section>

    <?php include("footer.php");?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>