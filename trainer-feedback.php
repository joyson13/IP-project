<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;
      background-color: #f8f9f9;}

.navbar {
  overflow: hidden;
  background-color: #333;s
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color:  #f8f9f9;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}
.profile{

  border-style: groove;
  border-color: grey;
  border-width: 7px;
  width: 50%;
  text-align: center;
  right: 25%;
  
}

</style>
</head>

<body>

<div class="navbar">
  <a href="trainerwelcome.php">Profile</a>
  <a href="trainer-users.php">Users</a>
  <a href="trainer-feedback.php">Feedbacks</a>
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  <a href="logout.php">Log out</a>
</div>
<br>
<br>


<?php
session_start();
if(!$_SESSION['IsLogged'])
{
    session_destroy();
    header("location:errorpage.php");
}
include('mysqlconnection.php');
?>


<div id="trainer-feedback" style="background-color:#eaecee">
<h2 style="font-family:Cambria;background-color:#7fb3d5">Feedbacks</h2>
<?php

$trainer_id = $_SESSION['trainer_id'];

$sql = "SELECT * FROM customer_trainer_feedback where trainer_id like '$trainer_id';";

if(($result=$conn->query($sql))->num_rows>0)
{
  //$_SESSION["feedback_exist"] = FALSE;

  #if(($result=$conn->query($sql))->num_rows>0)
  #{
    echo "<hr>";
    echo "<div id='feedback-div'>";

    while($row=$result->fetch_assoc())
    { 
      //echo "<h1>here</h1>";
      echo "<table>";
      $customer_id = (int)$row['customer_id'];
      #echo $customer_id;
      $trainer_id = (int)$row['trainer_id'];
      $feedback = $row['feedback'];
      $rating = $row['trainer_rating'];
      $feedback_date = $row['feedback_date'];
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
      
      echo "<tr><td style='background-color:#989898'><a href='admin-customerprofile.php?data=".$customer_id."'>".$customer_name."</a> Says:</td><td>".$feedback_date."</td></tr>";
      echo "<tr><td style='background-color:#E8E8E8'>".$feedback."</td></tr>";
      echo "<tr><td style='background-color:#95a5a6'>Rating: ".$rating."</td></tr>";
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




</body>