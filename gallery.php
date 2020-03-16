<?php include("head.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gallery- <?php echo $title;?></title>
  	<?php include("header.php");?>

    <section class="hero-wrap js-fullheight" style="background-image: url('images/back4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          
          <div class="col-md-9 ftco-animate text-center pt-5 mt-md-5">
            <h1 class="mb-3 bread">Gallery</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Gallery</span></p>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-gallery mt-5 mb-5">
      <div class="container-wrap">
        <div class="heading-section mb-4">
                <span class="subheading text-center"> GALLERY PHOTOS &amp; VIDEOS</span>     
              </div>
        <div class="row no-gutters">   
      <?php $que="select * from tbl_gallery WHERE 1 ORDER BY gallery_id ASC";
          $query=$con->query($que);
          while($row=mysqli_fetch_array($query))
          {
            extract($row); ?> 
            <?php $bgclass=""; if($gallery_video){ $bgclass="bg-dark";}?> 

          <div class="col-md-3 ftco-animate fadeInUp ftco-animated <?=$bgclass?> ">
             <?php if($image){?> 
            <a href="images/<?php echo $image;?>" class="gallery image-popup img d-flex align-items-center gallery_img" style="background-image: url(images/<?php echo $image;?>);">
            <?php } else {?>
              <a href="images/<?php echo $gallery_video;?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
              <span class="ion-ios-play">
                <div class="img img-video d-flex align-items-center" style="background-color: #000000;">
              <div class="video justify-content-center">
                </div>
            </div>
              </span></a>
              
            <?php } ?>

              
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
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
  <script type="text/javascript">
    $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
    
    $(this).addClass('transition');
  }, function(){
        
    $(this).removeClass('transition');
  });
});
  </script>
  </body>
</html>