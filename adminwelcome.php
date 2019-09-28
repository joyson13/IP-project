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
              <li class="nav-item"><a href="adminwelcome.php" class="nav-link"><span>Admin Panel</span></a></li>
              <li class="nav-item"><a href="admin-branches.php" class="nav-link"><span>Branches</span></a></li>
              <li class="nav-item"><a href="logout.php" class="nav-link"><span>Log Out</span></a></li>
</ul>
</div>
</div>
          </nav>
          <br><br><br><br><br><br><br>

          <div class="row justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section text-center ftco-animate">
			<span class="subheading" style="color: #42c0fb;"><strong>Admin Access</strong></span>
			<h2 class="mb-4">Trainers</h2>
		</div>
	</div>

			<div style = "margin : 40px 40px 40px 40px;">
			  <div class="bg-light p-4 p-md-5 contact-form">
				<div class="form-group" style="text-align : center; font-size : 20px;">

        <?php   
session_start();
include('mysqlconnection.php');
if(!$_SESSION['AdminLogIn'])
{
  header('location:errorpage.php');
  session_destroy();
}

?>
<br>
<br>

<?php
include('mysqlconnection.php');

$sql1 = "SELECT * from trainer";

if(($result=$conn->query($sql1))->num_rows>0)
        {
          echo "<table style='margin : auto;'>";
          echo "<th><td><strong colspan='1'>ID</strong></td><td colspan = '6'><strong>Name<strong></td ><td colspan = '2'><strong>Salary</strong></td><td colspan = '10'><strong>Branch</strong></td><td colspan = '4'><strong>Time</strong></td></th>";
          while($row = $result->fetch_assoc())
          {
            $branch_id = $row['branch_id'];
            $timeslot_id = $row['timesot_id'];
            $sql2 = "SELECT * FROM branch,timeslot WHERE branch_id like '$branch_id' and timeslot_id like '$timeslot_id';";
            if(($result2=$conn->query($sql2))->num_rows>0)
            {
              $row2 = $result2->fetch_assoc();
              $_SESSION["branch_city"]=$row2['branch_city'];
              $_SESSION["branch_address"]=$row2['branch_address'];
              $_SESSION["time_slot"]=$row2['time_slot'];
            }
            else{
             // header("location:errorpage.php");
            }
            $trainer_id = $row['trainer_id'];
            echo "<tr><td></td><td colspan = '1'>".$row['trainer_id']."</td><td colspan = '6'><a href='admin-trainerprofile.php?data1=".$trainer_id."' style='color : #42c0fb'>".$row['trianer_name']."</a></td><td colspan = '2'>".$row['trainer_salary']."</td><td colspan = '10'>".$_SESSION['branch_address']."</td><td colspan = '4'>".$_SESSION['time_slot']."</td><td><form method='POST' action='removetrainer.php'><input type='submit' value='".$row['trainer_id']."' name ='btn' class='btn btn-danger'></form></td></tr>";
            
          }
          echo "</table>";
          

        }

        else{
          //header("location:errorpage.php");
          echo "<h2>No trainers</h2>";
        }

    ?>


<br>
<br>
<button id="add-trainer" class="btn btn-primary py-3 px-5" style="background-color: #42c0fb; border-color: #42cofb;">Add Trainer</button>
<br>
<br>
<div id="add-trainer-div">
<form action="addtrainer.php" method="POST" id="trainer-add" class="form-group">
<input type = "name" placeholder="Name" name="trainer_name" class="form-control" style="width : 50%; margin-left : 300px;"><br>
<input type = "name" placeholder="Username" name="trainer_username" class="form-control" style="width : 50%; margin-left : 300px;"><br>
<input type = "name" placeholder="Password" name="trainer_password" class="form-control" style="width : 50%; margin-left : 300px;"><br>
<input type = "text" placeholder="Salary" name="trainer_salary" class="form-control" style="width : 50%; margin-left : 300px;"><br>
<input type = "text" placeholder = "Phone no" name="trainer_phoneno" class="form-control" style="width : 50%; margin-left : 300px;"><br>
<label for="branch">Choose branch/city : *</label><br>
                        <?php
                  
                  //Choose branch
                  $sql = "Select branch_address,branch_id from branch";
                  
                  if(($result = $conn->query($sql))->num_rows>0)
                    {

                        echo "<select name='branch' class='form-control'name='branch' required class='form-control' style='width : 50%; margin-left : 300px;'>";
                        echo "<option disabled value class='form-control'>Select an option</option>";

                        while($row = $result->fetch_assoc())
                        {
                            //<option  value="1">Mr. Khan</option>
                            echo "<option  value=".$row['branch_id']." class='form-control'>".$row['branch_address']."</option>";
                            //echo "<p>".$row['trianer_name']."</p>";

                        }
                        

                      echo "</select>"  ;

                      
                    }



                  ?>
<br>


<label for="membership-plan">Choose a timeslot *</label>
                  
                  <?php
                  /*
				  <ul style="list-style: none;" required>
						<li class="radio"><input name="timeslot" value="1"  type="radio" class="user" > <label>Morning </label></li>
						<li class="radio"><input name="timeslot" value="2"  type="radio" class="user" > <label>Noon </label></li>
						<li class="radio"><input name="timeslot" value="3"  type="radio" class="user" > <label>Afternoon</label></li>
						<li class="radio"><input name="timeslot" value="4"  type="radio" class="user" > <label>Evening</label></li>
                      </ul>
                     */
                    
                    
                  
                    //Choose branch
                    $sql = "Select timeslot_id,time_slot from timeslot";
                    
                    if(($result = $conn->query($sql))->num_rows>0)
                      {
                        
                       echo "<ul style='list-style: none;' required>";
                          
  
                          while($row = $result->fetch_assoc())
                          {

                            echo "<li class='radio'><input name='timeslot' value=".$row['timeslot_id']."  type='radio' class='user' > <label>".$row['time_slot']."</label></li>";
                              
                              //echo "<option  value=".$row['trainer_id'].">".$row['trianer_name']."</option>";
                              
  
                          }
                          
  
                        echo "</ul>"  ;
  
                        
                      }
  
  
  
            


                ?>

<br>
<br>
<input type="submit" value="Create Trainer" class="btn btn-primary py-3 px-5" style="background-color: #42c0fb; border-color: #42c0fb;">
</form>
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
$('#add-trainer-div').hide();
$('#add-trainer').on('click',function(){

$('#add-trainer-div').toggle();

});

</script>
   
  </body>
</html>