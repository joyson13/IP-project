<body>

<?php

include("mysqlconnection.php");
echo "connected";
session_start();
$uname = $_SESSION['username'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$age = $_SESSION['age'];
$gender = $_SESSION['gender'];
$trainer = (int)$_SESSION['trainer'];
$branch = (int)$_SESSION['branch'];
$timeslot = (int)$_SESSION['timeslot'];
$class = implode(',',$_SESSION['classes']);
$phoneno = $_SESSION['phoneno'];
$plan = (int)$_SESSION['plan'];
$sql = "insert into customer(name,email,username,password,age,gender,phone_no,branch_id,trainer_id,plan_id,timeslot_id,joining_date,classes) values ('$name','$email','$uname','$password','$age','$gender','$phoneno','$branch','$trainer','$plan','$timeslot',NOW(),'$class')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<h1>Account is Successfully created</h1>"

?>




</body>