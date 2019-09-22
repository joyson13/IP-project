<body>
<?php
include('mysqlconnection.php');
session_start();

$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['username'] = $_POST['username']
?>


<form action="submit2.php" Method = "POST" class="bg-light p-4 p-md-5 contact-form">
			    <div class="form-group">
				  <label for="age">Age *</label>
				  <input type="age" class="form-control" name = "age" required>
				</div>
				<div class="form-group">
				  <label for="phone">Phoneno *</label>
				  <input type="tel" class="form-control" name = "phoneno" required>
				</div>


				<div class="form-group">
				  <label for="currentPos">Choose your trainer *</label><br>
				    <select name="trainer" class="form-control" required>
					  <option disabled value>Select an option</option>
					  <option  value="1">Mr. Khan</option>
					  <option value="2">Aaron Maruino</option>
					  <option value="3">Will Smith</option>
					  <option value="4">Bradley Cooper</option>
					  <option value="5">David Mursello</option>
				  </select>
				</div>
				<div class="form-group">
                  <label for="gender">Choose gender *</label>
					<ul style="list-style: none;" required>
						<li class="radio"><input name="gender" value="Male"  type="radio" class="userRatings" > <label>Male :</label></li>
						<li class="radio"><input name="gender" value="Female"  type="radio" class="userRatings" > <label>Female :</label></li>
					</ul>
				</div>
				<div class="form-group">
				  <label for="membership-plan">Choose a membership plan *</label>
				  <ul style="list-style: none;" required>
						<li class="radio"><input name="plan" value="1"  type="radio" class="userRatings" > <label>1 month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs 300/-</label></li>
						<li class="radio"><input name="plan" value="2"  type="radio" class="userRatings" > <label>3 months &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs 750/-</label></li>
						<li class="radio"><input name="plan" value="3"  type="radio" class="userRatings" > <label>6 months &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs 1350/-</label></li>
					  </ul>
				</div>

			
				<div class="form-group">
				  <label for="membership-plan">Choose a timeslot *</label>
				  <ul style="list-style: none;" required>
						<li class="radio"><input name="timeslot" value="1"  type="radio" class="user" > <label>Morning </label></li>
						<li class="radio"><input name="timeslot" value="2"  type="radio" class="user" > <label>Noon </label></li>
						<li class="radio"><input name="timeslot" value="3"  type="radio" class="user" > <label>Afternoon</label></li>
						<li class="radio"><input name="timeslot" value="4"  type="radio" class="user" > <label>Evening</label></li>
					  </ul>
				</div>


				<div class="form-group">
						<label for="branch">Choose your branch/city : *</label><br>
						    <select name="branch" class="form-control" name="branch" required>
								<option disabled selected value>Select an option</option>
								<option value="1">Virar</option>
								<option value="2">Vasai</option>
								<option value="3">Borivali</option>
								<option value="4">Andheri</option>
								<option value="5">Bandra</option>
						    </select>
				</div>
				<!---MEMBERSHIP PLAN----------------------------------------------------------------------->

				










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
				
				<div class="form-group">
				  <input type="submit" class="btn btn-primary py-3 px-5" value = "continue" >Register</button>
				</div>
				

			  </form>




</body>