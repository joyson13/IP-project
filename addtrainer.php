<body>
<?php
include('mysqlconnection.php');
session_start();

$trainer_name = $_POST['trainer_name'];
$branch_id = (int)$_POST['branch'];
$trainer_salary = $_POST['trainer_salary'];
$trainer_phoneno = $_POST['trainer_phoneno'];
$timeslot_id = (int)$_POST['timeslot'];

$sql = "INSERT INTO TRAINER(trianer_name,trainer_salary,phone_no,branch_id,timesot_id) values('$trainer_name','$trainer_salary','$trainer_phoneno','$branch_id','$timeslot_id');";
echo "<h1>Here</h1>";
if($conn->query($sql)===TRUE)
{
    echo "<h1> Here </h1>";
    header("location:adminwelcome.php");
}
else{
    header("location:errorpage.php");
}








?>



</body>