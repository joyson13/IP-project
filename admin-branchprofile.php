<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;
      background-color: #f8f9f9;}

.navbar {
  overflow: hidden;
  background-color: #333;
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

#add-trainer-div{
  border-style: groove;
  border-color: grey;
  width: 50%;
 
}
.remove-button { text-indent: -9000px; 
text-transform: capitalize;
background-color: red;
 }

 hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
} 


</style>
</head>





<body>
<?php   
session_start();
include('mysqlconnection.php');
if(!$_SESSION['AdminLogIn'])
{
  header('location:errorpage.php');
  session_destroy();
}

?>

<div class="navbar">
  <a href="adminwelcome.php">Admin Panel</a>
  <a href="admin-branches.php">Branches</a>
  <!----
  <a href="#contact">menu3</a>
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  ---->
  <a href="logout.php">Log out</a>
  
</div>
<br>
<br>

<?php

//session_start();
//include('mysqlconnection.php');
$branch_id = $_GET['data1'];
$_SESSION['branch_id'] = $branch_id;
$sql = "SELECT * FROM branch where branch_id like '$branch_id';";
if(($result=$conn->query($sql))->num_rows>0)
{

$row = $result->fetch_assoc();

$_SESSION['branch_address'] = $row['branch_address'];
$_SESSION['branch_city'] = $row['branch_city'];

//echo $_SESSION['branch_address'].", ".$_SESSION['branch_city'];
}



?>

<h1 style="text-align:center;"> <?php echo $_SESSION['branch_address'].", ".$_SESSION['branch_city']; ?> </h1>

<br>
<br>

<?php   
//session_start();
include('mysqlconnection.php');
if(!$_SESSION['AdminLogIn'])
{
  header('location:errorpage.php');
  session_destroy();
}

?>

<div class="navbar">
  <a href="adminwelcome.php">Admin Panel</a>
  <a href="admin-branches.php">Branches</a>
  <!----
  <a href="#contact">menu3</a>
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  ---->
  <a href="logout.php">Log out</a>
  
</div>
<br>
<br>

<h2 style="text-align:center;background-color:red;"> trainers working in the branch </h2>

<?php
//include('mysqlconnection.php');

$branch_id = $_SESSION['branch_id'];
$sql1 = "SELECT * from trainer where branch_id like '$branch_id'";

echo "<h2>Trainers</h2>";

if(($result=$conn->query($sql1))->num_rows>0)
        {
          
          echo "<table>";
          
          while($row = $result->fetch_assoc())
          {echo "<tr>";
            //$branch_id = $row['branch_id'];
            $trainer_id = $row['trainer_id'];
            $trainer_name = $row['trianer_name'];
            //$timeslot_id = $row['timesot_id'];
            /*
            $sql2 = "SELECT * FROM trainer WHERE trainer_id like '$branch_id' and timeslot_id like '$timeslot_id';";
            if(($result2=$conn->query($sql2))->num_rows>0)
            {
              $row2 = $result2->fetch_assoc();
              $_SESSION["branch_city"]=$row2['branch_city'];
              $_SESSION["branch_address"]=$row2['branch_address'];
              $_SESSION["time_slot"]=$row2['time_slot'];
            }
            else{
             // header("location:errorpage.php");
            }
            */
            //$trainer_id = $row['trainer_id'];
            echo "<td>".$trainer_id."</td><td><a href='admin-trainerprofile.php?data1=".$trainer_id."'>".$trainer_name."</a></td>";

            echo "</tr>";
          }
          echo "</table>";
          

        }

        else{
          //header("location:errorpage.php");
        }

    ?>

<br>
<br>

<h2 style="text-align:center;background-color:red;"> customers enrolled in the branch </h2>

<?php
//include('mysqlconnection.php');

$branch_id = $_SESSION['branch_id'];
$sql1 = "SELECT * from customer where branch_id like '$branch_id'";

echo "<h2>Customers</h2>";

if(($result=$conn->query($sql1))->num_rows>0)
        {
          
          echo "<table>";
          
          while($row = $result->fetch_assoc())
          {echo "<tr>";
            //$branch_id = $row['branch_id'];
            $customer_id = $row['customer_id'];
            $customer_name = $row['name'];
            //$timeslot_id = $row['timesot_id'];
            /*
            $sql2 = "SELECT * FROM trainer WHERE trainer_id like '$branch_id' and timeslot_id like '$timeslot_id';";
            if(($result2=$conn->query($sql2))->num_rows>0)
            {
              $row2 = $result2->fetch_assoc();
              $_SESSION["branch_city"]=$row2['branch_city'];
              $_SESSION["branch_address"]=$row2['branch_address'];
              $_SESSION["time_slot"]=$row2['time_slot'];
            }
            else{
             // header("location:errorpage.php");
            }
            */
            //$trainer_id = $row['trainer_id'];
            echo "<td>".$customer_id."</td><td><a href='admin-customerprofile.php?data=".$customer_id."'>".$customer_name."</a></td>";

            echo "</tr>";
          }
          echo "</table>";
          

        }

        else{
          //header("location:errorpage.php");
          echo "<h2> No cutomers enrolled </h2>";
        }

    ?>

<br>
<br>

<button id="feedback">See Feedback</button>

<br>
<br>

<div id="facility-feedback" style="background-color:#eaecee">
<h2 style="font-family:Cambria;background-color:#7fb3d5">Feedbacks</h2>
<?php

$branch_id = $_SESSION['branch_id'];

$sql = "SELECT * FROM customer_facility_feedback where branch_id like '$branch_id';";

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
      $branch_id = (int)$row['branch_id'];
      $feedback = $row['feedback'];
      $rating = $row['facility_rating'];
      $feedback_date = $row['feed_back_date'];
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


$branch_id = $_SESSION['branch_id'];

$sql = "SELECT AVG(facility_rating) FROM customer_facility_feedback where branch_id like '$branch_id';";
if(($result=$conn->query($sql))->num_rows>0)
{
  $row = $result->fetch_assoc();
  $rating = (float)$row['AVG(facility_rating)'];
  echo "<label style='background-color:fffb00'>The average rating is ".$rating."</label>";
}

?>

</div>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$('#facility-feedback').hide();
$('#feedback').on('click',function(){

$('#facility-feedback').toggle();

});

</script>




</body>