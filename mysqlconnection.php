<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

// $servername = "sql203.epizy.com";
// $username = "epiz_26311089";
// $password = "KEXaoesXx4ms";
// $dbname = "epiz_26311089_gym";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
