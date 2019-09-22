<body>

<?php


session_start();
include('mysqlconnection.php');
$trainer_id = (int)$_SESSION['trainer_id'];
$trainer_raiting = (int)$_POST['trainer-ratings'];
$trainer_feedback = $_POST['feedback-text'];
$customer_id = (int)$_SESSION['customer_id'];
echo "<h1>".$trainer_id."</h1>";
echo "<h1>".$trainer_feedback."</h1>";

$sql = "INSERT INTO customer_trainer_feedback(customer_id,trainer_id,feedback,trainer_rating) VALUES ('$customer_id','$trainer_id','$trainer_feedback','$trainer_raiting');";

if($conn->query($sql)===TRUE)
{
    header("location:user-trainer.php");
}
else{
    //header("location:errorpage.php");
}


?>



</body>