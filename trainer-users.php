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

<h2>Customers</h2>

<?php
session_start();
if(!$_SESSION['IsLogged'])
{
    session_destroy();
    header("location:errorpage.php");
}
include('mysqlconnection.php');
$trainer_id = $_SESSION['trainer_id'];
$sql = "SELECT * FROM customer where trainer_id like '$trainer_id'";

if(($result=$conn->query($sql))->num_rows>0)
        {
          echo "<table>";
          $i=1;
          while($row = $result->fetch_assoc())
          {echo "<tr>";
            $customer_id = $row['customer_id'];
            $customer_name = $row['name'];
            
            echo "<td>".$i."</td><td><a href='trainer-customerprofile.php?data1=".$customer_id."'>".$customer_name."</a></td>";

            echo "</tr>";
          }
          echo "</table>";
          

        }

        else{
          //header("location:errorpage.php");
          echo "<h2>No customers</h2>";
        }



?>



</body>