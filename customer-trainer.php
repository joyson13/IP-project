<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;
      background-color: "#abb2b9";}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}
</style>
</head>


<body>
<?php 
session_start();
//session_start();
include("mysqlconnection.php");
?>

<div class="navbar">
  <a href="welcome.php">Profile</a>
  <a href="customer-trainer.php">Trainer</a>
  <a href="#contact">menu3</a>
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  <a href="logout.php">Log out</a>
</div>
<br>
<br>



<h1><?php $_SESSION['trainer_id'];?> </h1>



</body>
</html>