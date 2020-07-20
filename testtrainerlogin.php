<?php

session_start();

include('mysqlconnection.php');

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: trainerwelcome.php");
    exit;
}

// Define variables and initialize with empty values



$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['trainer_username'] = $username;
// echo $username;
// echo $password;
// Check if password is empty

// Validate credentials

// Prepare a select statement
$sql = "SELECT trainer_id, trianer_name, password FROM trainer WHERE username like '$username' and password like '$password';";

if (($result = $conn->query($sql))->num_rows == 1) {

    $row = $result->fetch_assoc();
    $trainer_id = $row['trainer_id'];
    $username = $row['username'];
    $password = $row['password'];
    $_SESSION['trainer_id'] = $trainer_id;
    //$_SESSION['trainer_username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['IsLogged'] = true;
    echo "<h1>Done</h1>";
    header("location:trainerwelcome.php");
} else {
     header("location:errorpage.php");
}
