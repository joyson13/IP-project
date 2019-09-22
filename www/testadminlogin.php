<?php

session_start();

include('mysqlconnection.php');

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Define variables and initialize with empty values

 

   $username = $_POST['username'];
   $password = $_POST['password'];

    //echo $username;
    //echo $password;
    // Check if password is empty

    // Validate credentials
    
        // Prepare a select statement
     $sql = "SELECT username, password FROM ADMINLOG WHERE username like '$username'and password like '$password';";

        if(($result=$conn->query($sql))->num_rows==1)
        {
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $password = $row['password'];
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['AdminLogIn'] = true;
            header("location: adminwelcome.php");
 
        }
        else{

            header("location:errorpage.php");

        }
?>