<?php

session_start();

include('mysqlconnection.php');



//$expiry_date = date('Y-m-d', strtotime($joining_date .'+'.$plan_duration.' month'));
/*
$uname = $_SESSION['username'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$age = $_SESSION['age'];
$gender = $_SESSION['gender'];
$trainer = (int)$_SESSION['trainer'];
$branch = (int)$_SESSION['branch'];
$timeslot = (int)$_SESSION['timeslot'];
$class = implode(',',$_SESSION['classes']);
$phoneno = $_SESSION['phoneno'];
$plan = (int)$_SESSION['plan'];
*/


$customer_id = $_SESSION['customer_id'];
//$sql = "SELECT customer_id FROM customer WHERE $customer_id like '$customer_id';";


    
   
    //$plan_id = $row['plan_id'];

    
$sql1 = "UPDATE customer_payment SET payment_date = NOW() WHERE customer_id like '$customer_id';";
if($conn->query($sql1)===TRUE)
  {
      include("paymentmail.php");
      header("location:welcome.php");
  }
    






?>