<?php include("head.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact - <?php echo $title;?></title>
    <?php include("header.php");?>

    <section class="hero-wrap js-fullheight" style="background-image: url('images/back3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center pt-5 mt-md-5">
            <h1 class="mb-3 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact</span></p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate bg-light p-4">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Contact Information</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Address:</span></br> <?php echo $address;?></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Phone:</span> <a href="tel://1234567920">+ <?php echo $contact;?></a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <a href="mailto:admin@emperorgym.ae"><?php echo $email;?></a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Website:</span> <a href="#"><?php echo $website_link;?></a></p>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form id="contact-form" method="POST"  class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" name="email" id="email" placeholder="Your Email">
	                </div>
	                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="btn_submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?php 
if(isset($_POST["btn_submit"]))
{
extract($_POST);
$ToEmail = 'admin@emperorgym.ae'; 
$EmailSubject = 'Emperor Gym Contact Form -'.$_POST["subject"].""; 
$mailheader = "From: ".$_POST["email"]."\r\n"; 
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
$mailheader .= "MIME-Version: 1.0" . "\r\n";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$mailheader .='X-Mailer: PHP/' . phpversion();
$MESSAGE_BODY = "Name: ".$_POST["name"]."\r\n"; 
$MESSAGE_BODY .= "Email: ".$_POST["email"]."\r\n"; 
$MESSAGE_BODY .= "Hi, ".nl2br($_POST["message"]).""; 
if(mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader)) {
//echo"<p class='success'>Contact Mail Sent.</p>";
} else {
//echo"<p class='Error'>Problem in Sending Mail.</p>";
}
//header("Location: http://www.emperorgym.ae/contact.php");
}
?>
    <div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1656.8438171688224!2d76.77304787654926!3d9.003315575514733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMDAnMTIuMiJOIDc2wrA0NicyNC42IkU!5e0!3m2!1sen!2sin!4v1581156007133!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

    </div>
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