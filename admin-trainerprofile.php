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

<div class="navbar">
  <a href="adminwelcome.php">Admin Panel</a>
  <!---<a href="#">Trainer</a>
  <a href="#contact">menu3</a>
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  ---->
  <a href="logout.php">Log out</a>
</div>

<?php
session_start();
include('mysqlconnection.php');
$trainer_id = $_GET['data1'];
$_SESSION['trainer_id'] = $trainer_id;
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
<a href="admin-trainerprofile.php?data1=<?php echo $_SESSION['trainer_id']?>">
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
<p>Customers under trainers: <?php
$trainer_id = $_SESSION['trainer_id'];
if(!$_SESSION['NoCustomer'])
{
  /*
foreach($_SESSION['trainer_customer'] as $customer_id=>$x);
    {

       // echo implode(',',$customer_name);
        foreach($x as $y=>$z)
        {
            echo "<a href=admin-customerprofile.php?data=".$y.">".$z."</a>";
        }
    }
}
*/
$sql = "SELECT customer_id from customer where trainer_id like '$trainer_id';";
if(($result=$conn->query($sql))->num_rows>0)
{
  while($row=$result->fetch_assoc())
  { 
    $customer_id = $row['customer_id'];
    $sql1 = "SELECT name from customer where customer_id like '$customer_id'";
    if(($result1=$conn->query($sql1))->num_rows>0)
    {
    //echo "<h1>here</h1>";
    #$resut1 = $conn->query($sql1);  
    $row1 = $result1->fetch_assoc();
    $customer_name = $row1['name'];
    #echo $customer_name;
    echo "<a href='admin-customerprofile.php?data=".$customer_id."'>".$customer_name."</a>, "; 
    }
  }


}
}
else{
echo "No customers";
}
?>
</p>
<br>
<br>
</div>
<br>
<br>

<button id="feedback">See Feedback</button>

<br>
<br>

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
      
      echo "<tr><td style='background-color:#989898'><a href='admin-customerprofile.php?data=".$customer_id."'>".$customer_name."</a> Says:</td></tr>";
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$('#trainer-feedback').hide();
$('#feedback').on('click',function(){

$('#trainer-feedback').toggle();

});

</script>


</body>