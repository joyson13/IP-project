<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;
      background-color: #f8f9f9;}

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
  color:  #f8f9f9;
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
.profile{

  border-style: groove;
  border-color: grey;
  border-width: 7px;
  width: 50%;
  text-align: center;
  right: 25%;
  
}

#add-trainer-div{
  border-style: groove;
  border-color: grey;
  width: 50%;
 
}
.remove-button { text-indent: -9000px; 
text-transform: capitalize;
background-color: red;
 }



</style>
</head>


<body>

<?php   
session_start();
include('mysqlconnection.php');
if(!$_SESSION['AdminLogIn'])
{
  header('location:errorpage.php');
  session_destroy();
}

?>

<div class="navbar">
  <a href="adminwelcome.php">Admin Panel</a>
  <a href="admin-branches.php">Branches</a>
  <!----
  <a href="#contact">menu3</a>
  <a href="#contact">menu4</a>
  <a href="#contact">menu5</a>
  <a href="#contact">menu6</a>
  ---->
  <a href="logout.php">Log out</a>
  
</div>
<br>
<br>

<h1 style="text-align:center;"> Branches </h1>

<?php
include('mysqlconnection.php');

$sql1 = "SELECT * from branch";

echo "<h2>Branches</h2>";

if(($result=$conn->query($sql1))->num_rows>0)
        {
          echo "<table>";
          
          while($row = $result->fetch_assoc())
          {echo "<tr>";
            $branch_id = $row['branch_id'];
            $branch_address = $row['branch_address'];
            $branch_city = $row['branch_city'];
            
            echo "<td>".$branch_id."</td><td><a href='admin-branchprofile.php?data1=".$branch_id."'>".$branch_address."</a></td><td>".$branch_city."</td>";

            echo "</tr>";
          }
          echo "</table>";
          

        }

        else{
          //header("location:errorpage.php");
        }

    ?>



    </body>