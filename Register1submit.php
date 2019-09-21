
<body>
<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/
include("mysqlconnection.php");
echo "connected";
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$phoneno = $_POST["phone"];

$phoneno = (string)$phoneno;

$sql = "insert into client(name,email,username,password,adress,phone) values ('$name','$email','$username','$password','$address','$phoneno')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "Registration phase 1 done";


$conn->close();
?>
<script>
window.location = "/userstest.php";
</script>
</body>
