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
  <a href="#contact">menu3</a>
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
$customer_id = $_GET['data1'];
$sql = "SELECT * from customer where customer_id like '$customer_id';";
if(($result=$conn->query($sql))->num_rows>0)
        {
            $row = $result->fetch_assoc();
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
?>

<br>
<br>
<div class = "profile">
<h1>
<a href="welcome.php">
 <?php

echo $_SESSION['customer_name'];
#echo $_SESSION['password'];
#echo $_SESSION['customer_id'];

?>
</a>
</h1>

</h1>


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



</body>





</body>