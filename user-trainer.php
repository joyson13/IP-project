<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gym management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
	      <a class="navbar-brand" href="site.php">Cliffy's Gymnasium</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
              <li class="nav-item"><a href="welcome.php" class="nav-link"><span>Profile</span></a></li>
              <li class="nav-item"><a href="user-trainer.php" class="nav-link"><span>Trainer</span></a></li>
              <li class="nav-item"><a href="user-routine.php" class="nav-link"><span>Routine</span></a></li>
              <li class="nav-item"><a href="user-membership.php" class="nav-link"><span>Membership</span></a></li>
              <li class="nav-item"><a href="logout.php" class="nav-link"><span>Log Out</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
          <br><br><br><br><br><br><br>

    <div class="row justify-content-center mb-5 pb-3">
		  <div class="col-md-7 heading-section text-center ftco-animate">
			  <span class="subheading" style="color: #42c0fb;"><strong>Trainer</strong></span>
			  <h2 class="mb-4">Trainer details</h2>
		  </div>
	  </div>
            
    <div>
			<div style = "margin : 40px 40px 40px 40px;">
			  <div class="bg-light p-4 p-md-5 contact-form">
				  <div class="form-group" style="text-align : center; font-size : 20px;">

          <?php
session_start();
include('mysqlconnection.php');
$trainer_id = $_SESSION['trainer_id'];

$sql1 = "SELECT * from trainer where trainer_id like '$trainer_id';";


if(($result=$conn->query($sql1))->num_rows>0)
        {
            $row = $result->fetch_assoc();
            $_SESSION["trainer_name"]=$row['trianer_name'];
            $_SESSION["trainer_salary"]=$row['trainer_salary'];
            $_SESSION["trainer_phoneno"]=$row['phone_no'];
            $_SESSION["branch_id"]=$row['branch_id'];
            $branch_id = $_SESSION["branch_id"];
            $_SESSION["timeslot_id"]=$row['timesot_id'];
            $timeslot_id = $_SESSION["timeslot_id"];
            $sql2 = "SELECT * FROM branch,timeslot WHERE branch_id like '$branch_id' and timeslot_id like '$timeslot_id';";
            if(($result2=$conn->query($sql2))->num_rows>0)
            {
              $row = $result2->fetch_assoc();
              $_SESSION["branch_city"]=$row['branch_city'];
              $_SESSION["branch_address"]=$row['branch_address'];
              $_SESSION["time_slot"]=$row['time_slot'];
            }
            else{
              header("location:errorpage.php");
            }
        


        }
        else{
          header("location:errorpage.php");
        }

    ?>

<div class = "profile">
<h1 style="color : #42c0fb;">
<a href="#" style="color : #42c0fb;">
 <?php

echo $_SESSION['trainer_name'];
#echo $_SESSION['password'];
#echo $_SESSION['customer_id'];

?>
</a>
</h1>
<br><hr><br>

<p>Phone Number: <?php

echo $_SESSION['trainer_phoneno'];

?>
</p>
<br>
<br>

<p>Trainer's Branch: <?php

echo $_SESSION['branch_address'].", ".$_SESSION['branch_city'];

?>
</p>
<br>
<br>
<p>Time Slot: <?php

echo $_SESSION['time_slot'];

?>
</p>
<br>
<br>
</div>
<button id="user-feedback" class="btn btn-primary py-3 px-5" style="background-color: #42c0fb; border-color: #42cofb;">Give Feedback</button>
<br>
<div id="user-feedback-div">
  <br><br>
<h2><?php echo "Feedback for ",$_SESSION['trainer_name'],""; ?>  </h2>
<br><br>
<label> Give your rating from lowest 1 to highest 5 </label>
<form method='POST' action='user-trainer-feedback.php' id="trainer-feedback-form" class="form-group">
<?php
echo "<div style='display : flex; justify-content : center;'>";
for($x=1;$x<=5;$x++)
{
echo "<input type='radio' name='trainer-ratings' class='form-control' value=".$x.">";
}
echo "</div>";
?>

<br><br><br>
<!------------------STAR RATING----------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------->
<label> Give your feed back here </label>
<br>
<br>
<textarea name="feedback-text" form="trainer-feedback-form" rows="10" cols="50" class="form-control"></textarea>
<br>
<br>
<input type="submit" value="Submit Feedback" class="btn btn-primary py-3 px-5" style="background-color: #42c0fb; border-color: #42cofb;">
</form>
</div>
</div>
</div>
</div>
</div>


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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
  $('#user-facility-feedback-div').hide();
  $('#user-facility-feedback').on('click',function(){

  $('#user-facility-feedback-div').toggle();

  });

  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$('#user-feedback-div').hide();
$('#user-feedback').on('click',function(){

$('#user-feedback-div').toggle();

});

</script>
    
  </body>
</html>