

<body>

<!DOCTYPE html>
<html>
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

</style>
</head>
<body stye="background-color: rgb(171, 178, 185) !important;">

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








<?php
session_start();
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
        


        }
        else{
          header("location:errorpage.php");
        }

    ?>

<div class = "profile">
<h1>
<a href="user-trainer.php">
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
</div>
<br>
<br>
<button id="user-feedback">Give Feedback</button>

<div id="user-feedback-div">
<h2><?php echo $_SESSION['trainer_name'] ?>  </h2>
<label> Give your rating out of 5 </label>
<form method='POST' action='user-trainer-feedback.php' id="trainer-feedback-form">
<?php
for($x=1;$x<=5;$x++)
{
echo "<input type='radio' name='trainer-ratings' value=".$x.">".$x."<br>";
}
?>

<label> Give your feed back here </label>
<br>
<br>
<textarea name="feedback-text" form="trainer-feedback-form" rows="10" cols="50"></textarea>
<br>
<br>
<input type="submit" value="Submit Feedback">
</form>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$('#user-feedback-div').hide();
$('#user-feedback').on('click',function(){

$('#user-feedback-div').toggle();

});

</script>




    </body>