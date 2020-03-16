 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ <?php echo $contact;?></span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text"><?php echo $email;?></span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link line-height-normal"><span>Open hours:</span> <span><?php echo $open_hours;?></span></br><span><?php echo $open_hours1;?><br></span></p>
					    </div>
				    </div>
			    </div>
		    </div>
		</div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="inde.php"><label><img src="images/<?php echo $logo;?>" style="max-height: 120px;position: absolute; margin-top: -21px;"></label></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      	<?php $pages=array(
					'index.php'=> 'Home',
					'about.php'=> 'About',
					'program.php'=> 'Programs',
					'contact.php'=> 'Contact',
					'pricing.php'=> 'Pricing',
					'gallery.php'=> 'Gallery',
					'coaches.php'=> 'Trainers',
					);
	      	//echo "<pre>";print_r($_SERVER);
	      	//echo $_SERVER['HTTP_HOST'].'-->'.$_SERVER['PHP_SELF'].'</br>';
	      $page=str_replace('/','',$_SERVER['PHP_SELF']);
	      	?>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<?php foreach($pages as $key => $arr){$active="";
	        		if($page==$key){$active="active";}?>
	        	<li class="nav-item <?=$active?>"><a href="<?=$key?>" class="nav-link"><?=$arr?></a></li>
	          	<?php } ?>
	          	<!-- <li class="nav-item"><a href="coaches.php" class="nav-link">Trainers</a></li>-->
				<!-- <li class="nav-item"><a href="pricing.php" class="nav-link">Pricing</a></li>
				<li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>  -->
	          	<li class="nav-item"><a href="./admin" class="nav-link">Admin Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->