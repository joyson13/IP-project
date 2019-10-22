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
        <span class="oi oi-menu"></span> Menu
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
			<h2 class="mb-4">Trainer details</h2>
		</div>
	</div>
            
			<div style = "margin : 40px 40px 40px 40px;">
			  <div class="bg-light p-4 p-md-5 contact-form">
				<div class="form-group" style="text-align : center; font-size : 20px;">

        <?php
session_start();
include('mysqlconnection.php');
$trainer_id = $_GET['data1'];
$_SESSION['trainer_id'] = $trainer_id;
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
            $sql3 = "SELECT * FROM customer where trainer_id like '$trainer_id';";
            if(($result3=$conn->query($sql3))->num_rows>0)
            {
                $_SESSION['NoCustomer'] = false;
                //$trainer_customers1 = array('$customer_id'=>$customer_name);
              $_SESSION['trainer_customer'] =array();
              $customers = array();
              while($row3=$result3->fetch_assoc())
              {
                  $customer_id = $row3['customer_id'];
                  $customer_name = $row3['name'];
                  //$arr1 = array("$customer_id"=>$row3['name']);
                 // array_push($_SESSION['trainer_customer'],array("$customer_id"=>$row3['name']));
                 array_push($_SESSION['trainer_customer'],["$customer_id"=>$customer_name]);
              }
              
            }
            else{
                $_SESSION['NoCustomer'] = true;
            }


        }
        else{
          header("location:errorpage.php");
        }

    ?>
  <br>
<div class = "profile">
<h1>
<a href="admin-trainerprofile.php?data1=<?php echo $_SESSION['trainer_id']?>" style="color : #42c0fb;">
 <?php

echo $_SESSION['trainer_name'];
#echo $_SESSION['password'];
#echo $_SESSION['customer_id'];

?>
</a>
</h1>

</h1>
<br><hr><br>

<p>Phone Number: <?php

echo $_SESSION['trainer_phoneno'];

?>
</p>
<br>
<br>

<p>Trainer Branch: <?php

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
<p>Trainer Salary: <?php

echo $_SESSION['trainer_salary'];

?>
</p>
<br>
<br>
<p>Customers under trainers: <?php
$trainer_id = $_SESSION['trainer_id'];
if(!$_SESSION['NoCustomer'])
{
  /*
foreach($_SESSION['trainer_customer'] as $customer_id=>$x);
    {

       // echo implode(',',$customer_name);
        foreach($x as $y=>$z)
        {
            echo "<a href=admin-customerprofile.php?data=".$y.">".$z."</a>";
        }
    }
}
*/
$sql = "SELECT customer_id from customer where trainer_id like '$trainer_id';";
if(($result=$conn->query($sql))->num_rows>0)
{
  while($row=$result->fetch_assoc())
  { 
    $customer_id = $row['customer_id'];
    $sql1 = "SELECT name from customer where customer_id like '$customer_id'";
    if(($result1=$conn->query($sql1))->num_rows>0)
    {
    //echo "<h1>here</h1>";
    #$resut1 = $conn->query($sql1);  
    $row1 = $result1->fetch_assoc();
    $customer_name = $row1['name'];
    #echo $customer_name;
    echo "<a href='admin-customerprofile.php?data=".$customer_id."' style='color : #42c0fb;'>".$customer_name."</a>, "; 
    }
  }


}
}
else{
echo "No customers";
}
?>
</p>
<br>
<br>
</div>

<button id="feedback" class="btn btn-primary px-4 py-3" style="background-color: #42c0fb;">See Feedback</button>

<br>
<br>

<div id="trainer-feedback" style="background-color:#eaecee">
<h2 style="font-family:Cambria;background-color:#7fb3d5; border-radius : 10px;">Feedbacks</h2>
<?php

$trainer_id = $_SESSION['trainer_id'];

$sql = "SELECT * FROM customer_trainer_feedback where trainer_id like '$trainer_id';";

if(($result=$conn->query($sql))->num_rows>0)
{
  //$_SESSION["feedback_exist"] = FALSE;

  #if(($result=$conn->query($sql))->num_rows>0)
  #{
    echo "<div id='feedback-div'>";

    while($row=$result->fetch_assoc())
    { 
      //echo "<h1>here</h1>";
      echo "<table style='margin : auto;'>";
      $customer_id = (int)$row['customer_id'];
      #echo $customer_id;
      $trainer_id = (int)$row['trainer_id'];
      $feedback = $row['feedback'];
      $rating = $row['trainer_rating'];
      $sql1 = "SELECT name from customer where customer_id like '$customer_id'";
      if(($result1=$conn->query($sql1))->num_rows>0)
      {
      //echo "<h1>here</h1>";
      #$resut1 = $conn->query($sql1);  
      $row1 = $result1->fetch_assoc();
      $customer_name = $row1['name'];
      #echo $customer_name;
      }
      else{
        continue;
      }
      
      echo "<tr><td colspan='8'><a href='admin-customerprofile.php?data=".$customer_id."' style='color : #42c0fb;'>".$customer_name."</a> Says:</td></tr>";
      echo "<tr><td>".$feedback."</td></tr>";
      echo "<tr><td>Rating: ".$rating."</td></tr>";
      echo "</table>";
      echo "<hr>";
      }
      
      echo "</div>";

      


  #}

  #else{
  #  echo"<h2>No Feed back recorded</h2>";
#  }

}
else{
  echo"<h2>No Feed back recorded</h2>";
}

?>
<br>
<br>
<?php

$trainer_id = $_SESSION['trainer_id'];

$sql = "SELECT AVG(trainer_rating) FROM customer_trainer_feedback where trainer_id like '$trainer_id';";
if(($result=$conn->query($sql))->num_rows>0)
{
  $row = $result->fetch_assoc();
  $rating = (float)$row['AVG(trainer_rating)'];
  echo "<label style='background-color:fffb00'>The average rating is ".$rating."</label>";
}

?>

</div>

</div>
</div>
</div>


<footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About <span><a href="site.php">Cliffy's Gymnasium.</a></span></h2>
              <p>Help you find your starting point to build your path to success.</p>
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
                <li><a href="site.php#home-section"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="site.php#about-section"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="site.php#services-section"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                <li><a href="site.php#coaches-section"><span class="icon-long-arrow-right mr-2"></span>Coaches</a></li>
                <li><a href="site.php#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="site.php#v-pills-1"><span class="icon-long-arrow-right mr-2"></span>Gym Fitness</a></li>
                <li><a href="site.php#v-pills-08"><span class="icon-long-arrow-right mr-2"></span>Crossfit</a></li>
                <li><a href="site.php#v-pills-6"><span class="icon-long-arrow-right mr-2"></span>Yoa</a></li>
                <li><a href="site.php#v-pills-7"><span class="icon-long-arrow-right mr-2"></span>Aerobics</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Carter Road, Bandra (west), Mumbai, Maharashtra, India.</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 9897846828</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">cliffy@protonmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdNCH_q2D6gJkUcQNp0GYf2SLs1yx04DA&sensor=true"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
  <script>
  $('#trainer-feedback').hide();
  $('#feedback').on('click',function(){

  $('#trainer-feedback').toggle();

  });

  </script>
    
  </body>
</html>