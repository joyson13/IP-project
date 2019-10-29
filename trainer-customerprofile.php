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
          <li class="nav-item"><a href="trainerwelcome.php" class="nav-link"><span>Profile</span></a></li>
          <li class="nav-item"><a href="trainer-users.php" class="nav-link"><span>Users</span></a></li>
          <li class="nav-item"><a href="trainer-feedback.php" class="nav-link"><span>Feedbacks</span></a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link"><span>Log Out</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br><br><br><br>

  <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section text-center ftco-animate">
      <span class="subheading" style="color: #42c0fb;"><strong>User</strong></span>
      <h2 class="mb-4">User details</h2>
    </div>
  </div>

  <div style="margin : 40px 40px 40px 40px;">
    <div class="bg-light p-4 p-md-5 contact-form">
      <div class="form-group" style="text-align : center; font-size : 20px;">

        <?php
        session_start();
        if (!$_SESSION['IsLogged']) {
          session_destroy();
          header("location:errorpage.php");
        }


        include('mysqlconnection.php');
        $customer_id = $_GET['data1'];
        $_SESSION['customer_id'] = $customer_id;
        $sql = "SELECT * from customer where customer_id like '$customer_id';";
        if (($result = $conn->query($sql))->num_rows > 0) {
          $row = $result->fetch_assoc();
          $_SESSION["trainer_id"] = $row['trainer_id'];
          $_SESSION["customer_name"] = $row['name'];
          $_SESSION["customer_email"] = $row['email'];
          $_SESSION["customer_age"] = $row['age'];
          $_SESSION["customer_gender"] = $row['gender'];
          $_SESSION["customer_phoneno"] = $row['phone_no'];
          $_SESSION["branch_id"] = $row['branch_id'];
          $_SESSION["plan_id"] = $row['plan_id'];
          $_SESSION["timeslot_id"] = $row['timeslot_id'];
          $_SESSION["joining_date"] = $row['joining_date'];
          $_SESSION["classes"] = $row["classes"];
        } else {
          header("location:errorpage.php");
        }
        ?>
        <div class="profile">
          <h1>
            <a href="#" style='color : #42c0fb;'>
              <?php

              echo $_SESSION['customer_name'];
              #echo $_SESSION['password'];
              #echo $_SESSION['customer_id'];

              ?>
            </a>
          </h1>

          <br>
          <hr><br>
          <p>Age: <?php

                  echo $_SESSION['customer_age'];

                  ?>
          </p>
          <br>
          <br>

          <p>Gender: <?php

                      echo $_SESSION['customer_gender'];

                      ?>
          </p>
          <br>
          <br>

          <p>Email: <?php

                    echo $_SESSION['customer_email'];

                    ?>
          </p>
          <br>
          <br>
          <p>Phone Number: <?php

                            echo $_SESSION['customer_phoneno'];

                            ?>
          </p>
          <br>
          <br>

          <p>Joing Date: <?php

                          echo $_SESSION['joining_date'];

                          ?>
          </p>
          <br>
          <br>

          <p>Classes: <?php

                      echo $_SESSION['classes'];

                      ?>
          </p>
          <br>
          <br>

        </div>
        <br>
        <br>

        <div id="routine-main-div" style="background-color:#eaecee; border-radius : 10px;" class="form-group">
          <h2 style="font-family:Cambria;background-color:#7fb3d5; border-radius : 10px;">Previous Assigned Routines To The Customer</h2>
          <?php

          $customer_id = $_SESSION['customer_id'];

          $sql = "SELECT * FROM customer_routine where customer_id like '$customer_id';";

          if (($result = $conn->query($sql))->num_rows > 0) {
            //$_SESSION["feedback_exist"] = FALSE;

            #if(($result=$conn->query($sql))->num_rows>0)
            #{
            echo "<hr>";
            echo "<div id='routine-div'>";

            while ($row = $result->fetch_assoc()) {
              //echo "<h1>here</h1>";
              echo "<table>";
              #echo $customer_id;
              $routine_text = $row['routine'];
              $routine_date = $row['routine_date'];


              echo "<tr><td style='background-color:#989898'>" . $routine_date . "</td></tr>";
              echo "<tr><td style='background-color:#E8E8E8'>" . $routine_text . "</td></tr>";
              echo "</table>";
              echo "<hr>";
            }

            echo "</div>";




            #}

            #else{
            #  echo"<h2>No Feed back recorded</h2>";
            #  }

          } else {
            echo "<p>No routine assigned</p>";
          }

          ?>
          <div>

            <br>
            <br>




            <div id="user-feedback-div">

              <form method='POST' action='trainer-routine.php' id="trainer-routine-form">
                <label> Give your workout routine back here </label>
                <br>
                <br>
                <textarea name="routine-text" form="trainer-routine-form" rows="10" cols="100"></textarea>
                <br>
                <br>
                <input type="submit" value="Submit Routine" class="btn btn-primary py-3 px-5" style="background-color: #42c0fb; border-color: #42c0fb; margin-bottom : 20px;">
              </form>
            </div>
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
              <li><a href="site.php#v-pills-6"><span class="icon-long-arrow-right mr-2"></span>Yoga</a></li>
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
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


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
    $('#user-facility-feedback-div').hide();
    $('#user-facility-feedback').on('click', function() {

      $('#user-facility-feedback-div').toggle();

    });
  </script>

</body>

</html>