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

<body stye="background-color: rgb(171, 178, 185) !important;">

<div class="navbar">
  <a href="welcome.php">Profile</a>
  <a href="user-trainer.php">Trainer</a>
  <a href="user-routine.php">Routine</a>
  <a href="user-membership.php">Membership</a>
  <!---
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  --->
  <a href="logout.php">Log out</a>
  
</div>
<br>
<br>

<?php

session_start();

include('mysqlconnection.php');
$plan_id = $_SESSION['plan_id'];
$sql = "SELECT * FROM plan where plan_id like '$plan_id'";

if(($result=$conn->query($sql))->num_rows>0)
{
    $row = $result->fetch_assoc();
    $_SESSION['plan_name'] = $row['plan_name'];
    $_SESSION['plan_fee'] = $row['plan_fee'];
    $_SESSION['plan_duration'] = $row['plan_duration'];
    
}
else{
    header("location:errorpage.php");
}




?>

<div id="user-plan-information">

<p>Plan Name:<?php echo $_SESSION['plan_name']?></p>
<br>

<p>Plan Fee:<?php echo $_SESSION['plan_fee'];?> Rs</p>
<br>

<p>Plan Duration:<?php echo $_SESSION['plan_duration']; ?> Months</p>
<br>

<p>Plan End:<?php 


$joining_date = $_SESSION['joining_date'];
$plan_duration = $_SESSION['plan_duration'];

/*
$date=date_create($joining_date);

$days = (int)$plan_duration*30;
$days = (string)$days;
$days_interval = $days." days";

date_add($date,date_interval_create_from_date_string("days_interval"));
echo date_format($date,"Y-m-d");
*/
 //existing date
echo date('Y-m-d', strtotime($joining_date .'+'.$plan_duration.' month'));


?></p>
<br>



</div>




</body>