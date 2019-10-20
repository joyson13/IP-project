<?php
include("mysqlconnection.php");
$branch=$_GET['branch'];
$timeslot=$_GET['timeslot'];


$sql = "SELECT * FROM TRAINER WHERE branch_id like $branch and timesot_id like $timeslot";

if(($result=$conn->query($sql))->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
	echo " <input type='radio' name='s' value =".$row['trainer_id']."><label>".$row['trianer_name']."</label>";
	echo "<br>";
	}

}
else{
	echo "No trainers available";
}

?>