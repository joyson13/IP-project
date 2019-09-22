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

<?php


session_start();

include("mysqlconnection.php");


?>

<div class="navbar">
  <a href="welcome.php">Profile</a>
  <a href="user-trainer.php">Trainer</a>
  <a href="user-routine.php">Routine</a>
  <!---
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  --->
  <a href="logout.php">Log out</a>
  
</div>
<br>
<br>



<div id="routine-main-div" style="background-color:#eaecee">
<h2 style="font-family:Cambria;background-color:#7fb3d5">Feedbacks</h2>
<?php

$customer_id = $_SESSION['customer_id'];

$sql = "SELECT * FROM customer_routine where customer_id like '$customer_id';";

if(($result=$conn->query($sql))->num_rows>0)
{
  //$_SESSION["feedback_exist"] = FALSE;

  #if(($result=$conn->query($sql))->num_rows>0)
  #{
    echo "<hr>";
    echo "<div id='routine-div'>";

    while($row=$result->fetch_assoc())
    { 
      //echo "<h1>here</h1>";
      echo "<table>";
      #echo $customer_id;
      $routine_text = $row['routine'];
      $routine_date = $row['routine_date'];
     
      
      echo "<tr><td style='background-color:#989898'>".$routine_date."</td></tr>";
      echo "<tr><td style='background-color:#E8E8E8'>".$routine_text."</td></tr>";
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
  echo"<h2>No routine assigned</h2>";
}

?>
<br>
<br>






</body>