<?php include("head.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home - <?php echo $title;?></title>
  	<?php include("header.php");?>     
    <section class="home-slider js-fullheight owl-carousel ftco-degree-bottom">
    	<?php $que="select * from tbl_banner WHERE 1 order by banner_id ASC";
          $query=$con->query($que);
          while($row=mysqli_fetch_array($query))
          { ?>
      <div class="slider-item js-fullheight" style="background-image: url(images/<?php echo $row['image'];?>);">
      <?php	if($row['banner_title']!=''){ ?>
      	<div class="overlay"></div>
      <?php } ?>
        <div class="container-fluid">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-sm-12 ftco-animate text-center mt-5 pt-md-5">
              <h1 class="mb-4"><?php echo $row['text1'];?><span><?php echo $row['text2'];?></span></h1>
              <h2 class="subheading"><?php echo $row['text3'];?></h2>
            </div>

          </div>
        </div>
      </div>
       <?php  }?>
    </section> 


    <section class="ftco-section ftco-about pb-2">
    	<div class="container">
    		<div class="row">
    			<?php $que="select * from tbl_manage_about";
          $query=$con->query($que);
          while($row=mysqli_fetch_array($query))
          { ?>
    			<div class="col-md-6 pl-md-5 ftco-animate d-flex align-items-center">
    				<div class="text pt-4 pt-md-0">
		          <div class="heading-section mb-4">
		          	<span class="subheading">Welcome</span>
		            <h2 class="mb-1">Welcome to </br><span>PowerHouse Fitness</span> Body Building</h2>
		          </div>
		          <p class="text-justify"><?php echo $row['aboutus_content'];?></p>
		          <p><a onClick="window.location.href='contact.php';" class="btn btn-primary p-3">Join us</a></p>
	          </div>
    			</div>
    			<div class="col-md-6">
    				<div class="thumb-wrap d-flex">
    					<a href="#" class="thumb img" style="background-image: url(images/<?php echo $row['image1'];?>);"></a>
    					<a href="#" class="thumb img" style="background-image: url(images/<?php echo $row['image2'];?>);"></a>
    					<a href="#" class="thumb img" style="background-image: url(images/<?php echo $row['image3'];?>);"></a>
    				</div>
    				<div class="img img-video d-flex align-items-center" style="background-image: url(images/<?php echo $row['video_bg_image'];?>);">
    					<div class="video justify-content-center">
								<a href="images/<?php echo $row['video'];?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
									<span class="ion-ios-play"></span>
		  					</a>
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
								<p class="text-justify">Internationally acclaimed imported fitness equipment brand-VIVA Fitness USA</p>
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
    <section class="ftco-section ftco-package-program bg-darken pt-5">
	  	<div class="container-fluid px-0">
	  		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section heading-section-white ftco-animate text-center">
            <span class="subheading"><small><i class="left-bar"></i>Gym Classes<i class="right-bar"></i></small></span>
            <h3 class="mb-1 text-white font-italic font-weight-bold">WHAT YOU GET FROM <span class="text-primary ">POWERHOUSE FITNESS</span> MEMBERSHIP</h3>
            <p><p>Join in our various fitness programmes.</p></p>
          </div>
        </div>
        <div class="row no-gutters">
        	<div class="col-md-12">
        		<div class="carousel-package-program owl-carousel">
        		<?php $que="select * from tbl_workout_classes";
          $query=$con->query($que);
          while($row=mysqli_fetch_array($query))
          {
            extract($row); ?>     
              <div class="item">
              	<div class="package-membership ftco-animate">
		        			<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/<?php echo $image;?>);">
		        				<div class="text text-center d-flex align-items-end">
		        					<div class="desc">
				        				<h3><?php echo $title;?></h3>
				        				<p class="text-justify"><?php echo $short_desc;?></p>
			        				</div>
			        			</div>
		        			</a>
		        		</div>
              </div>
        <?php } ?>	

            </div>
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
      </div>
    </section>

    <!-- <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading"><small><i class="left-bar"></i>Testimonies<i class="right-bar"></i></small></span>
            <h2 class="mb-1">Successful Stories</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">

            <?php $que="select * from tbl_testimonials";
					$query=$con->query($que);
					while($row=mysqli_fetch_array($query))
					{
						extract($row); ?>		
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line"><?php echo $description;?></p>

                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/<?php echo $image;?>)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="ml-4">
		                  	<p class="name"><?php echo $customer_name;?></p>
		                    <span class="position"><?php echo $customer_position;?></span>
		                  </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <section class="ftco-section testimony-section pb-4 pt-4">
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
    <section class="ftco-section bg-light pt-4 pb-4">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 text-center">
    				<div class="heading-section mb-1">
	          	<span class="subheading"><small class="f-30"><i class="left-bar"></i>Services<i class="right-bar"></i></small></span>
	            <h2 class="mb-1">Kick your <span>feet</span> up</h2>
	          </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-3">
    				<div class="services text-center ftco-animate">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-ruler"></span>
							</div>
							<div class="text px-md-2">
								<h3>Analyze Your Goal</h3>
								<p class="text-justify">Having a solid fitness goal is an amazing way to power you towards success.One of the best practices when it comes to goal setting is analyzing your goal.</p>
							</div>
						</div>
    			</div>
					<div class="col-md-3">
						<div class="services text-center ftco-animate">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-gym"></span>
							</div>
							<div class="text px-md-2">
								<h3>Work Hard On It</h3>
								<p class="text-justify">Challenging yourself every day is one of the most exciting ways to live. When you feel like quitting, think about why you started and push yourself.</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="services text-center ftco-animate">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-tools-and-utensils"></span>
							</div>
							<div class="text px-md-2">
								<h3>Improve Your Performance</h3>
								<p class="text-justify">Be Well-Fed, Hydrated, and Rested. Everything you've done since your last workout sets the tone for the next one.</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="services text-center ftco-animate">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-abs"></span>
							</div>
							<div class="text px-md-2">
								<h3>Achieve Your Perfect Body</h3>
								<p class="text-justify">It takes time to create a better, stronger version of yourself. Dont ever give-up adn remember consistency is the key.</p>
							</div>
						</div>
					</div>
    		</div>
    	</div>
    </section>
    <section class="ftco-counter pt-4 pb-4 img" data-stellar-background-ratio="0.5">
    	<div class="col heading-section ftco-animate text-center fadeInUp ftco-animated">
            <span class="subheading h2"><small class="f-30"><i class="left-bar"></i>explore<i class="right-bar"></i></small></span>
          </div>
      <video id="videobg" poster="images/poster.jpg" autoplay muted loop>
            <source src="images/gymfeat.mp4" type="video/mp4">
          </video>
    </section>
	<!-- <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="<?php echo $happy_customers;?>">0</strong>
		              	<span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="<?php echo $perfect_bodies;?>">0</strong>
		              	<span>Perfect Bodies</span>
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
		              	<span>Success Stories</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section> -->
	<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<div class="gallery ftco-gradient d-flex justify-content-center align-items-center">
							<div class="row justify-content-center">
			          <div class="col-md-12 heading-section ftco-animate text-center">
			            <h3 class="subheading"></h3>
			            <h2 class="mb-1">Gallery</h2>
                  <p><a onClick="window.location.href='gallery.php';" class="btn btn-outline-danger font-weight-bold see-btn p-3">See More</a></p>
			          </div>
			        </div>
		        </div>
					</div>
					<?php $que="select * from tbl_gallery WHERE 1 ORDER BY gallery_id ASC LIMIT 0,7";
					$query=$con->query($que);
					while($row=mysqli_fetch_array($query))
					{
						extract($row); ?>	
					<div class="col-md-3 ftco-animate">
						<a href="images/<?php echo $image;?>" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/<?php echo $image;?>);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<!-- <span class="icon-instagram"></span> -->
    					</div>
						</a>
					</div>
				<?php } ?>
					
        </div>
    	</div>
    </section>
    <section class="ftco-appointment">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex align-items-center">
	    		<div class="col-md-6 appointment pl-md-5 py-md-5 ftco-animate">
	    			<h3 class="mb-3">Calculate Your BMI</h3>
	    			<form action="#" class="appointment-form" id="bmi">
	    				<div class="form-group">	
	    					<div class="d-flex">
	    						<div class="mr-2">
	    							<label for="height">Height</label>
		    						<input type="text" class="form-control ml-2" placeholder="inches" name="height" size="10">
		    					</div>
	    					
	    						<div class="ml-2">
	    							<label for="weight">Weight</label>
			    					<input type="text" class="form-control" placeholder="lbs" name="weight" size="10" max="4">
		    					</div>
		    				</div>
	    				</div>
	    				<div class="form-group">
	    					<div class="d-flex">
	    						<div class="mr-2">
	    							<label for="gender">Gender</label>
		    						<input type="text" class="form-control ml-2" placeholder="gender" id="gender" name="gender">
			    				</div>
		    					<div class="ml-2">
	    							<label for="age">Age</label>
			    					<input type="text" class="form-control" placeholder="yrs" id="age" name="age">
			    				</div>
	    					</div>
	    				</div>
	    				<div class="form-group">
	    					
	    					<div class="d-flex">
	    						<div class="mr-2">
	    							<label for="bmi">your bmi is:</label>
                                	<input class="form-control ml-2" type="text" id="dopeBMI" size="10" readonly>
                            	</div>
                            	<div class="ml-2">
                            		<label for="age" >&nbsp;</label>
                            		<input class="form-control ml-2" type="text" id="meaning" size="10" readonly style="border:none !important;font-size:larger;color:#c75b0f !important;">
                            	</div>
                            </div>
                        </div>
	    				<div class="d-md-flex">
		            <div class="form-group d-flex">
		            	<input type="submit" value="Calculate" class="btn btn-secondary py-3 px-4 mr-2" id="calculateBMI" name="verify">
		             
		              <!-- input type="submit" value="BMI" class="btn btn-primary py-3 px-4 ml-2"> -->
		            </div>
	    				</div>
	    			</form>
	    		</div>  
	    		<div class="col-md-6 d-flex img ">
					 <div class="bmi-img">
						<img src="images/bmi.png" class="img-fluid" alt="">
					</div> 
					<!--  <div class="col-md-5 d-flex align-self-stretch img" >
    				<img src="images/bmi.webp" /> -->
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