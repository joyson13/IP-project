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

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$sql = "SELECT customer_id FROM customer WHERE username like '$username'and password like '$password';";
$plan_id = (int) $_SESSION['plan'];
if (($result = $conn->query($sql))->num_rows > 0) {
  $row = $result->fetch_assoc();
  $customer_id = $row['customer_id'];
  //$plan_id = $row['plan_id'];

  $sql2 = "SELECT plan_duration FROM plan where plan_id like '$plan_id';";
  if (($result2 = $conn->query($sql2))->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    /*
    $duration = (int)$row2['plan_duration'];
    $joining_date = date('Y-m-d');
    $expiry_date = date('Y-m-d', strtotime($joining_date .'+'.$duration.' month'));
    //STR_TO_DATE($expiry_date, '%d-%m-%Y')
    $expiry_date1 = date('Y-m-d', strtotime($expiry_date));  
    echo gettype($expiry_date1);
    */
    $sql1 = "INSERT INTO customer_payment(customer_id,plan_id,payment_date) VALUES ('$customer_id','$plan_id',NOW());";
    if ($conn->query($sql1) === TRUE) {
      include("paymentmail.php");
      header("location:login.php");
    }
  }
}
