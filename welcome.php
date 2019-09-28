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
			<span class="subheading" style="color: #42c0fb;"><strong>Profile</strong></span>
			<h2 class="mb-4">Personal details</h2>
		</div>
	</div>
            
            <div>
			<div style = "margin : 40px 40px 40px 40px;">
			  <div class="bg-light p-4 p-md-5 contact-form">
				<div class="form-group" style="text-align : center; font-size : 20px;">

          <?php
session_start();
include("mysqlconnection.php");
$username = $_SESSION['username'];
$id = $_SESSION["customer_id"];
$sql = "SELECT * from customer where customer_id like '$id';";
if(($result=$conn->query($sql))->num_rows>0)
        {
            $row = $result->fetch_assoc();
            /*
            $customer_id = $row['customer_id'];
            $username = $row['username'];
            $password = $row['password'];
            $_SESSION['customer_id'] = $customer_id;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            echo "<h1>Done</h1>";
            header("location: welcome.php");
            */
            $_SESSION["trainer_id"]=$row['trainer_id'];
            $_SESSION["customer_name"]=$row['name'];
            $_SESSION["customer_email"]=$row['email'];
            $_SESSION["customer_age"]=$row['age'];
            $_SESSION["customer_gender"]=$row['gender'];
            $_SESSION["customer_phoneno"]=$row['phone_no'];
            $_SESSION["branch_id"]=$row['branch_id'];
            $_SESSION["plan_id"]=$row['plan_id'];
            $_SESSION["timeslot_id"]=$row['timeslot_id'];
            $_SESSION["joining_date"]=$row['joining_date'];
            $_SESSION["classes"] = $row["classes"];
        
           
        }
    else{
        header("location:errorpage.php");
    }
   
    $sql2 = "SELECT * FROM customer_payment where customer_id like '$id';";

    if(($result2=$conn->query($sql2))->num_rows>0)
    {
        $row2 = $result2->fetch_assoc();
        $payment_id = $row2['payment_id'];
        $payment_date = $row2['payment_date'];
      
    }
    else{
      echo "ERROR";
    }
    $plan_id = $_SESSION['plan_id'];
    $sql3 = "SELECT * FROM plan where plan_id like '$plan_id'";

    if(($result=$conn->query($sql3))->num_rows>0)
    {
        $row3 = $result->fetch_assoc();
        $_SESSION['plan_name'] = $row3['plan_name'];
        $_SESSION['plan_fee'] = $row3['plan_fee'];
        $_SESSION['plan_duration'] = $row3['plan_duration'];
        
    }

    $plan_duration = $_SESSION['plan_duration'];


$expiry_date = date('Y-m-d', strtotime($payment_date.'+'.$plan_duration.' month'));
$todays_date = date('Y-m-d');

if($todays_date==$expiry_date)
{
  header("location:renewmembership.php");
}

?>

<br>
<div class = "profile">
<h1 style="color : #42c0fb;">
<a href="#" style="color : #42c0fb;">
 <?php

echo $_SESSION['customer_name'];
#echo $_SESSION['password'];
#echo $_SESSION['customer_id'];

?>
<br><br><hr><br>
</a>
</h1>

</h1>


<p>Age : <?php

echo $_SESSION['customer_age'];

?>
</p>
<br>
<br>

<p>Gender : <?php

echo $_SESSION['customer_gender'];

?>
</p>
<br>
<br>

<p>Email : <?php

echo $_SESSION['customer_email'];

?>
</p>
<br>
<br>
<p>Phone Number : <?php

echo $_SESSION['customer_phoneno'];

?>
</p>
<br>
<br>
</div>

<button id="user-facility-feedback" class="btn btn-primary py-3 px-5" style="background-color: #42c0fb; border-color: #42cofb;">Give Feedback For Facilities</button>

<br><br><br>
<div id="user-facility-feedback-div">
<h2 style="color : #42c0fb;"><?php 
/*
$branch_id = $_SESSION['branch_id'];
$sql = "SELECT * FROM branch where branch_id like '$branch_id';";
if(($result=$conn->query($sql))->num_rows>0)
{

$row = $result->fetch_assoc();

$_SESSION['branch_address'] = $row['branch_address'];
$_SESSION['branch_city'] = $row['branch_city'];

echo $_SESSION['branch_address'].", ".$_SESSION['branch_city'];
}
*/
include('branch_name.php');
?></h2><br><br>
<label> Give your rating from lowest 1 to highest 5 </label>
<form method='POST' action='user-facility-feedback.php' id="facility-feedback-form" class="form-group">

<?php
echo "<div style='display : flex; justify-content : center;'>";
for($x=1;$x<=5;$x++)
{
echo "<input type='radio' name='facility-ratings' class='form-control' value=".$x.">";
}
echo "</div>";
?>
<br><br><br>
<!------------------STAR RATING----------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------->
<label> Give your feed back here </label>
<br>
<br>
<textarea name="feedback-text" form="facility-feedback-form" rows="10" cols="50" class="form-control"></textarea>
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
    
  </body>
</html>