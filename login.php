<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gym management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
	  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Cliffy's Gymnasium</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="site.php#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="site.php#programs-section" class="nav-link"><span>Programs</span></a></li>
	          <li class="nav-item"><a href="site.php#services-section" class="nav-link"><span>Services</span></a></li>
	          <li class="nav-item"><a href="site.php#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="site.php#coaches-section" class="nav-link"><span>Coaches</span></a></li>
              <li class="nav-item"><a href="site.php#blog-section" class="nav-link"><span>Blog</span></a></li>
              <li class="nav-item"><a href="Registration1.php" class="nav-link"><span>Register</span></a></li>
	          <li class="nav-item"><a href="site.php#contact-section" class="nav-link"><span>Contact</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav><br><br><br><br>
	  
	  <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
			  <span class="subheading" style="color: #42c0fb;"><strong>Login</strong></span>
			  <h2 class="mb-4">Sign in</h2>
			  <p>Not a member? <a href="Registration1.php" style="color: #42c0fb;">Register now</a></p>
			</div>
		  </div>
  
		  <div class="row block-9">
			<div class="col-md-7 order-md-last d-flex">
        <?php 
        $role = null;
        $redirect = null;
         ?>
			  <form class="bg-light p-4 p-md-5 contact-form">
                <div class="form-group">
                  <label for="role">Choose Role *</label><br>
                  <select name = 'role' class="form-control">
                  <option  value="member" selected>Member</option>
                  <option value="trainer">Trainer</option>
                  <option value="admin">Admin</option>
                  </select>
                  <br>
                  <input type="submit" value="Continue" class="btn btn-primary py-3 px-5" style="background-color: #42c0fb; border-color: #42c0fb;">
                </div>
            <?php
            $role = $_GET["role"];
            
            switch ($role) {
              case 'member':
                  $redirect = 'userlogin.php';
              break;
              case 'trainer':
                  $redirect = 'trainer-login.php';
              break;
              case 'admin':
                  $redirect = 'AdminLogIn.php';
              break;
          }
          
          header('Location: ' . $redirect);
            ?>    
			  </form>
			
			</div>
  
			<div class="col-md-5 d-flex">
				<div class="row d-flex contact-info mb-5">
					<div class="col-md-12 ftco-animate">
						<div class="box p-2 px-3 bg-light d-flex">
							<div class="icon mr-3">
								<span class="icon-map-signs" style="color: #42c0fb;"></span>
							</div>
							<div>
								<h3 class="mb-3">Address</h3>
							  <p>198 West 21th Street, Suite 721 New York NY 10016</p>
						  </div>
						</div>
					</div>
					<div class="col-md-12 ftco-animate">
						<div class="box p-2 px-3 bg-light d-flex">
							<div class="icon mr-3">
								<span class="icon-phone2" style="color: #42c0fb;"></span>
							</div>
							<div>
								<h3 class="mb-3">Contact Number</h3>
							  <p><a href="tel://1234567920" style="color: #42c0fb;">+ 1235 2355 98</a></p>
						  </div>
						</div>
					</div>
					<div class="col-md-12 ftco-animate">
						<div class="box p-2 px-3 bg-light d-flex">
							<div class="icon mr-3">
								<span class="icon-paper-plane" style="color: #42c0fb;"></span>
							</div>
							<div>
								<h3 class="mb-3">Email Address</h3>
							  <p><a href="mailto:info@yoursite.com" style="color: #42c0fb;">info@yoursite.com</a></p>
						  </div>
						</div>
					</div>
					<div class="col-md-12 ftco-animate">
						<div class="box p-2 px-3 bg-light d-flex">
							<div class="icon mr-3">
								<span class="icon-globe" style="color: #42c0fb;"></span>
							</div>
							<div>
								<h3 class="mb-3">Website</h3>
							  <p><a href="#" style="color: #42c0fb;">yoursite.com</a></p>
						  </div>
						</div>
					</div>
				  </div>
			</div>
		  </div>
		</div>
      </section>

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About <span><a href="index.html">Slim.</a></span></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Cocahes</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Schedule</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Gym Fitness</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Crossfit</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Yoa</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Aerobics</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

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
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>