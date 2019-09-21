<body>

<?php include("mysqlconnection.php"); 

session_start();

$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['username'] = $_POST['username']

?>


<form action="submit2.php" Method = "POST" class="bg-light p-4 p-md-5 contact-form">

<div class="form-group">
                  <label for="gender">Choose gender *</label>
					<ul style="list-style: none;" required>
						<li class="radio"><input name="gender" value="Male"  type="radio" class="userRatings" > <label>Male :</label></li>
						<li class="radio"><input name="gender" value="Female"  type="radio" class="userRatings" > <label>Female :</label></li>
					</ul>
                </div>
                
                <div class="form-group">
				  <label for="age">Age *</label>
				  <input type="age" class="form-control" name = "age" required>
				</div>
				<div class="form-group">
				  <label for="phone">Phoneno *</label>
				  <input type="tel" class="form-control" name = "phoneno" required>
                </div>
                <!---BRANCH-------------------------------------------------------------------------------------------------->

                <div class="form-group">
                        <label for="branch">Choose your branch/city : *</label><br>
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

						    
				</div>

                <!-------Time Slot--------------------------------------------------------------------------->

                <div class="form-group">
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
				</div>





                <!--------------------------TRAINER------------------------------------------------------------>

                <div class="form-group">
				  <label for="currentPos">Choose your trainer*</label><br>
                  <?php
                  
                  //Choose branch
                  $sql = "Select trianer_name,trainer_id from trainer";
                  
                  if(($result = $conn->query($sql))->num_rows>0)
                    {

                        echo "<select name='trainer' class='form-control' required>";
                        echo "<option disabled value>Select an option</option>";

                        while($row = $result->fetch_assoc())
                        {
                            //<option  value="1">Mr. Khan</option>
                            echo "<option  value=".$row['trainer_id'].">".$row['trianer_name']."</option>";
                            //echo "<p>".$row['trianer_name']."</p>";

                        }
                        

                      echo "</select>"  ;

                      
                    }



                  ?>
				  </label>
                </div>
                
                <!---CLASSES------------------------------------------------>
                <div class="form-group">
					<label for="classes">Choose your classes : *</label>
					<ul style="list-style: none;" required>
							<li class="checkbox"><label><input name="classes[]" value="Muscle Building" type="checkbox" class="userRatings">Muscle Building</label></li>
							<li class="checkbox"><input name="classes[]" value="Cardio Exercise" type="checkbox" class="userRatings">Cardio Exercise</li>
							<li class="checkbox"><label><input name="classes[]" value="Power Yoga" type="checkbox" class="userRatings">Power Yoga</label></li>
							<li class="checkbox"><label><input name="classes[]" value="Aerobics program" type="checkbox" class="userRatings">Aerobics program</label></li>
							<li class="checkbox"><label><input name="classes[]" value="Crossfit program" type="checkbox" class="userRatings">Crossfit program</label></li>
							<li class="checkbox"><label><input name="classes[]" value="Basic Exercise and Stretching" type="checkbox" class="userRatings">Basic Exercise and Stretching</label></li>
					</ul>
                </div>
                
                <!-----------------------MEMBERSHIP PLAN-------------------------------------------------->

                <div class="form-group">
				  <label for="membership-plan">Choose a membership plan *</label>
				  <?php
				  /*
				  <ul style="list-style: none;" required>
						<li class="radio"><input name="plan" value="1"  type="radio" class="userRatings" > <label>1 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs 300/-</label></li>
						<li class="radio"><input name="plan" value="2"  type="radio" class="userRatings" > <label>3 months &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs 750/-</label></li>
						<li class="radio"><input name="plan" value="3"  type="radio" class="userRatings" > <label>6 months &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs 1350/-</label></li>
					  </ul>
                */
                

                $sql = "Select * from plan";
                    
                    if(($result = $conn->query($sql))->num_rows>0)
                      {
                        
                       echo "<ul style='list-style: none;' required>";
                          
  
                          while($row = $result->fetch_assoc())
                          {

                            
                              
                              //echo "<option  value=".$row['trainer_id'].">".$row['trianer_name']."</option>";
                              

                              echo "<li class='radio'><input name='plan' value=".$row['plan_id']."  type='radio' class='userRatings' > <label>".$row['plan_duration']." month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs 300/-</label></li>";
  
                          }
                          
  
                        echo "</ul>"  ;
  
                        
                      }
  
  
  
            

				

				
				?>
				</div>

<!-----------SUBMIT BUTTON--------------------------------------------------------------------------------------->$GLOBALS



<div class="form-group">
				  <input type="submit" class="btn btn-primary py-3 px-5" value = "continue" >Register</button>
</div>


</form>
</body>