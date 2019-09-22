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
$trainer_id = $_SESSION['trainer_id'];
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
  <br>
  <br>
  <br>
<div class = "profile">
<h1>
<a href="admin-trainerprofile.php">
 <?php

echo $_SESSION['trainer_name'];
#echo $_SESSION['password'];
#echo $_SESSION['customer_id'];

?>
</a>
</h1>

</h1>


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



</body>