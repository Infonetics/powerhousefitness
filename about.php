<?php include("head.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>About - <?php echo $title;?></title>
  	<?php include("header.php");?>

    <section class="hero-wrap js-fullheight" style="background-image: url('images/back1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center pt-md-5 pt-5">
            <h1 class="mb-3 bread">About us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>About Us</span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-about">
    	<div class="container">
    		<div class="row">
    			<?php $que="select * from tbl_manage_about";
          $query=$con->query($que);
          while($row=mysqli_fetch_array($query))
          { ?>
          <div class="col-md-6">
            <div class="img img-video d-flex align-items-center" style="background-image: url(images/<?php echo $row['video_bg_image'];?>);">
              <div class="video justify-content-center">
                <a href="images/<?php echo $row['video'];?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                  <span class="ion-ios-play"></span>
                </a>
              </div>
            </div>
            <div class="thumb-wrap d-flex">
              <a href="#" class="thumb img" style="background-image: url(images/<?php echo $row['image1'];?>);"></a>
              <a href="#" class="thumb img" style="background-image: url(images/<?php echo $row['image2'];?>);"></a>
              <a href="#" class="thumb img" style="background-image: url(images/<?php echo $row['image3'];?>);"></a>
            </div>
          </div>
          <div class="col-md-6 pl-md-5 ftco-animate d-flex align-items-center">
            <div class="text pt-4 pt-md-0">
              <div class="heading-section mb-4">
                <span class="subheading">Welcome</span>
                <h2 class="mb-1">Welcome to </br><span>Power House Fitness</span> Body Building</h2>
              </div>
              <p class="text-justify"><?php echo $row['aboutus_content'];?></p>
              <p><a onClick="window.location.href='contact.php';" class="btn btn-primary p-3">Join us</a></p>
            </div>
          </div>
        <?php } ?>
    		</div>
    	</div>
    </section>
    <section>
    	<div class="container">
        <div class="row justify-content-center mb-2 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading"><small><i class="left-bar"></i>Gym Policies<i class="right-bar"></i></small></span>
            <h2>Power House Fitness Bodybuilding gym Policies</h2>
          </div>
        </div>
    	<hr>
    	<center>
    <table border=0 class="rectangle-list">
        <tr>
            <td>
            	<ol>
					<li><p>Membership fees cannot be refunded or transfered to another member.</p></li>
					<li><p>Gym is monitored with CCTV.</p></li>
					<li><p>Gym is not responsible for lost of money, mobile phones or valuable items.</p></li>
					<li><p>Gym is not responsible or injuries from Misuse.</p></li>
					<li><p>Invoice must be collected when registering or renewel, objections cannot be made in case of no inovice.</p></li>
					<li><p>In case of using another member card Gym has the right to cancel the membership.</p></li>
					<li><p>Membership can be freezed for 2 weeks maximum, just in case of registering in 3 months or more.</p></li>
					<li><p>For your safety, Sports shoes and towel must be used(Compulsory).</p></li>
					<li><p>Weights must be returned back to its place.</p></li>
				</ol>
            </td>
        </tr>
    </table>	

</center>
    	</div>

    </section>
    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading"><small><i class="left-bar"></i>Features<i class="right-bar"></i></small></span>
            <h2 class="mb-1">GYM Facilities</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel"> 
              

              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line">Batch Training</p>
                    <p class="mb-4 pb-1 pl-4 line">Strength Training</p>
                    <p class="mb-4 pb-1 pl-4 line">Endurance Training</p>
                    <p class="mb-4 pb-1 pl-4 line">Steam Bath</p>
                    <p class="mb-4 pb-1 pl-4 line">Dietry Suppliments Store</p>
                    <p class="mb-4 pb-1 pl-4 line">Diet & Nutrition</p>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line">Female Trainers</p>
                    <p class="mb-4 pb-1 pl-4 line">Music System</p>
                    <p class="mb-4 pb-1 pl-4 line">Beauty Spa & Saloon</p>
                    <p class="mb-4 pb-1 pl-4 line">Locker Facility</p>
                    <p class="mb-4 pb-1 pl-4 line">Friendly Front Ofiice</p>
                    <p class="mb-4 pb-1 pl-4 line">Parking Facility</p>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line">Body Composition Analyzer</p>
                    <p class="mb-4 pb-1 pl-4 line">Jogging Track</p>
                    <p class="mb-4 pb-1 pl-4 line">Air Conditoner</p>
                    <p class="mb-4 pb-1 pl-4 line">Personal Training</p>
                    <p class="mb-4 pb-1 pl-4 line">Body Transformation</p>
                    <p class="mb-4 pb-1 pl-4 line">Group Classes</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section> 

		<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="<?php echo $happy_customers;?>">0</strong>
		              	<span>Gym Square Feet</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="<?php echo $perfect_bodies;?>">0</strong>
		              	<span>Total Equipments</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="<?php echo $working_hours;?>">0</strong>
		              	<span>Working Hours</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="<?php echo $success_stories;?>">0</strong>
		              	<span>Programs</span>
		              </div>
		            </div>
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