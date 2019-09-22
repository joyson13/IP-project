<?php 
$branch_id = $_SESSION['branch_id'];
$sql = "SELECT * FROM branch where branch_id like '$branch_id';";
if(($result=$conn->query($sql))->num_rows>0)
{

$row = $result->fetch_assoc();

$_SESSION['branch_address'] = $row['branch_address'];
$_SESSION['branch_city'] = $row['branch_city'];

echo $_SESSION['branch_address'].", ".$_SESSION['branch_city'];
}

?>