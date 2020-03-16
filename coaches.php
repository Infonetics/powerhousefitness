<?php include("head.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coaches  - <?php echo $title;?></title>
  	<?php include("header.php");?>

    <section class="hero-wrap js-fullheight" style="background-image: url('images/back4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center mt-md-5 pt-5">
            <h1 class="mb-3 bread">Our Coaches</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Coaches</span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section bg-light">
    	<div class="container-fluid px-4">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<h3 class="subheading">Shape Your Body</h3>
            <h2 class="mb-1">Our Coaches</h2>
          </div>
        </div>
    		<div class="row justify-content-center" >
          <?php $que="select * from tbl_trainer WHERE 1 order by sort_order ASC";
          $query=$con->query($que);
          while($row=mysqli_fetch_array($query))
          {
             ?>     
          <div class="col-lg-3 d-flex">
            <div class="coach align-items-stretch">
              <div class="img" style="background-image: url(images/<?php echo $row['image'];?>);"></div>
              <div class="text pt-3 ftco-animate">
                <span class="subheading"> <?php echo $row['designation'];?></span>
                <h3><a href="#"><?php echo $row['fname'].' '.$row['lname'];?></a></h3>
                <p class="text-justify"><?php echo $row['description'];?></p>
               <?php  if($row['trainer_facebook'] || $row['trainer_watsapp'] || $row['trainer_instagram']){ ?>
                <ul class="ftco-social-media d-flex mt-4">
                  <?php  if($row['trainer_watsapp']){?>
                  <li class="ftco-animate"><a href="<?php echo $row['trainer_watsapp'];?>" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-whatsapp"></span></a></li>
                  <?php } ?>
                  <?php  if($row['trainer_facebook']){?>
                  <li class="ftco-animate"><a href="<?php echo $row['trainer_facebook'];?>" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a></li>
                  <?php } ?>
                  <?php  if($row['trainer_instagram']){?>
                  <li class="ftco-animate"><a href="<?php echo $row['trainer_instagram'];?>" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a></li>
                  <?php } ?>
                </ul> 
                <?php  } ?>
                <p></p>
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