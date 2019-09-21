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
include('mysqlconnection.php');

?>

<div class="navbar">
  <a href="welcome.php">Profile</a>
  <a href="#">Trainer</a>
  <a href="#contact">menu3</a>
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  <a href="logout.php">Log out</a>
</div>
<br>
<br>

<?php
include('mysqlconnection.php');

$sql1 = "SELECT * from customer,trainer,branch,timeslot,plan;";



if(($result=$conn->query($sql1))->num_rows>0)
        {
            $row1 = $result->fetch_assoc();
            $column1 = array_keys($row1) ;
            foreach($column1 as $column1)
            {   
             
                $_SESSION[$column1] = array();

            }

            while($row2 = $result->fetch_assoc())
            {
            /*
            $_SESSION["trainer_name"]=$row['trianer_name'];
            $_SESSION["trainer_salary"]=$row['trainer_salary'];
            $_SESSION["trainer_phoneno"]=$row['phone_no'];
            $_SESSION["branch_id"]=$row['branch_id'];
            $branch_id = $_SESSION["branch_id"];
            $_SESSION["timeslot_id"]=$row['timesot_id'];
            $timeslot_id = $_SESSION["timeslot_id"];
            */
            $row1 = $result->fetch_assoc();
            $column = array_keys($row2);
            
            
          
            foreach($column as $column)
            {   
                
                array_push($_SESSION[$column],$row2[$column]);
            }


        }
        }
        else{
          header("location:errorpage.php");
        }

    ?>


<h1> Hello <?php echo implode(',',$_SESSION['branch_address']); ?> </h1>

</body>