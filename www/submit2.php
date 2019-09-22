<body>


<?php
session_start();
//Take VAriables from the post method
$age = (int)$_POST['age'];
$trainer = (int)$_POST['trainer'];
$gender = $_POST["gender"];
$branch = $_POST["branch"];
$phone = $_POST['phoneno'];
$timeslot = $_POST["timeslot"];
$plan = $_POST['plan'];

//Put variabes inj session global array


$_SESSION['age']= $age;
$_SESSION['trainer']= $trainer;
$_SESSION['gender']= $gender;
$_SESSION['branch']= $branch;
$_SESSION['phoneno'] = $phone;
$_SESSION['timeslot'] = $timeslot;
$_SESSION['classes'] = array();
$_SESSION['plan'] = $plan;
foreach($_POST["classes"] as $classes)
{
    array_push($_SESSION['classes'],$classes);
}



echo "<h1> Please Confirm</h1>"

?>

<p> name : <?php echo $_SESSION['name']; ?> </p>

<p> email : <?php echo $_SESSION['email']; ?> </p>

<p> password : <?php echo $_SESSION['password']; ?> </p>

<p> age : <?php echo $_SESSION['age']; ?> </p>

<p> gender : <?php echo $_SESSION['gender']; ?> </p>

<p> trainer_id : <?php echo $_SESSION['trainer']; ?> </p>

<p> branch_id : <?php echo $_SESSION['branch']; ?> </p>

<p> classe : <?php 


$str = implode(',', $_SESSION["classes"]);

echo $str;
    ?>
</p>
<p> plan_id: <?php echo $plan ?> </p>
<form action="submit3.php" method="POST">
<input type = "submit" value = "confirm">
</form>

</body>