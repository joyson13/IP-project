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
  <!---<a href="#">Trainer</a>
  <a href="#contact">menu3</a>
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  ---->
  <a href="logout.php">Log out</a>
  
</div>
<br>
<br>

<h1 style="text-align:center;"> Admin Access </h1>

<?php
include('mysqlconnection.php');

$sql1 = "SELECT * from trainer";

echo "<h2>Trainers</h2>";

if(($result=$conn->query($sql1))->num_rows>0)
        {
          echo "<table>";
          
          while($row = $result->fetch_assoc())
          {echo "<tr>";
            $branch_id = $row['branch_id'];
            $timeslot_id = $row['timesot_id'];
            $sql2 = "SELECT * FROM branch,timeslot WHERE branch_id like '$branch_id' and timeslot_id like '$timeslot_id';";
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
            $trainer_id = $row['trainer_id'];
            echo "<td>".$row['trainer_id']."</td><td><a href='admin-trainerprofile.php?data1=".$trainer_id."'>".$row['trianer_name']."</a></td><td>".$row['trainer_salary']."</td><td>".$_SESSION['branch_address']."</td><td>".$_SESSION['time_slot']."</td><td><form method='POST' action='removetrainer.php'><input type='submit' value='".$row['trainer_id']."' name ='btn' class='remove-button'></form></td>";

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
<button id="add-trainer">Add Trainer</button>
<br>
<br>
<div id="add-trainer-div">
<form action="addtrainer.php" method="POST" id="trainer-add">
<input type = "name" placeholder="name" name="trainer_name"><br>
<input type = "text" placeholder="salary" name="trainer_salary"><br>
<input type = "text" placeholder = "phoneno" name="trainer_phoneno"><br>
<label for="branch">Choose branch/city : *</label><br>
                        <?php
                  
                  //Choose branch
                  $sql = "Select branch_address,branch_id from branch";
                  
                  if(($result = $conn->query($sql))->num_rows>0)
                    {

                        echo "<select name='branch' class='form-control'name='branch' required>";
                        echo "<option disabled value>Select an option</option>";

                        while($row = $result->fetch_assoc())
                        {
                            //<option  value="1">Mr. Khan</option>
                            echo "<option  value=".$row['branch_id'].">".$row['branch_address']."</option>";
                            //echo "<p>".$row['trianer_name']."</p>";

                        }
                        

                      echo "</select>"  ;

                      
                    }



                  ?>
<br>


<label for="membership-plan">Choose a timeslot *</label>
                  
                  <?php
                  /*
				  <ul style="list-style: none;" required>
						<li class="radio"><input name="timeslot" value="1"  type="radio" class="user" > <label>Morning </label></li>
						<li class="radio"><input name="timeslot" value="2"  type="radio" class="user" > <label>Noon </label></li>
						<li class="radio"><input name="timeslot" value="3"  type="radio" class="user" > <label>Afternoon</label></li>
						<li class="radio"><input name="timeslot" value="4"  type="radio" class="user" > <label>Evening</label></li>
                      </ul>
                     */
                    
                    
                  
                    //Choose branch
                    $sql = "Select timeslot_id,time_slot from timeslot";
                    
                    if(($result = $conn->query($sql))->num_rows>0)
                      {
                        
                       echo "<ul style='list-style: none;' required>";
                          
  
                          while($row = $result->fetch_assoc())
                          {

                            echo "<li class='radio'><input name='timeslot' value=".$row['timeslot_id']."  type='radio' class='user' > <label>".$row['time_slot']."</label></li>";
                              
                              //echo "<option  value=".$row['trainer_id'].">".$row['trianer_name']."</option>";
                              
  
                          }
                          
  
                        echo "</ul>"  ;
  
                        
                      }
  
  
  
            


                ?>

<br>
<br>
<input type="submit" value="create trainer">
</form>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$('#add-trainer-div').hide();
$('#add-trainer').on('click',function(){

$('#add-trainer-div').toggle();

});

</script>

</body>