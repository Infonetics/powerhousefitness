<?php include("head.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Membership Plans - <?php echo $title;?></title>
    <?php include("header.php");?>

    <section class="hero-wrap js-fullheight" style="background-image: url('images/back5.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center pt-5 mt-md-5">
            <h1 class="mb-3 bread">Pricing</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Pricing</span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading"><small><i class="left-bar"></i>Pricing Tables<i class="right-bar"></i></small></span>
            <h2 class="mb-1">Membership Plans</h2>
          </div>
        </div>
        <div class="row">
        	<?php $que="select * from tbl_membership WHERE plan=1";
					$query=$con->query($que);
					while($row=mysqli_fetch_array($query))
					{
						extract($row); ?>			
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading"> <?php echo $duration;?></h2>
              <?php if($plan==2){?>
              <p><?php echo "(".$short_desc.")";?></p>
              <?php } else if($plan==1){
                if($applicable_for==2){ $applicable="Ladies"; } else if($applicable_for==3){$applicable="Gents";}else{$applicable="Common";}
                if($applicable){
                ?>

              <p><?php echo "(".$applicable.")";?></p>
              <?php } } ?>
	            <span class="price"><sup>₹</sup> <span class="number"><?php echo $price;?></span></span>
	            <span class="excerpt d-block"></span>
	            <a href="#" class="btn btn-primary d-block px-2 py-4 mb-4"><?php echo $name;?></a>
	            </div>
	          </div>
	        </div>
	    <?php } ?>
	      </div>


        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-1">Personal Training Plans</h2>
          </div>
        </div>
        <div class="row">
          <?php $que="select * from tbl_membership WHERE plan=2";
          $query=$con->query($que);
          while($row=mysqli_fetch_array($query))
          {
            extract($row); ?>     
          <div class="col-md-4 ftco-animate">
            <div class="block-7">
              <div class="text-center">
              <h2 class="heading"> <?php echo $duration;?></h2>
              <?php if($plan==2){?>
              <p><?php echo "(".$short_desc.")";?></p>
              <?php } else if($plan==1){ 
                if($applicable_for==2){ $applicable="Ladies"; } 
                else if($applicable_for==3){$applicable="Gents";}
                else if($applicable_for==1){$applicable="Common";}
                if($applicable){ ?>
                  <p><?php echo "(".$applicable.")";?></p>
              <?php } } ?>
              <span class="price"><sup>₹</sup> <span class="number"><?php echo $price;?></span></span>
              <span class="excerpt d-block"></span>
              <a href="#" class="btn btn-primary d-block px-2 py-4 mb-4"><?php echo $name;?></a>
              </div>
            </div>
          </div>
      <?php } ?>
        </div>
	      <div class="row mt-5">
    			<div class="col-md-4">
    				<div class="services d-flex ftco-animate">
							<div class="icon-2 d-flex justify-content-center align-items-center">
								<span class="flaticon-ruler p-2"></span>
							</div>
							<div class="text px-md-2 pl-4">
								<h3>100+ Equipment</h3>
								<p class="text-justify">Internationally acclaimed imported fitness equipment brand-VIVA Fitness USA.</p>
							</div>
						</div>
    			</div>
					<div class="col-md-4">
						<div class="services d-flex ftco-animate">
							<div class="icon-2 d-flex justify-content-center align-items-center">
								<span class="flaticon-gym p-2"></span>
							</div>
							<div class="text px-md-2 pl-4">
								<h3>Working Hours</h3>
								<p class="text-justify">Working hours of Gym is between Monday - Saturday 5:00AM - 10PM and Sunday 6:00AM - 10:00AM & 4:00PM - 8:00PM.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="services d-flex ftco-animate">
							<div class="icon-2 d-flex justify-content-center align-items-center">
								<span class="flaticon-tools-and-utensils p-2"></span>
							</div>
							<div class="text px-md-2 pl-4">
								<h3>Food Supply</h3>
								<p class="text-justify">Nutritional supplements from Germany-Mr. Olympia founder Joe Welder's weider sports nutrition.</p>
							</div>
						</div>
					</div>
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